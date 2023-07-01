<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Nicolaslopezj\Searchable\SearchableTrait;

class Product extends Model
{
    use HasFactory, Sluggable, SearchableTrait;

    protected $guarded = [];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    protected $searchable = [

        'columns' => [
            'products.name' => 10,
            'products.slug' => 10
        ],
    ];

    public function getStatusAttribute(): string
    {
        return $this->attributes['status'] == 0 ? 'Inactive' : 'Active';
    }

    public function scopeActive($query)
    {
        return $query->whereStatus(true);
    }

    public function scopeHasQuantity($query)
    {
        return $query->where('quantity', '>', 0);
    }

    public function scopeActiveCategory($query)
    {
        return $query->whereHas('category', function ($query) {
            $query->whereStatus(1);
        });
    }

    public function scopeFeatured($query)
    {
        return $query->whereFeatured(true);
    }

    public function getFeaturedAttribute(): string
    {
        return $this->attributes['featured'] == 0 ? 'No' : 'Yes';
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class, 'product_tags', 'product_id', 'tag_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function orders(): BelongsToMany
    {
        return $this->belongsToMany(Order::class)->wherePivot('quantity');
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }

    public function approvedReviews()
    {
        return $this->hasMany(Review::class)->whereStatus(1);
    }

    public function media(): MorphMany
    {
        return $this->morphMany(Media::class, 'mediable');
    }

    public function firstMedia(): MorphOne
    {
        return $this->morphOne(Media::class, 'mediable')
            ->orderBy('file_sort', 'asc');
    }

    public function getImageAttribute(): string
    {
        $image = ($this->firstMedia?->file_name) ?: 'default.jpg';
        return asset('storage/images/products/' . $image);
    }

    public function ratings(): HasMany
    {
        return $this->hasMany(Rating::class);
    }

    public function rate()
    {
        return $this->ratings->isNotEmpty() ? $this->ratings()->sum('value') / $this->ratings()->count() : 0;
    }

    public function getDiscountAmountAttribute()
    {
        return round((($this->discount > 0 && $this->discount_type === 'fixed') ?
            $this->discount : $this->price * ($this->discount / 100)), 2);
    }

    public function getDiscountPercentAttribute()
    {
        return round(($this->discount > 0 && ($this->discount_type === 'percent') ?
            $this->discount : ($this->discount / $this->price) * 100), 2);
    }

    public function oldPrice(){
        return $this->price + $this->discount_amount;
    }
}
