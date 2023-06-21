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
        if($filters['search'] ?? false) {
            $query->where('title', 'LIKE', '%'. request('search') .'%');
        }
        if($filters['filter-branches'] ?? false) {
            $new = explode(', ',request('filter-branches'));
            $query->whereIn('cat_id', $new);
//            $count = 0;
//            foreach($new as $i) {
//                if($count == 0){
//                    $query->where('cat_id', '=', $i);
//                }
//                else {
//                    $query->orWhere('cat_id', '=', $i);
//                }
//                $count++;
//            }

        }
    }
}
