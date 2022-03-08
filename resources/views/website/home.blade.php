<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/fontawesome-free/css/all.css') }}" rel="stylesheet">

    <!-- Livewire -->
    @livewireStyles
</head>
<body>
  @if (! $company)
    <div class="p-5 bg-danger text-white text-center">
      <h3 class="h5 font-weight-bold">
        Create Company in dashboard ...
      </h3>

      <br />
      <br />

      <h3 class="h5 font-weight-bold">
        &copy; OIT | www.oit.com.np
      </h3>
    </div>
  @else
  <div class="p-0">

    @include ('partials.header')

    {{-- Tagline --}}
    @if (false)
    <div class="container-fluid border">
      <div class="container py-2 text-secondary">
        {{ $company->tagline }}
      </div>
    </div>
    @endif


    {{-- Body --}}
    @if (false)
    <div class="container-fluid bg-light-rm py-5" style="background-color: #eee;">
      <div class="container mb-4">
        <div class="row">
          @if (true)
          <div class="col-md-4">
            @foreach ($products as $product)
              <div class="col-md-12 mb-3 h-80 p-0">
                <div class="card h-100 shadow p-0">
                  <div class="text-center">
                    <img class="card-img-top img-fluid" src="{{ asset('storage/' . $product->image_path) }}" alt="Card image cap"
                    style="height: 100px; width: 100px;">
                  </div>
                  <div class="card-body p-0">
                    <div class="table-responsive">
                      <table class="table">
                        <tbody>
                          <tr>
                            <th style="font-size: 1.5rem; font-weight: bold;">
                              {{ $product->name }}
                            </th>
                            <td class="text-danger" style="font-size: 1.5rem;">
                              @if (false)
                              <i class="fas fa-rupee-sign mr-2"></i>
                              @endif
                              Rs.
                              {{ $product->selling_price }}
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                    <div class="text-center">
                      @if (false)
                      <button class="btn btn-danger px-4 py-3">
                        Order
                      </button>
                      @endif
                    </div>
                  </div>
                </div>
              </div>
              @break
            @endforeach

            <div class="h-20 mb-3">
              @livewire ('website-hero-order')
            </div>

          </div>
          @endif

          <div class="col-md-6 bg-white border">
            @if (false)
            @endif


            <div class="py-3 d-none d-md-block">
              <div class="">
                <div>
                  @if (false)
                  <div class="text-danger" style="font-size: 3rem;">
                    {{ $company->name }}
                  </div>
                  @endif
                  <div class="" style="">
                    @foreach ($productCategories as $productCategory)
                      <div class="d-inline mr-3">
                        <img src="{{ asset('storage/' . $productCategory->image_path) }}" style="wigth: 300px; height: 100px;">
                      </div>
                    @endforeach
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
    @endif

    {{-- Second para --}}
    @if (false)
    <div class="container-fluid bg-light-rm border p-0 mb-4" style="{{--background-image: linear-gradient(to right, maroon, orange);--}}">
      <div class="container">
        <div class="row p-0 bg-danger-rm">
          <div class="col-md-4">
            <button class="btn btn-warning-rm mr-3 text-white" style="height: 120px; width: 350px; font-size: 2.5rem; background-color: maroon;" wire:click="">
              <i class="fas fa-list mr-3"></i>
              Our Products
            </button>
            @if (false)
            <h2 class="mt-3">KOREAN</h2>
            @endif
          </div>
          <div class="col-md-4">
          </div>
          <div class="col-md-4">
          </div>
        </div>
      </div>
    </div>
    @endif

    {{-- Category mednu --}}
    <div class="container p-3 mb-3">
      <h2>
        Categories
      </h2>
      <div class="row">
        @foreach ($productCategories as $productCategory)
          <div class="col-md-2 border p-0">
            <div class="card h-100 shadow">
              <div class="text-center">
                <img class="card-img-top img-fluid" src="{{ asset('storage/' . $productCategory->image_path) }}" alt="Card image cap"
                style="height: 100px; width: 100px;">
              </div>
              <div class="card-body">
                <div class="text-center" style="font-size: 1.3rem;">
                {{ $productCategory->name }}
                </div>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>

    {{-- Third para --}}
    @if (true)
    <div class="container-fluid bg-light-rm border p-4 mb-4-rm">
      <div class="container">
        <div class="row">
          @foreach ($products as $product)
            <div class="col-md-4 mb-3">
              <div class="card h-100 shadow">
                <div class="text-center">
                  <img class="card-img-top img-fluid" src="{{ asset('storage/' . $product->image_path) }}" alt="Card image cap"
                  style="height: 100px; width: 100px;">
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <tbody>
                        <tr>
                          <th style="font-size: 1.5rem; font-weight: bold;">
                            {{ $product->name }}
                          </th>
                        </tr>
                        <tr>
                          <td class="text-danger" style="font-size: 1.5rem;">
                            @if (false)
                            <i class="fas fa-rupee-sign mr-2"></i>
                            @endif
                            Rs.
                            {{ $product->selling_price }}
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <div class="">
                    <a href="{{ route('website-product-view', [ $product->product_id, str_replace(' ', '-', $product->name),]) }}">
                      <button class="btn btn-warning px-4 py-3" style="background-color: orange;">
                        View
                      </button>
                    </a>
                    <a href="{{ route('website-product-view', [ $product->product_id, str_replace(' ', '_', $product->name),]) }}">
                      <button class="btn btn-success px-4 py-3">
                        Order
                      </button>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </div>
    @endif

    <div class="container-fluid bg-light-rm border pt-4 pb-5 text-white-rm" style="background-color: #eee;">
      <div class="container">
        @include ('partials.footer')
      </div>
    </div>

  </div>
  @endif

  <!-- Livewire scripts -->
  @livewireScripts
</body>
</html>
