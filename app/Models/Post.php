<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'text', 'img', 'cat_id', 'created_at', 'updated_at'];
    public function category(){
        return $this->belongsTo(Category::class, 'cat_id');
    }

    public function notifications(){
        return $this->belongsTo(Notification::class, 'leaf_id');
    }

}
