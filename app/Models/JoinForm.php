<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JoinForm extends Model
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

    public function joinRequests()
    {
        return $this->hasMany(JoinRequest::class, 'join_form_id');
    }
}
