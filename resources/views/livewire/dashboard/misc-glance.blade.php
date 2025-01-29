<div class="bg-white border">

  <div class="d-flex justify-content-between">
    <div class="pt-3 pl-3">
      <h2 class="h6 font-weight-bold">
        <i class="fas fa-book mr-1"></i>
        Misc
      </h2>
    </div>
    <div>
      <i class="fas fa-cog mr-3 mt-3"></i>
    </div>
  </div>

  {{-- First row --}}
  <div class="row pb-2" style="margin: auto;">
    <div class="col-md-4 p-2 m-0" role="button">
      @include ('partials.misc.glance-card', [
          'bsBgClass' => 'bg-dark',
          'btnRoute' => 'dashboard-cms-post',
          'iconFaClass' => 'fas fa-sms',
          'btnTextPrimary' => 'Messages',
          'btnTextSecondary' => 10,
      ])
    </div>

    <div class="col-md-4 p-2 m-0" role="button">
      @include ('partials.misc.glance-card', [
          'bsBgClass' => 'bg-dark',
          'btnRoute' => 'dashboard-cms-webpage',
          'iconFaClass' => 'fas fa-bell',
          'btnTextPrimary' => 'Orders',
          'btnTextSecondary' => 20,
      ])
    </div>

    <div class="col-md-4 p-2 m-0" role="button">
      @include ('partials.misc.glance-card', [
          'bsBgClass' => 'bg-dark',
          'btnRoute' => 'dashboard-cms-gallery',
          'iconFaClass' => 'fas fa-chart-line',
          'btnTextPrimary' => 'Report',
          'btnTextSecondary' => '',
      ])
    </div>
  </div>

</div>
