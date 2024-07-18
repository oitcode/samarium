<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'customer';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'customer_id';

    protected $fillable = [
         'name', 'ab_account_id',
         'phone', 'email', 'address',
         'pan_num',
    ];


    /*-------------------------------------------------------------------------
     * Relationships
     *-------------------------------------------------------------------------
     *
     */

    /*
     * sale table.
     *
     */
    public function sales()
    {
        return $this->hasMany('App\Sale', 'customer_id', 'customer_id');
    }

    /*
     * sale_invoice table.
     *
     */
    public function saleInvoices()
    {
        return $this->hasMany('App\SaleInvoice', 'customer_id', 'customer_id');
    }

    /*
     * sale_quotation table.
     *
     */
    public function saleQuotations()
    {
        return $this->hasMany('App\SaleQuotation', 'customer_id', 'customer_id');
    }

    /*
     * customer_comment table.
     *
     */
    public function customerComments()
    {
        return $this->hasMany('App\CustomerComment', 'customer_id', 'customer_id');
    }

    /*
     * customer_document_file table.
     *
     */
    public function customerDocumentFiles()
    {
        return $this->hasMany('App\CustomerDocumentFile', 'customer_id', 'customer_id');
    }

    /*
     * ab_account table.
     *
     */
    public function abAccount()
    {
        return $this->hasOne('App\AbAccount', 'ab_account_id', 'ab_account_id');
    }


    /*-------------------------------------------------------------------------
     * Methods
     *-------------------------------------------------------------------------
     *
     */

    /*
     * get balance.
     *
     */
    public function getBalance()
    {
        $total = 0;

        foreach ($this->saleInvoices as $saleInvoice) {
            $total += $saleInvoice->getPendingAmount();
        }

        return $total;
    }

    /*
     * Get pending sale invoices of customer.
     *
     */
    public function getPendingSaleInvoices()
    {
        $invoices = $this->saleInvoices()->where('payment_status', '!=', 'paid')->get();

        return $invoices;
    }

    /*
     * Get total num of sale invoices.
     *
     */
    public function getTotalSaleInvoices()
    {
        return count($this->saleInvoices);
    }

    /*
     * Get total num of pending sale invoices.
     *
     */
    public function getTotalPendingSaleInvoices()
    {
        return count($this->saleInvoices()->where('payment_status', '!=', 'paid')->get());
    }

    /*
     * Get total sales.
     *
     */
    public function getTotalSaleAmount()
    {
        $total = 0;

        foreach ($this->saleInvoices as $saleInvoice) {
            $total += $saleInvoice->getTotalAmount();
        }

        return $total;
    }

    /*
     * Get total paid amount.
     *
     */
    public function getTotalPaidAmount()
    {
        $total = 0;

        foreach ($this->saleInvoices as $saleInvoice) {
            $total += $saleInvoice->getPaidAmount();
        }

        return $total;
    }

    public function getInititals()
    {
    }
}
