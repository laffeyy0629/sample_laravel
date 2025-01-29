<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    use HasFactory;
    use SoftDeletes;

    //protected $table = 'blogs';
    
    protected $fillable = [
        'title', 
        'description',
        'status',
        'type',
        'author_id',
        'category_id',
    ];

    protected static function booted()
    {
        static::creating(function ($blog) {
            if (is_null($blog->status)) {
                $blog->status = 1; // Default status is 1
            }
        });
    }

    public function category()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }

    // public function category()
    // {
    //     return $this->belongsTo(Category::class, 'id', 'category_id');
    // }
}


