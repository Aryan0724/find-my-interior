<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Review extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id', 'reviewable_type', 'reviewable_id',
        'rating', 'title', 'body',
    ];

    protected $casts = [];

    // ─── Relationships ────────────────────────────────────────────────────────

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Polymorphic parent: Listing, Builder, Supplier, or Worker
     */
    public function reviewable(): MorphTo
    {
        return $this->morphTo();
    }

    // ─── Scopes ───────────────────────────────────────────────────────────────

    public function scopeApproved($query)
    {
        return $query->where('is_approved', true);
    }

    // ─── Boot ─────────────────────────────────────────────────────────────────

    protected static function booted(): void
    {
        // After a review is approved/created, recalculate the parent's rating
        static::saved(function (Review $review) {
            if ($review->is_approved) {
                $parent = $review->reviewable;
                if (method_exists($parent, 'recalculateRating')) {
                    $parent->recalculateRating();
                }
            }
        });

        static::deleted(function (Review $review) {
            $parent = $review->reviewable;
            if ($parent && method_exists($parent, 'recalculateRating')) {
                $parent->recalculateRating();
            }
        });
    }
}
