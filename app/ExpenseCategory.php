<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExpenseCategory extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'expense_category';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'expense_category_id';

    protected $fillable = [
        'name',
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
    public function expenses()
    {
        return $this->hasMany('App\Expense', 'expense_category_id', 'expense_category_id');
    }


    /*-------------------------------------------------------------------------
     * Methods
     *-------------------------------------------------------------------------
     *
     */

    /*
     * Get total expense in a category.
     *
     */
    public function getExpensesTotal($startDate, $endDate)
    {
        $total = 0;

        $expenses = null;

        if (! $endDate) {
            $expenses = $this->expenses()->where('date', '=', $startDate);
        } else {
            $expenses = $this->expenses()->where('date', '>=', $startDate);
            $expenses = $expenses->where('date', '<=', $endDate);
        }

        $expenses = $expenses->get();

        foreach ($expenses as $expense) {
            $total += $expense->amount;
        }

        return $total;
    }

}
