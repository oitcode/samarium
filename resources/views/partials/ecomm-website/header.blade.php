<div class="sticky-top-rm bg-white border-bottom">

  {{-- Show in bigger screens --}}
  <div class="container-fluid p-0 bg-warning-rm d-none d-md-block">
    <div class="d-flex justify-content-between h-100 bg-info-rm pl-2">


      <a href="{{ route('website-home') }}" class="text-decoration-none">
      <div class="d-flex">
        <div class="mr-4 d-flex flex-column justify-content-center">
            <img src="{{ asset('storage/' . $company->logo_image_path) }}" class="img-fluid" style="height: 100px;">
        </div>
        <div class="mt-3 d-none d-md-block mr-3">
          <h1 class="mt-2 text-dark" style="font-weight: bold; font-size: 1.5rem; text-shadow: 0px 1px, 1px 0px, 1px 0px;">
            {{ $company->name }}
          </h1>
          <div class="text-secondary">
            {{ $company->tagline }}
          </div>
        </div>
      </div>
      </a>

      <div class="flex-grow-1 d-flex justify-content-end">
        <div class="d-flex flex-column justify-content-center">
          <div>
            <input type="text" class="py-2 badge-pill-rm shadow mr-3" style="width: 400px;" placeholder="Search product">
            <button class="btn btn-success badge-pill">
              Search
            </button>
          </div>
        </div>
      </div>
  
      <div class="px-5 h-100-rm mt-3-rm bg-primary-rm border-rm border-left-primary text-white-rm"
          style="{{--background-color: #004;font-size: 1.2rem; font-weight: bold;--}} ">

        {{-- Shopping cart badge (checkout link) --}}
        @if (true)
          <div class="d-flex flex-column justify-content-center h-100">
            @livewire ('ecomm-website.shopping-cart-badge')
          </div>
        @else
          TEST
        @endif
      </div>
  
  
    </div>

    {{-- Product catefory menu --}}
    <div class="container-fluid border">
      <div class="container" style="font-size: 1.5rem; font-weight: bold;">
        @if (true)
          <div class="d-flex flex-column justify-content-center h-100">
            @include ('partials.ecomm-website.top-menu')
          </div>
        @endif
      </div>
    </div>

  </div>


  {{-- Show in smaller screens --}}
  <div class="container-fluid p-0 bg-warning-rm d-md-none">
    <div class="d-flex justify-content-between p-3">
      <a href="{{ route('website-home') }}" class="text-decoration-none">
        <div class="d-flex">
          <div class="mr-4 d-flex flex-column justify-content-center">
              <img src="{{ asset('storage/' . $company->logo_image_path) }}" class="img-fluid" style="height: 40px;">
          </div>
          <div class="mr-3">
            <h1 class="h6 text-dark" style="font-weight: bold;">{{ $company->name }}</h1>
            <div class="text-secondary">
              {{ $company->tagline }}
            </div>
          </div>
        </div>
      </a>

      {{-- Shopping cart badge (checkout link) --}}
      @if (true)
        <div class="d-flex flex-column justify-content-center h-100">
          @livewire ('ecomm-website.shopping-cart-badge')
        </div>
      @else
        TEST
      @endif
    </div>

    <div>
      @if (true)
        <div class="d-flex flex-column justify-content-center h-100">
          @include ('partials.ecomm-website.top-menu')
        </div>
      @endif
    </div>
  </div>

</div>
