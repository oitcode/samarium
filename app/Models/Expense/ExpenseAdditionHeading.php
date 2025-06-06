<?php

namespace App\Models\Expense;

use Illuminate\Database\Eloquent\Model;

class ExpenseAdditionHeading extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'expense_addition_heading';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'expense_addition_heading_id';

    protected $fillable = [
         'name', 'effect',
    ];


    /*-------------------------------------------------------------------------
     * Relationships
     *-------------------------------------------------------------------------
     *
     */

    /*
     * expense_addition table.
     *
     */
    public function expenseAdditions()
    {
        return $this->hasMany('App\Models\Expense\ExpenseAddition', 'expense_addition_heading_id', 'expense_addition_heading_id');
    }
}
