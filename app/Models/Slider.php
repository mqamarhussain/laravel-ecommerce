<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'link', 'status', 'text', 'image'];

    public function getStatusAttribute(): string
    {
        return $this->attributes['status'] == 0 ? 'Inactive' : 'Active';
    }

    public function scopeActive($query)
    {
        return $query->whereStatus(true);
    }

    public function getImageNameAttribute(): string
    {
        $image = ($this->image) ?: 'default.jpg';
        return asset('storage/images/sliders/' . $image);
    }

}
