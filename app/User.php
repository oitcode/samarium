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

    /*
     * document_file table.
     *
     */
    public function documentFiles()
    {
        return $this->hasMany('App\DocumentFile', 'creator_id', 'id');
    }

    /*
     * customer_comment table.
     *
     */
    public function customerComments()
    {
        return $this->hasMany('App\CustomerComment', 'creator_id', 'id');
    }

    /*
     * customer_document_file table.
     *
     */
    public function customerDocumentFiles()
    {
        return $this->hasMany('App\CustomerDocumentFile', 'creator_id', 'id');
    }

    /*
     * educ_institution table.
     *
     */
    public function educInstitutions()
    {
        return $this->hasMany('App\EducInstitution', 'creator_id', 'id');
    }

    /*
     * educ_institution_program table.
     *
     */
    public function educInstitutionPrograms()
    {
        return $this->hasMany('App\EducInstitutionProgram', 'creator_id', 'id');
    }

    /*
     * user_group table.
     *
     */
    public function createdUserGroups()
    {
        return $this->hasMany('App\UserGroup', 'creator_id', 'id');
    }

    /*
     * user_group table.
     *
     */
    public function userGroups()
    {
        return $this->belongsToMany('App\UserGroup', 'user__user_group', 'user_id', 'user_group_id');
    }
}
