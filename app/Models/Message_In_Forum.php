<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message_In_Forum extends Model
{
    use HasFactory;

    protected $table = "messages_in_forum";

    protected $fillable = [
        'message_id',
        'forum_id',
    ];
}
