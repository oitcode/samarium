<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ExpenseAddition extends Model
{
    use SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'expense_addition';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'expense_addition_id';

    protected $fillable = [
         'expense_id', 'expense_addition_heading_id',
         'amount',
    ];


    /*-------------------------------------------------------------------------
     * Relationships
     *-------------------------------------------------------------------------
     *
     */

    /*
     * expense table.
     *
     */
    public function expense()
    {
        return $this->belongsTo('App\Expense', 'expense_id', 'expense_id');
    }

    /*
     * expense_addition_heading table.
     *
     */
    public function expenseAdditionHeading()
    {
        return $this->belongsTo('App\ExpenseAdditionHeading', 'expense_addition_heading_id', 'expense_addition_heading_id');
    }
}
