<div>
  <div class="row">
    <div class="col-md-8">
      @include ('partials.expense-create-add-item-new')
      @include ('partials.expense-create-main-new')
    </div>
    <div class="col-md-4">
      @if (! $modes['paid'])
      @include ('partials.expense-create-make-payment-new')

      <div>
        <div class="p-0 m-0">
          @if (! $modes['paid'])
          <button
              onclick="this.disabled=true;"
              class="btn btn-success mr-3-rm w-100 py-3"
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
                class="btn btn-lg btn-warning-rm"
                wire:click="finishPayment"
                style="font-size: 1.3rem; background-color: orange">
              PRINT
            </button>
          @endif
        </div>
      </div>
      @endif

    </div>
  </div>
</div>
