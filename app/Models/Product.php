<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Translatable\HasTranslations;

class Product extends Model
{
    use HasTranslations;

    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'short_description',
        'description',
        'sku',
        'on_sale',
        'prices',
        'images',
        'attributes',
    ];

    public array $translatable = [
        'name',
        'slug',
        'short_description',
        'description',
    ];

    protected function casts(): array
    {
        return [
            'on_sale' => 'boolean',
            'prices' => 'array',
            'images' => 'array',
            'attributes' => 'array',
        ];
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
