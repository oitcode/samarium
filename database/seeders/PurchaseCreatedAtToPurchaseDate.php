<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use App\Purchase;

class PurchaseCreatedAtToPurchaseDate extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $purchases = Purchase::withTrashed()->get();

        DB::beginTransaction();

        try {
            foreach ($purchases as $purchase) {
                if ($purchase->purchase_date == null) {
                    $purchase->purchase_date = $purchase->created_at->toDateString();
                    $purchase->save();
                }
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            dd ($e);
            session()->flash('errorDbTransaction', 'Some error in DB transaction.');
        }
    }
}
