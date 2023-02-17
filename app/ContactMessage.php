<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactMessage extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'contact_message';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'contact_message_id';

    protected $fillable = [
         'sender_name', 'sender_email', 'sender_phone',
         'message',
    ];
}
