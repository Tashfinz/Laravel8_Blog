<?php

namespace App\Models;

use App\Models\Like;
use Illuminate\Foundation\Auth\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'body'
    ];
    
    public function likedBy(User $user)
    {
        //contains is a laravel collection method that allows us to look 
        //inside of a collection of objects at a perticular key
        //this checks to see if the user id is in the likes model and returns true or false
        return $this->likes->contains('user_id', $user->id);
    }

    // public function ownedBy(User $user)
    // {
    //     return $user->id === $this->user_id;
    // }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }
}
