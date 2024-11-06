<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class club extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'bio',
    ];
    
    //Club will have many members
    public function clubMemberships()
    {
        return $this->hasMany(ClubMembership::class);
    }

    //Clubs will belong to many users and also many users will belong to clubs.
    //I learned that belongs to many is a way to add joining table
    public function users()
    {
        return $this->belongsToMany(User::class, 'club_memberships')
                    //it's probably good to have role accessible
                    ->withPivot('role')
                    //also timestamps but I don't know
                    ->withTimestamps();
    }

    //posts will be just hasmany relationship
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    //There will be 1 form per club. /for now the form is only being used by club reques. But if we use it in a dfferent way we can change it/
    public function form()
    {
        return $this->hasOne(Form::class);
    }

    //clubrequests is also hasmany relationship
    public function clubRequests()
    {
        return $this->hasMany(ClubRequest::class);
    }
}
