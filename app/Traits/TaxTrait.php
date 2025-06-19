<?php

namespace App\Traits;

use App\Models\SaleInvoice\SaleInvoiceAdditionHeading;

/**
 * TaxTrait - PHP trait which contains useful tax related functions
 *
 */

trait TaxTrait
{
    /*
    | Check if VAT is used
    |
    */
    public function hasVat()
    {
        return SaleInvoiceAdditionHeading::exists('name', 'vat');
    }
}
