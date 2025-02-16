<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsletterSubscription extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'newsletter_subscription';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'newsletter_subscription_id';

    protected $fillable = [
      'email', 'status',
    ];
}
