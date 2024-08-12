<?php

namespace App\Livewire\Misc;

use Livewire\Component;

use App\SaleInvoicePaymentType;
use App\PurchasePaymentType;
use App\ExpensePaymentType;

use App\SaleInvoiceAdditionHeading;
use App\PurchaseAdditionHeading;
use App\ExpenseAdditionHeading;

class SettingsComponent extends Component
{
    public $saleInvoicePaymentTypes;
    public $purchasePaymentTypes;
    public $expensePaymentTypes;

    public $saleInvoiceAdditionHeadings;
    public $purchaseAdditionHeadings;
    public $expenseAdditionHeadings;

    public $new_sale_invoice_payment_type_name;
    public $new_purchase_payment_type_name;
    public $new_expense_payment_type_name;

    public $new_sale_invoice_addition_heading_name;
    public $new_sale_invoice_addition_heading_effect;

    public $new_purchase_addition_heading_name;
    public $new_purchase_addition_heading_effect;

    public $new_expense_addition_heading_name;
    public $new_expense_addition_heading_effect;

    public $modes = [
    ];

    public $multiModes = [
        'createSaleInvoicePaymentType' => false,
        'createPurchasePaymentType' => false,
        'createExpensePaymentType' => false,

        'createSaleInvoiceAdditionHeading' => false,
        'createPurchaseAdditionHeading' => false,
        'createExpenseAdditionHeading' => false,
    ];

    public function render()
    {
        $this->saleInvoicePaymentTypes = SaleInvoicePaymentType::all();
        $this->purchasePaymentTypes = PurchasePaymentType::all();
        $this->expensePaymentTypes = ExpensePaymentType::all();

        $this->saleInvoiceAdditionHeadings = SaleInvoiceAdditionHeading::all();
        $this->purchaseAdditionHeadings = PurchaseAdditionHeading::all();
        $this->expenseAdditionHeadings = ExpenseAdditionHeading::all();

        return view('livewire.misc.settings-component');
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

    public function storeSaleInvoiceAdditionHeading()
    {
        $validatedData = $this->validate([
            'new_sale_invoice_addition_heading_name' => 'required',
            'new_sale_invoice_addition_heading_effect' => 'required',
        ]);

        $saleInvoiceAdditionHeading = new SaleInvoiceAdditionHeading;
        $saleInvoiceAdditionHeading->name = $validatedData['new_sale_invoice_addition_heading_name'];
        $saleInvoiceAdditionHeading->effect = $validatedData['new_sale_invoice_addition_heading_effect'];
        $saleInvoiceAdditionHeading->save();

        $this->exitMultiMode('createSaleInvoiceAdditionHeading');
    }

    public function storePurchaseAdditionHeading()
    {
        $validatedData = $this->validate([
            'new_purchase_addition_heading_name' => 'required',
            'new_purchase_addition_heading_effect' => 'required',
        ]);

        $purchaseAdditionHeading = new PurchaseAdditionHeading;
        $purchaseAdditionHeading->name = $validatedData['new_purchase_addition_heading_name'];
        $purchaseAdditionHeading->effect = $validatedData['new_purchase_addition_heading_effect'];
        $purchaseAdditionHeading->save();

        $this->exitMultiMode('createPurchaseAdditionHeading');
    }

    public function storeExpenseAdditionHeading()
    {
        $validatedData = $this->validate([
            'new_expense_addition_heading_name' => 'required',
            'new_expense_addition_heading_effect' => 'required',
        ]);

        $expenseAdditionHeading = new ExpenseAdditionHeading;
        $expenseAdditionHeading->name = $validatedData['new_expense_addition_heading_name'];
        $expenseAdditionHeading->effect = $validatedData['new_expense_addition_heading_effect'];
        $expenseAdditionHeading->save();

        $this->exitMultiMode('createExpenseAdditionHeading');
    }
}
