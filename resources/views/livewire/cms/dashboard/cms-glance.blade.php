<div class="bg-white border">

  @if (true)
  <div class="d-flex justify-content-between">
    <div class="pt-3 pl-3 border-rm">
      <h2 class="h6 font-weight-bold">
        <i class="fas fa-book mr-1"></i>
        CMS
      </h2>
    </div>
    <div>
      <i class="fas fa-cog mr-3 mt-3"></i>
    </div>
  </div>
  @endif


  {{-- First row --}}
  <div class="row pb-2" style="margin: auto;">

    <div class="col-md-4 p-2 m-0" role="button">
      @include ('partials.misc.glance-card', [
          'bsBgClass' => 'bg-primary',
          'btnRoute' => 'dashboard-cms-post',
          'iconFaClass' => 'fas fa-edit',
          'btnTextPrimary' => 'Posts',
          'btnTextSecondary' => $postCount,
      ])
    </div>

    <div class="col-md-4 p-2 m-0" role="button">
      @include ('partials.misc.glance-card', [
          'bsBgClass' => 'bg-primary',
          'btnRoute' => 'dashboard-cms-webpage',
          'iconFaClass' => 'fas fa-clone',
          'btnTextPrimary' => 'Pages',
          'btnTextSecondary' => $webpageCount,
      ])
    </div>

    <div class="col-md-4 p-2 m-0" role="button">
      @include ('partials.misc.glance-card', [
          'bsBgClass' => 'bg-primary',
          'btnRoute' => 'dashboard-cms-gallery',
          'iconFaClass' => 'fas fa-image',
          'btnTextPrimary' => 'Gallery',
          'btnTextSecondary' => $galleryCount,
      ])
    </div>

  </div>


  {{-- Second row --}}
  <div class="row pb-2" style="margin: auto;">

    <div class="col-md-4 p-2 m-0" role="button">
      @include ('partials.misc.glance-card', [
          'bsBgClass' => 'bg-primary',
          'btnRoute' => 'dashboard-cms-nav-menu',
          'iconFaClass' => 'fas fa-link',
          'btnTextPrimary' => 'Nav menu',
          'btnTextSecondary' => false,
      ])
    </div>

    <div class="col-md-4 p-2 m-0" role="button">
      @include ('partials.misc.glance-card', [
          'bsBgClass' => 'bg-primary',
          'btnRoute' => 'dashboard-cms-theme',
          'iconFaClass' => 'fas fa-palette',
          'btnTextPrimary' => 'Theme',
          'btnTextSecondary' => false,
      ])
    </div>

    <div class="col-md-4 p-2 m-0" role="button">
      @include ('partials.misc.glance-card', [
          'bsBgClass' => 'bg-primary',
          'btnRoute' => 'dashboard-quick-contacts',
          'iconFaClass' => 'fas fa-users',
          'btnTextPrimary' => 'Quick Contacts',
          'btnTextSecondary' => false,
      ])
    </div>

  </div>

  @if (false)
  <div class="my-2 px-2 text-secondary">
    Powred by <a href="">Oztrich</a>
  </div>
  @endif

</div>
