<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory;
    

    //protected $table = 'category'; // Explicitly set the table name
    public function blogs()
    {
        return $this->hasMany(Blog::class);

    }
}


