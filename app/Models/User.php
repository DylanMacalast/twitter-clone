<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Tweet;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Gets Users Avatar att
     */
    public function getAvatarAttribute()
    {
        return 'https://i.pravatar.cc/50?u='.$this->email;
    }

    /**
     * gets all tweets
     */
    public function timeline()
    {

        // include all the users tweets
        // and include all there followers tweets
        // get all user id's
        // $ids = $this->follows->pluck('id');
        // more performant to just get follows id's not the whole object
        $ids = $this->follows()->pluck('id');
        // add this users id to id arr 
        $ids->push($this->id);
        // desc order by date
        return Tweet::whereIn('user_id', $ids)->latest()->get();
        

        // return Tweet::where('user_id',$this->id)->latest()->get();
    }

    /**
     * relation between user and their tweets
     */
    public function tweets()
    {
        // a user can have many tweets
        return $this->hasMany(Tweet::class);
    }

    /**
     * function to follow a user
     */
    public function follow(User $user)
    {
        // add user to the follows table in relation to user
        return $this->follows()->save($user);
    }

    /**
     * Get all users the user follows
     * Relationship between users
     *
     * @return array 
     */
    public function follows()
    {
        // a user can follow many users
        // because the relational table does not follow convention in this case ie. user_user we have to set it
        // we also have to specify the foreign id's
        return $this->belongsToMany(User::class, 'follows', 'user_id', 'following_user_id')->withTimestamps();
    }
}
