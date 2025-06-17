<?php

namespace App\Models\User;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role', 'last_login_at',
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
        return $this->hasMany('App\Models\Cms\Webpage\Webpage', 'creator_id', 'id');
    }

    /*
     * sale_invoice table.
     *
     */
    public function saleInvoices()
    {
        return $this->hasMany('App\Models\SaleInvoice\SaleInvoice', 'creator_id', 'id');
    }

    /*
     * purchase table.
     *
     */
    public function purchases()
    {
        return $this->hasMany('App\Models\Purchase\Purchase', 'creator_id', 'id');
    }

    /*
     * expense table.
     *
     */
    public function expenses()
    {
        return $this->hasMany('App\Models\Expense\Expense', 'creator_id', 'id');
    }

    /*
     * todo table.
     *
     */
    public function todos()
    {
        return $this->hasMany('App\Models\Todo\Todo', 'creator_id', 'id');
    }

    /*
     * url_link table.
     *
     */
    public function urlLinks()
    {
        return $this->hasMany('App\Models\UrlLink\UrlLink', 'creator_id', 'id');
    }

    /*
     * document_file table.
     *
     */
    public function documentFiles()
    {
        return $this->hasMany('App\Models\DocumentFile\DocumentFile', 'creator_id', 'id');
    }

    /*
     * customer_comment table.
     *
     */
    public function customerComments()
    {
        return $this->hasMany('App\Models\Customer\CustomerComment', 'creator_id', 'id');
    }

    /*
     * customer_document_file table.
     *
     */
    public function customerDocumentFiles()
    {
        return $this->hasMany('App\Models\Customer\CustomerDocumentFile', 'creator_id', 'id');
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
        return $this->hasMany('App\Models\User\UserGroup', 'creator_id', 'id');
    }

    /*
     * user_group table.
     *
     */
    public function userGroups()
    {
        return $this->belongsToMany('App\Models\User\UserGroup', 'user__user_group', 'user_id', 'user_group_id');
    }

    /*
     * todo table (as assigned to).
     *
     */
    public function assignedToTodos()
    {
        return $this->hasMany('App\Models\Todo\Todo', 'assigned_to_id', 'id');
    }
}
