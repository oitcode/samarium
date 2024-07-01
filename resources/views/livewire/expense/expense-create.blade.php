<div>


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
