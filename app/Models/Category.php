<?php

namespace App\Models;

use App\Models\Concerns\HasLocalizedContent;
use Database\Factories\CategoryFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Translatable\HasTranslations;

class Category extends Model
{
    /** @use HasFactory<CategoryFactory> */
    use HasFactory, HasLocalizedContent, HasTranslations;

    protected $fillable = [
        'name',
        'slug',
        'is_visible',
        'parent_id',
    ];

    protected $casts = [
        'is_visible' => 'boolean',
    ];

    public array $translatable = [
        'name',
        'slug',
    ];

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function children(): HasMany
    {
        return $this->hasMany(Category::class, 'parent_id');
    }
}
