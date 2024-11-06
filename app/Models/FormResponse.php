<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormResponse extends Model
{
    use HasFactory;
    protected $table = 'form_responses';
    protected $fillable = [
        'user_id',
        'club_form_id',
        'answer',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function form()
    {
        return $this->belongsTo(Form::class, 'club_form_id');
    }
    //form responso can have one clubrequest
    public function ClubRequest()
    {
        return $this->hasOne(ClubRequest::class);
    }
}
