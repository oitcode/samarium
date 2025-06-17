<?php

namespace App\Models\Customer;

use Illuminate\Database\Eloquent\Model;

class CustomerDocumentFile extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'customer_document_file';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'customer_document_file_id';

    protected $fillable = [
         'name', 'file_path', 'customer_id', 'creator_id',
    ];


    /*-------------------------------------------------------------------------
     * Relationships
     *-------------------------------------------------------------------------
     *
     */

    /*
     * customer table.
     *
     */
    public function customer()
    {
        return $this->belongsTo('App\Models\Customer\Customer', 'customer_id', 'customer_id');
    }

    /*
     * users table.
     *
     */
    public function creator()
    {
        return $this->belongsTo('App\Models\User\User', 'creator_id', 'id');
    }
}
