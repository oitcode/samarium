<div class="bg-white border">


  <div class="row pb-2-rm" style="margin: auto;">

    <div class="col-md-6 p-2-rm m-0 p-0 bg-info-rm" role="button">
      @include ('partials.misc.glance-card', [
          'bsBgClass' => 'bg-white',
          'btnRoute' => 'dashboard-cms-post',
          'iconFaClass' => 'fas fa-edit',
          'btnTextPrimary' => 'Posts',
          'btnTextSecondary' => $postCount,
      ])
    </div>

    <div class="col-md-6 p-2-rm m-0" role="button">
      @include ('partials.misc.glance-card', [
          'bsBgClass' => 'bg-white',
          'btnRoute' => 'dashboard-cms-webpage',
          'iconFaClass' => 'fas fa-clone',
          'btnTextPrimary' => 'Pages',
          'btnTextSecondary' => $webpageCount,
      ])
    </div>

  </div>


</div>
