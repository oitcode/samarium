<div class="d-none d-md-block bg-dark text-white">
  <div class="d-flex justify-content-between o-darker py-2">
    @guest
    @else
      <div class="p-2 px-3">
        <i class="fas fa-check-circle text-success mr-1"></i>
        <span class="o-heading text-success">
          {{ config('app.name') }}
        </span>
      </div>

      {{-- Top menu buttons. --}}
      <div>
        {{-- User related. Is placed on top right part. --}}
        @include ('partials.dashboard.app-top-menu-user-dropdown')
      </div>
    @endguest
  </div>
</div>
