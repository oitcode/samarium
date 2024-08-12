<div>

  <div class="d-flex justify-content-between bg-dark-rm text-white-rm py-0 border-rm">
    {{-- Breadcrumb --}}
    <div class="my-2 py-2">
      Expense

      <i class="fas fa-angle-right mx-2"></i>
      {{ $expense->expense_id }}
    </div>

    {{-- Top tool bar --}}
    <div>
      <div>
        <div class="mt-0 p-2 d-flex justify-content-between border-rm"
            style="{{-- background-color: #dadada; --}}">

          <div>
            <button class="btn btn-light" wire:click="$refresh">
              <i class="fas fa-refresh"></i>
            </button>

            <button class="btn btn-outline-danger" wire:click="$dispatch('exitExpenseDisplayMode')">
              <i class="fas fa-times"></i>
              Close
            </button>
          </div>

        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-8">
      @if ($expense->creation_status != 'created')
        @include ('partials.dashboard.expense-create-add-item')
      @endif
      @include ('partials.dashboard.expense-create-main')
    </div>

    @if (! $modes['paid'])
    <div class="col-md-4">
      <div class="border">
        @include ('partials.dashboard.expense-create-make-payment')

        <div>
          <div class="p-0 m-0">
            @if (! $modes['paid'])
            <button
                onclick="this.disabled=true;"
                class="btn
                    {{ env('OC_ASCENT_BTN_COLOR', 'btn-light') }}
                    w-100 py-3"
                wire:click="finishCreation"
                style="font-size: calc(1rem + 0.2vw);">
              <i class="fas fa-check-circle mr-3"></i>
              Confirm
            </button>
            @else
              <button
                  onclick="this.disabled=true;"
                  class="btn btn-lg btn-success"
                  wire:click="finishPayment"
                  style="font-size: 1.3rem;">
                FINISH
              </button>
              <button
                  onclick="this.disabled=true;"
                  class="btn btn-lg"
                  wire:click="finishPayment"
                  style="font-size: 1.3rem; background-color: orange">
                PRINT
              </button>
            @endif
          </div>
        </div>
      </div>

    </div>
    @endif
  </div>


</div>
