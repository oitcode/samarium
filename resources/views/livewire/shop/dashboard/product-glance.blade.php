<div class="bg-white border">
  @if (false)
  <div class="d-flex justify-content-between">
    <div class="pt-3 pl-3 border-rm">
      <h2 class="h6 font-weight-bold">
        <i class="fas fa-dice-d6 mr-1"></i>
        Products
      </h2>
    </div>

    <div class="d-flex">
      <div>
        <i class="fas fa-cog mr-3 mt-3"></i>
      </div>
    </div>

  </div>
  @endif


  {{-- First row --}}
  <div class="row pb-2-rm" style="margin: auto;">

    <div class="col-md-12 p-0 m-0" role="button">
      @include ('partials.misc.glance-card', [
          'bsBgClass' => 'bg-white',
          'btnRoute' => 'menu',
          'iconFaClass' => 'fas fa-dice-d6',
          'btnTextPrimary' => 'Products',
          'btnTextSecondary' => $productCount,
      ])
    </div>

    @if (false)
    <div class="col-md-4 p-2 m-0" role="button">
      @include ('partials.misc.glance-card', [
          'bsBgClass' => 'bg-danger',
          'btnRoute' => 'menu',
          'iconFaClass' => 'fas fa-list',
          'btnTextPrimary' => 'Categories',
          'btnTextSecondary' => $productCategoryCount,
      ])
    </div>

    <div class="col-md-4 p-2 m-0" role="button">
      @include ('partials.misc.glance-card', [
          'bsBgClass' => 'bg-danger',
          'btnRoute' => 'dashboard-inventory',
          'iconFaClass' => 'fas fa-dolly',
          'btnTextPrimary' => 'Inventory',
          'btnTextSecondary' => false,
      ])
    </div>
    @endif

  </div>

  @if (false)
  <div class="my-2 px-2 text-secondary">
    Powred by <a href="">Oztrich</a>
  </div>
  @endif

</div>
