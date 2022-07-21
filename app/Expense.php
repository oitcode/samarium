<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'expense';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'expense_id';

    protected $fillable = [
        'expense_category_id', 'date',
        'name', 'amount',
        'comment',
    ];


    /*-------------------------------------------------------------------------
     * Relationships
     *-------------------------------------------------------------------------
     *
     */


    /*
     * expense_category table.
     *
     */
    public function expenseCategory()
    {
        return $this->belongsTo('App\ExpenseCategory', 'expense_category_id', 'expense_category_id');
    }

    /*
     * expense_item table.
     *
     */
    public function expenseItems()
    {
        return $this->hasMany('App\ExpenseItem', 'expense_id', 'expense_id');
    }

    /*
     * expense_payment table.
     *
     */
    public function expensePayments()
    {
        return $this->hasMany('App\ExpensePayment', 'expense_id', 'expense_id');
    }

    /*
     * expense_addition table.
     *
     */
    public function expenseAdditions()
    {
        return $this->hasMany('App\ExpenseAddition', 'expense_id', 'expense_id');
    }

    /*
     * vendor table.
     *
     */
    public function vendor()
    {
        return $this->belongsTo('App\Vendor', 'vendor_id', 'vendor_id');
    }


    /*-------------------------------------------------------------------------
     * Methods
     *-------------------------------------------------------------------------
     *
     */

    public function getTotalAmount()
    {
        $total = 0;

        $total += $this->getSubTotal();

        foreach ($this->expenseAdditions as $expenseAddition) {
            if (strtolower($expenseAddition->expenseAdditionHeading->effect) == 'plus') {
              $total += $expenseAddition->amount;
            } else if (strtolower($expenseAddition->expenseAdditionHeading->effect) == 'minus') {
              $total -= $expenseAddition->amount;
            } else {
                dd('Whoops; Expense addition heading configuration gone wrong!');
            }
        }

        return $total;
    }

    public function getTotalAmountRaw()
    {
        return $this->amount;
    }

    public function getVatAmount()
    {
        $total = 0;

        foreach ($this->expenseAdditions as $expenseAddition) {
            if (strtolower($expenseAddition->expenseAdditionHeading->name) == 'vat') {
                $total += $expenseAddition->amount;
            }
        }

        return $total;
    }

    public function getSubTotal()
    {
        $total = 0;

        foreach ($this->expenseItems as $expenseItem) {
            $total += $expenseItem->amount;
        }

        return $total;
    }
}
