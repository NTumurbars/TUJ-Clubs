<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    use HasFactory;
    protected $fillable = [
        'club_id',
        'title',
        'question',
    ];

    
    public function club()
    {
        return $this->belongsTo(Club::class);
    }

    //A way to get all responses from the form
    public function formResponses()
    {
        return $this->hasMany(FormResponse::class, 'club_form_id');
    }

    //A way to get all clubrequests from the form
    public function clubRequests()
    {
        return $this->hasMany(ClubRequest::class, 'form_id');
    }
}
