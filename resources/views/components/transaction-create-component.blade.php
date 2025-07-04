<div>
  <div>
    {{ $topToolbarNxt ?? ' ' }}
  </div>
  <div>
    {{ $topToolbar }}
  </div>
  <div class="row" style="margin: auto;">
    <div class="col-md-8 p-0">
      <div>
        {{ $transactionMainInfo }}
      </div>
      <div>
        {{ $transactionAddItem }}
      </div>
      <div>
        {{ $transactionItemList }}
      </div>
    </div>
    <div class="col-md-4 p-0 border-left">
      <div>
        {{ $transactionTotalBreakdown }}
      </div>
      <div>
        {{ $transactionPayment }}
      </div>
    </div>
  </div>
  {{ $slot }}
</div>
