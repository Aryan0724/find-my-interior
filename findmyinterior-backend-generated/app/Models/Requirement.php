<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Requirement extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id', 'category_id', 'city_id', 'district_id',
        'title', 'description', 'project_type',
        'budget_min', 'budget_max',
        'city', 'district',
        'name', 'phone', 'email',
    ];

    protected $casts = [
        'budget_min' => 'decimal:2',
        'budget_max' => 'decimal:2',=> 'boolean',
    ];

    // ─── Relationships ────────────────────────────────────────────────────────

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }

    public function district(): BelongsTo
    {
        return $this->belongsTo(District::class);
    }

    public function images(): HasMany
    {
        return $this->hasMany(RequirementImage::class);
    }

    public function contactUnlocks(): HasMany
    {
        return $this->hasMany(ContactUnlock::class);
    }

    // ─── Scopes ───────────────────────────────────────────────────────────────

    public function scopeOpen($query)
    {
        return $query->where( 'open');
    }

    public function scopeByCategory($query, int $categoryId)
    {
        return $query->where('category_id', $categoryId);
    }

    public function scopeByDistrict($query, string $district)
    {
        return $query->where('district', $district);
    }

    // ─── Helpers ──────────────────────────────────────────────────────────────

    public function isUnlockedBy(User $user): bool
    {
        return $this->contactUnlocks()->where('user_id', $user->id)->exists();
    }

    public function getFormattedBudgetAttribute(): string
    {
        if (!$this->budget_min && !$this->budget_max) {
            return 'Flexible Budget';
        }
        $min = '₹' . number_format($this->budget_min);
        $max = '₹' . number_format($this->budget_max);
        return "{$min} – {$max}";
    }
}
