<?php

namespace App\Http\Livewire;

use App\Traits\MiscTrait;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

use App\ExpenseCategory;
use App\Expense;
use App\ExpensePayment;
use App\ExpensePaymentType;

class ExpenseCreate extends Component
{
    use MiscTrait;

    public $expenseCategories;

    public $name;
    public $expense_category_id;
    public $expense_payment_type_id;
    public $amount;

    public $expensePaymentTypes;

    public function render()
    {
        $this->expenseCategories = ExpenseCategory::all();
        $this->expensePaymentTypes = ExpensePaymentType::all();

        return view('livewire.expense-create');
    }

    public function store()
    {
        $validatedData = $this->validate([
            'name' => 'required',
            'expense_category_id' => 'required|integer',
            'amount' => 'required|integer',
            'expense_payment_type_id' => 'required|integer',
        ]);

        $validatedData['date'] = date('Y-m-d');

        DB::beginTransaction();

        try {
            $expense = Expense::create($validatedData);

            /* Create expense payment */
            $expensePayment = new ExpensePayment;

            $expensePayment->payment_date = date('Y-m-d');
            $expensePayment->expense_id = $expense->expense_id;
            $expensePayment->expense_payment_type_id = $validatedData['expense_payment_type_id'];
            $expensePayment->amount = $validatedData['amount'];

            $expensePayment->save();

            /* Make accounting entries */
            $this->makeExpenseAccountingEntry($expense);

            DB::commit();

            $this->emit('ackExpenseCreated');
            $this->emit('exitCreateMode');
        } catch (\Exception $e) {
            DB::rollback();
            dd ($e);
            session()->flash('errorDbTransaction', 'Some error in DB transaction.');
        }
    }
}
