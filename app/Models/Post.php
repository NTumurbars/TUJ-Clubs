<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'club_id',
        'user_id',
        'is_global',
        'title',
        'content',
    ];

    public function club()
    {
        return $this->belongsTo(Club::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    // A way to find all global posts
    //fixed to use it as a scope it needs to have scope in front
    public function scopeAllGlobalPosts($query)
    {
        return $query->where('is_global', true);
    }



    //A way to get all club specific posts
    public function scopeClubPosts($query, $club)
    {  
        //I saw this from a tutorial they were using this in case people pass id or the model.
        if ($club instanceof Club) {
            $clubId = $club->id;
        } else {
            $clubId = $club;
        }

        return $query->where('is_global', false)->where('club_id', $clubId);
    }

    public function scopeClubGlobalPosts($query, $club)
    {  


        //I saw this from a tutorial they were using this in case people pass id or the model.
        if ($club instanceof Club) {
            $clubId = $club->id;
        } else {
            $clubId = $club;
        }

        return $query->where('is_global', true)->where('club_id', $clubId);
    }

}
