<div class="">


  <div class="row" style="margin: auto;">

    <div class="col-md-12 m-0 p-0" role="button">
      @include ('partials.misc.glance-card', [
          'bsBgClass' => 'bg-danger',
          'btnRoute' => 'online-order',
          'iconFaClass' => 'fas fa-edit',
          'btnTextPrimary' => 'Online order',
          'btnTextSecondary' => $onlineOrderCount,
      ])
    </div>

    @if (false)
    @if ($newOnlineOrderCount > 0)
      <div class="col-md-6 m-0 p-0" role="button">
        @include ('partials.misc.glance-card', [
            'bsBgClass' => 'bg-white',
            'btnRoute' => 'online-order',
            'iconFaClass' => 'fas fa-edit',
            'btnTextPrimary' => 'New',
            'btnTextSecondary' => $newOnlineOrderCount,
        ])
      </div>
    @endif
    @endif
  </div>


</div>
