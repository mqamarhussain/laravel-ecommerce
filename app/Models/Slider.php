<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use File;
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
        if ($this->image && File::exists(public_path('storage/images/sliders/' . $this->image))) {
            return asset('storage/images/sliders/' . $this->image);
        }
        return asset('default-images/sliders/default.jpg');
    }

}
