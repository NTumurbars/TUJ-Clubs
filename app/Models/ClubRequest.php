<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClubRequest extends Model
{
    use HasFactory;

    protected $table = 'club_requests';

    protected $fillable = [
        'form_id',
        'status',
        'responder_id',
        'requested_at',
        'responded_at',
    ];


    //A way to know which form it is related
    
    public function formResponse()
    {
        return $this->belongsTo(FormResponse::class);
    }
    // A way to know who is the responder.
    public function responder()
    {
        return $this->belongsTo(User::class, 'responder_id');
    }
}
