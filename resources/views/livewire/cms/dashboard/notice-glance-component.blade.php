<div>


  {{-- First row --}}
  <div class="row" style="margin: auto;">
    <div class="col-md-12 m-0 p-0" role="button">
      @include ('partials.misc.glance-card', [
          'bsBgClass' => 'bg-success',
          'btnRoute' => 'dashboard-cms-post',
          'iconFaClass' => 'fas fa-bell',
          'btnTextPrimary' => 'Notice',
          'btnTextSecondary' => $noticeCount,
      ])
    </div>
  </div>


</div>
