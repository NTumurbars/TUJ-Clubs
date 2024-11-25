<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JoinRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'join_form_id',
        'answer',
        'status',
        'responder_id',
        'requested_at',
        'responded_at',
    ];

    protected $dates = [
        'requested_at',
        'responded_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function joinForm()
    {
        return $this->belongsTo(JoinForm::class, 'join_form_id');
    }

    public function responder()
    {
        return $this->belongsTo(User::class, 'responder_id');
    }
}
