<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'text', 'img', 'cat_id', 'created_at', 'updated_at', 'status'];
    public function category(){
        return $this->belongsTo(Category::class, 'cat_id');
    }

    public function notifications(){
        return $this->belongsTo(Notification::class, 'leaf_id');
    }


    public function scopeFilter($query, array $filters) {
//        if($filters['sort'] ?? false) {
//            $query->orderBy('created_at', 'desc')
//            ->orderBy('name', 'asc');
//        }
        if($filters['search'] ?? false) {
            $query->where('title', 'LIKE', '%'. request('search') .'%');
//                ->orWhere('description', 'LIKE', '%'. request('search') .'%')
//                ->orWhere('tags', 'LIKE', '%'. request('search') .'%');
        }
    }
}
