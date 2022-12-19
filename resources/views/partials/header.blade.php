<div class="sticky-top bg-white border">

  <div class="container-fluid p-0 bg-warning-rm">
    <div class="d-flex justify-content-between h-100 bg-info-rm pl-2">


      <a href="{{ route('website-home') }}" class="text-decoration-none">
      <div class="d-flex">
        <div class="mr-4 d-flex flex-column justify-content-center">
            <img src="{{ asset('storage/' . $company->logo_image_path) }}" class="img-fluid" style="height: 40px;">
        </div>
        <div class="mt-3 d-none d-md-block mr-3">
          <h1 class="mt-2 text-dark" style="font-weight: bold; font-size: 1.5rem;">{{ $company->name }}</h1>
          <div class="text-secondary">
            {{ $company->tagline }}
          </div>
        </div>
      </div>
      </a>
  
      <div class="pl-5-rm h-100-rm mt-3-rm flex-grow-1" style="font-size: 1.5rem; font-weight: bold;">
        {{-- Top menu --}}
        @if (true)
          <div class="d-flex flex-column justify-content-center h-100">
            @include ('partials.top-menu')
          </div>
        @endif
      </div>

      <div class="px-5 h-100-rm mt-3-rm bg-primary border border-left-primary text-white"
          style="{{--background-color: #004;--}} font-size: 1.2rem; font-weight: bold;">

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
