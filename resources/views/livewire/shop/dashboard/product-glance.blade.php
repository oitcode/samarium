<div class="bg-white border">


  {{-- First row --}}
  <div class="row pb-2-rm" style="margin: auto;">

    <div class="col-md-6 p-0 m-0" role="button">
      @include ('partials.misc.glance-card', [
          'bsBgClass' => 'bg-white',
          'btnRoute' => 'menu',
          'iconFaClass' => 'fas fa-dice-d6',
          'btnTextPrimary' => 'Products',
          'btnTextSecondary' => $productCount,
      ])
    </div>

    <div class="col-md-6 p-2-rm m-0" role="button">
      @include ('partials.misc.glance-card', [
          'bsBgClass' => 'bg-white',
          'btnRoute' => 'menu',
          'iconFaClass' => 'fas fa-list',
          'btnTextPrimary' => 'Categories',
          'btnTextSecondary' => $productCategoryCount,
      ])
    </div>

  </div>

</div>
