<?php

namespace App\Models\Expense;

use Illuminate\Database\Eloquent\Model;

class ExpensePaymentType extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'expense_payment_type';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'expense_payment_type_id';

    protected $fillable = [
         'name',
    ];


    /*-------------------------------------------------------------------------
     * Relationships
     *-------------------------------------------------------------------------
     *
     */

    /*
     * expense_payment table.
     *
     */
    public function expensePayments()
    {
        return $this->hasMany('App\Models\Expense\ExpensePayment', 'expense_payment_type_id', 'expense_payment_type_id');
    }
}
