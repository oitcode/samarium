<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ExpensePayment extends Model
{
    use SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'expense_payment';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'expense_payment_id';

    protected $fillable = [
         'expense_payment_type_id', 'expense_id', 'payment_date',
         'amount',
    ];


    /*-------------------------------------------------------------------------
     * Relationships
     *-------------------------------------------------------------------------
     *
     */

    /*
     * expense_payment_type table.
     *
     */
    public function expensePaymentType()
    {
        return $this->belongsTo('App\ExpensePaymentType', 'expense_payment_type_id', 'expense_payment_type_id');
    }

    /*
     * expense table.
     *
     */
    public function expense()
    {
        return $this->belongsTo('App\Expense', 'expense_id', 'expense_id');
    }
}
