<?php

namespace App\Models\Expense;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Expense extends Model
{
    use SoftDeletes;

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
        'date', 'amount',
        'comment', 'creator_id',
        'creation_status',
    ];


    /*-------------------------------------------------------------------------
     * Relationships
     *-------------------------------------------------------------------------
     *
     */


    /*
     * users table.
     *
     */
    public function creator()
    {
        return $this->belongsTo('App\Models\User\User', 'creator_id', 'id');
    }

    /*
     * expense_category table.
     *
     */
    public function expenseCategory()
    {
        return $this->belongsTo('App\Models\Expense\ExpenseCategory', 'expense_category_id', 'expense_category_id');
    }

    /*
     * expense_item table.
     *
     */
    public function expenseItems()
    {
        return $this->hasMany('App\Models\Expense\ExpenseItem', 'expense_id', 'expense_id');
    }

    /*
     * expense_payment table.
     *
     */
    public function expensePayments()
    {
        return $this->hasMany('App\Models\Expense\ExpensePayment', 'expense_id', 'expense_id');
    }

    /*
     * expense_addition table.
     *
     */
    public function expenseAdditions()
    {
        return $this->hasMany('App\Models\Expense\ExpenseAddition', 'expense_id', 'expense_id');
    }

    /*
     * vendor table.
     *
     */
    public function vendor()
    {
        return $this->belongsTo('App\Models\Vendor\Vendor', 'vendor_id', 'vendor_id');
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
                // Todo
            }
        }

        return $total;
    }

    public function getTotalAmountRaw()
    {
        $total = 0;

        foreach ($this->expenseItems as $expenseItem) {
            $total += $expenseItem->amount;
        }

        return $total;
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
