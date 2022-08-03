{{-- Show only in bigger screens --}}
<div class="d-none d-md-block">

  {{-- Top most button in the left menu. --}}
  <div class="text-center border-rm">
    <a href="{{ route('dashboard') }}" class="btn btn-warning-rm w-100 h-100 p-3 pl-4 font-weight-bold text-left" style="font-size: 1rem;">
      <div class="d-flex justify-content-center">
        <i class="far fa-check-circle text-primary mr-1" style="font-size: 1.3rem;"></i>
      </div>
      <span class="" style="font-size: 1.3rem;">
      </span>
    </a>
  </div>

  @can ('is-admin')
    @include ('partials.app-left-menu-button',
        [
            'btnRoute' => 'dashboard',
            'iconFaClass' => 'fas fa-tv',
            'btnText' => 'Dashboard',
        ])
  @endcan

  @if (env('SITE_TYPE') == 'erp')
    @can ('is-admin')
      @include ('partials.app-left-menu-button',
          [
              'btnRoute' => 'sale',
              'iconFaClass' => 'fas fa-skating',
              'btnText' => 'Takeaway',
          ])
    @endcan

    @if (env('CMP_TYPE') == 'cafe')
      @include ('partials.app-left-menu-button',
          [
              'btnRoute' => 'cafesale',
              'iconFaClass' => 'fas fa-table',
              'btnText' => 'Tables',
          ])
    @endif
  @endif

  @can ('is-admin')
    @include ('partials.app-left-menu-button',
        [
            'btnRoute' => 'menu',
            'iconFaClass' => 'fas fa-list',
            'btnText' => 'Menu',
        ])
  @endcan

  @can ('is-admin')
    @include ('partials.app-left-menu-button',
        [
            'btnRoute' => 'daybook',
            'iconFaClass' => 'fas fa-book',
            'btnText' => 'Daybook',
        ])

    @include ('partials.app-left-menu-button',
        [
            'btnRoute' => 'weekbook',
            'iconFaClass' => 'fas fa-book',
            'btnText' => 'Weekbook',
        ])

    @if (env('SITE_TYPE') == 'erp')
      @include ('partials.app-left-menu-button',
          [
              'btnRoute' => 'customer',
              'iconFaClass' => 'fas fa-users',
              'btnText' => 'Customer',
          ])
    @elseif (env('SITE_TYPE') == 'ecs')
      @include ('partials.app-left-menu-button',
          [
              'btnRoute' => 'customer',
              'iconFaClass' => 'fas fa-users',
              'btnText' => 'Students',
          ])
    @endif
  @endcan

  @if (env('SITE_TYPE') == 'erp')
    @can ('is-admin')
      @include ('partials.app-left-menu-button',
          [
              'btnRoute' => 'online-order',
              'iconFaClass' => 'fas fa-cloud-download-alt',
              'btnText' => 'Weborder',
          ])
    @endcan
  @elseif (env('SITE_TYPE') == 'ecs')
      @include ('partials.app-left-menu-button',
          [
              'btnRoute' => 'online-order',
              'iconFaClass' => 'fas fa-comment',
              'btnText' => 'Comments',
          ])
  @endif

</div>
