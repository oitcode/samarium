<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\SaleInvoicePaymentType;
use App\PurchasePaymentType;
use App\ExpensePaymentType;

class SettingsComponent extends Component
{
    public $saleInvoicePaymentTypes;
    public $purchasePaymentTypes;
    public $expensePaymentTypes;

    public $new_sale_invoice_payment_type_name;
    public $new_purchase_payment_type_name;
    public $new_expense_payment_type_name;

    public $modes = [
    ];

    public $multiModes = [
        'createSaleInvoicePaymentType' => false,
        'createPurchasePaymentType' => false,
        'createExpensePaymentType' => false,
    ];

    public function render()
    {
        $this->saleInvoicePaymentTypes = SaleInvoicePaymentType::all();
        $this->purchasePaymentTypes = PurchasePaymentType::all();
        $this->expensePaymentTypes = ExpensePaymentType::all();

        return view('livewire.settings-component');
    }

    /* Clear modes */
    public function clearModes()
    {
        foreach ($this->modes as $key => $val) {
            $this->modes[$key] = false;
        }
    }

    /* Enter and exit mode */
    public function enterMode($modeName)
    {
        $this->clearModes();

        $this->modes[$modeName] = true;
    }

    public function exitMode($modeName)
    {
        $this->modes[$modeName] = false;
    }

    /* Enter and exit multimodes */
    public function enterMultiMode($modeName)
    {
        $this->multiModes[$modeName] = true;
    }

    public function exitMultiMode($modeName)
    {
        $this->multiModes[$modeName] = false;
    }

    public function storeSaleInvoicePaymentType()
    {
        $validatedData = $this->validate([
            'new_sale_invoice_payment_type_name' => 'required',
        ]);

        $saleInvoicePaymentType = new SaleInvoicePaymentType;
        $saleInvoicePaymentType->name = $validatedData['new_sale_invoice_payment_type_name'];
        $saleInvoicePaymentType->save();

        $this->exitMultiMode('createSaleInvoicePaymentType');
    }

    public function storePurchasePaymentType()
    {
        $validatedData = $this->validate([
            'new_purchase_payment_type_name' => 'required',
        ]);

        $purchasePaymentType = new PurchasePaymentType;
        $purchasePaymentType->name = $validatedData['new_purchase_payment_type_name'];
        $purchasePaymentType->save();

        $this->exitMultiMode('createPurchasePaymentType');
    }

    public function storeExpensePaymentType()
    {
        $validatedData = $this->validate([
            'new_expense_payment_type_name' => 'required',
        ]);

        $expensePaymentType = new ExpensePaymentType;
        $expensePaymentType->name = $validatedData['new_expense_payment_type_name'];
        $expensePaymentType->save();

        $this->exitMultiMode('createExpensePaymentType');
    }
}
