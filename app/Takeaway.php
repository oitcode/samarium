<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Takeaway extends Model
{
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
        return $this->hasOne('App\SaleInvoice', 'takeaway_id', 'takeaway_id');
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
