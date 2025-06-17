<?php

namespace App\Models\Takeaway;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Takeaway extends Model
{
    use SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'takeaway';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'takeaway_id';

    protected $fillable = [
         'status',
    ];


    /*-------------------------------------------------------------------------
     * Relationships
     *-------------------------------------------------------------------------
     *
     */

    /*
     * sale_invoice table.
     *
     */
    public function saleInvoice()
    {
        return $this->hasOne('App\Models\SaleInvoice\SaleInvoice', 'takeaway_id', 'takeaway_id');
    }


    /*-------------------------------------------------------------------------
     * Methods
     *-------------------------------------------------------------------------
     *
     */

    public function getTotalAmount()
    {
        return $this->saleInvoice->getTotalAmount();
    }

    public function getPendingAmount()
    {
        return $this->saleInvoice->getPendingAmount();
    }

    public function isPaid()
    {
        return $this->saleInvoice->isPaid();
    }
}
