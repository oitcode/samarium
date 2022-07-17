<div class="bg-white shadow-rm">

  <div class="border p-0">
    @if (false)
    <div class="d-flex mb-0 p-2 justify-content-end bg-success text-white border">
      <button class="btn btn-light border rounded-circle" wire:click="$emit('exitSaleInvoiceDisplayMode')">
        <i class="fas fa-times fa-2x-rm"></i>
      </button>
    </div>
    @endif

    {{-- Company Info --}}
    <div class="d-flex justify-content-between p-3 border-bottom">

      <div class="">
        <div class="mb-1">
          <div class="h6 text-muted-rm mb-1" style="font-size: 0.8rem;">
            <span class="text-muted" style="font-size: 0.6rem">
              ID:
            </span>
            <span>
              {{ $expense->expense_id }}
            </span>
          </div>
        </div>

        <div class="mb-1">
          <div class="text-muted-rm mb-1" style="font-size: 0.8rem;">
            <span class="text-muted" style="font-size: 0.6rem">
              Date:
            </span>
            <span>
              {{ $expense->created_at->toDateString() }}
            </span>
          </div>
        </div>
      </div>
      <div class="">
        @if (true)
        <div class="mb-3 p-2 bg-danger text-white text-center" style="{{--background-color: orange;--}}">
          EXPENSE
        </div>
        @endif
      </div>
    </div>

    {{-- Main Info --}}
    <div class="shadow-rm">

      {{-- Items List --}}
      {{-- Show in bigger screens --}}
          <div class="card border-0">
            <div class="card-body text-dark" style="background-color: #ffe;">
              <h2 class="h5">
                {{ $expense->name }}
              </h2>
              <h2 class="h4">
                Rs
                @php echo number_format( $expense->getTotalAmount() ); @endphp
              </h2>
              <h2 class="h6">
                @foreach ($expense->expenseAdditions as $expenseAddition)
                  {{ $expenseAddition->expenseAdditionHeading->name }}
                  Rs
                  @php echo number_format( $expenseAddition->amount ); @endphp
                @endforeach
              </h2>
              <h2 class="h6">
                {{ $expense->expenseCategory->name }}
              </h2>
            </div>
          </div>

    </div>

  </div>
</div>
