<div class="sticky-top bg-white border">

  <div class="container-fluid p-0 bg-warning-rm">
    <div class="d-flex justify-content-between h-100 bg-info-rm pl-2">




      <div class="d-flex">
        <div class="mr-4 d-flex flex-column justify-content-center">
          <a href="{{ route('website-home') }}">
            <img src="{{ asset('storage/' . $company->logo_image_path) }}" class="img-fluid" style="height: 40px;">
          </a>
        </div>
        <div class="mt-3 d-none d-md-block mr-5">
          <h1 class="mt-2 text-dark" style="font-weight: bold; font-size: 2rem;">{{ $company->name }}</h1>
          <div class="text-secondary">
            {{ $company->tagline }}
          </div>
        </div>
      </div>
  
      <div class="pl-5 h-100-rm mt-3-rm flex-grow-1" style="font-size: 1.5rem; font-weight: bold;">
        {{-- Top menu --}}
        @if (true)
          <div class="d-flex flex-column justify-content-center h-100">
            @include ('partials.top-menu')
          </div>
        @endif
      </div>

      <div class="px-5 h-100-rm mt-3-rm bg-light border border-left-primary" style="font-size: 1.5rem; font-weight: bold;">

        {{-- Shopping cart badge (checkout link) --}}
        @if (true)
          <div class="d-flex flex-column justify-content-center h-100">
            @livewire ('website-shopping-cart-badge')
          </div>
        @else
          TEST
        @endif
      </div>
  
  
    </div>
  </div>

</div>
