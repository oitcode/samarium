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
}
