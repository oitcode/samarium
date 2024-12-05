<div>


  <div class="row pb-2-rm" style="margin: auto;">
    <div class="col-md-12 p-0 m-0" role="button">
      @include ('partials.misc.glance-card', [
          'bsBgClass' => 'bg-primary',
          'btnRoute' => 'sale',
          'iconFaClass' => 'fas fa-dice-d6',
          'btnTextPrimary' => 'Sales',
          'btnTextSecondary' => $saleInvoiceCount,
      ])
    </div>
  </div>


</div>
