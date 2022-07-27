<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ExpenseItem extends Model
{
    use SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'expense_item';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'expense_item_id';

    protected $fillable = [
        'expense_id', 'expense_category_id',
        'name', 'amount',
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
     * expense_category table.
     *
     */
    public function expenseCategory()
    {
        return $this->belongsTo('App\ExpenseCategory', 'expense_category_id', 'expense_category_id');
    }
}
