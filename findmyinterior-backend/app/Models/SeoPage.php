<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SeoPage extends Model
{
    protected $fillable = [
        'title', 'slug', 'meta_title', 'meta_description', 'schema_json',
    ];

    protected $casts = [
        'schema_json' => 'array',
    ];

    // ─── Scopes ───────────────────────────────────────────────────────────────

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    // ─── Static Helpers ───────────────────────────────────────────────────────

    public static function forSlug(string $slug): ?self
    {
        return static::active()->where('slug', $slug)->first();
    }
}
