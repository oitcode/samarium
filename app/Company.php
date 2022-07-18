<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'company';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'company_id';

    protected $fillable = [
         'name', 'tagline',
         'phone', 'email', 'address',
         'pan_number', 'logo_image_path',

         'fb_link', 'twitter_link',
         'insta_link', 'youtube_link',
         'tiktok_link',
    ];
}
