<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'user_bio',
        'user_img',
        'user_birth'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function posts() {
        return $this->hasMany(Post::class, 'user_id');
    }

    public function category(){
        return $this->belongsTo(Category::class, 'cat_id');
    }

    public function year(){
        return $this->belongsTo(Year::class, 'years_id');
    }

    public function faculty(){
        return $this->belongsTo(Faculty::class, 'faculty_id');
    }

    public function sex(){
        return $this->belongsTo(Sex::class, 'sex_id');
    }

    public function friends()
    {
        return $this->hasMany(Friend::class, 'user_id');
    }

    public function friendsReceiver()
    {
        return $this->hasMany(Friend::class, 'friend_id');
    }

    public function participations()
    {
        return $this->belongsToMany(User::class, 'participations', 'user_id', 'leaf_id');
    }
    public function notifications(){
        return $this->belongsTo(Notification::class, 'user_id');
    }



    public function scopeFilter($query, array $filters) {
        if($filters['name'] ?? false) {
            $query->where('name', 'LIKE', '%'. request('name') .'%');
        }
        if($filters['sex'] ?? false) {
            $query->where('sex_id', '=', request('sex'));
        }
        if($filters['faculties'] ?? false) {
            $query->where('faculty_id', '=', request('faculties'));
        }
        if($filters['branches'] ?? false) {
            $query->where('cat_id', '=', request('branches'));
        }
        if($filters['sort'] ?? false) {
            $query->orderBy(request('sort'));
        }
    }

}
