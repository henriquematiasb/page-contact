<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'message',
        'attached_file',
        'sender_ip',
        'shipping_date'
    ];
}
