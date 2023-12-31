<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    /*-------------------------------------------------------------------------
     * Relationships
     *-------------------------------------------------------------------------
     *
     */


    /*
     * webpage table.
     *
     */
    public function webpages()
    {
        return $this->hasMany('App\Webpage', 'creator_id', 'id');
    }

    /*
     * sale_invoice table.
     *
     */
    public function saleInvoices()
    {
        return $this->hasMany('App\SaleInvoice', 'creator_id', 'id');
    }

    /*
     * purchase table.
     *
     */
    public function purchases()
    {
        return $this->hasMany('App\Purchase', 'creator_id', 'id');
    }

    /*
     * expense table.
     *
     */
    public function expenses()
    {
        return $this->hasMany('App\Expense', 'creator_id', 'id');
    }

    /*
     * expense table.
     *
     */
    public function todos()
    {
        return $this->hasMany('App\Expense', 'creator_id', 'id');
    }

    /*
     * url_link table.
     *
     */
    public function urlLinks()
    {
        return $this->hasMany('App\UrlLink', 'creator_id', 'id');
    }
}
