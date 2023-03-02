<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Friend extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function notifications(){
        return $this->belongsTo(Notification::class, 'friend_id');
    }
}
