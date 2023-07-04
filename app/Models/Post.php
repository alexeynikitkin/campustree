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
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }


    public function scopeFilter($query, array $filters) {
        if($filters['search'] ?? false) {
            $query->where('title', 'LIKE', '%'. request('search') .'%');
        }

        if($filters['name'] ?? false) {
            $query->where('title', 'LIKE', '%'. request('name') .'%');
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
        if($filters['sort'] ?? false) {
            $query->orderBy(request('sort'));
        }
        if($filters['event_date'] ?? false) {
            $query->where('event_date', '>', date("Y-m-d", strtotime("+" . request('event_date'))));
        }
        if($filters['date'] ?? false) {
            $arr1 = explode('/', request('date'));
            $newDate = $arr1[2] . '-' . $arr1[1] . '-' . $arr1[0];
            $query->where('event_date', 'LIKE', $newDate);
        }
    }
}
