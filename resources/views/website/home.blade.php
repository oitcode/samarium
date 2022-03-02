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
  <div class="p-0">

    {{-- HEADER --}}
    <div class="o-ws-header bg-success-rm text-white p-3 mb-4" style="background-color: maroon;">
      <div class="float-left mt-3">
        <h1 style="font-weight: bold;">Kimchi Ramen</h1>
      </div>
      <div class="float-right">
        <img src="{{ asset('img/logo_1.jpg') }}" class="img-fluid" style="height: 80px;">
      </div>
      <div class="float-right mr-4 h-100 mt-3" style="font-size: 1.8rem; font-weight: bold;">
        <div class="d-flex justify-content-center h-100">
          <div class="justify-content-center h-100 align-self-center text-center">
            <i class="fas fa-phone mr-3"></i> +977 1 4429384
          </div>
        </div>
      </div>
      <div class="float-right mr-5 h-100 mt-3" style="font-size: 1.8rem; font-weight: bold;">
        <div class="d-flex justify-content-center h-100">
          <div class="justify-content-center h-100 align-self-center text-center">
            <i class="fas fa-phone mr-3"></i> +977 9851265656
          </div>
        </div>
      </div>
      <div class="float-right mr-5 h-100 mt-3" style="font-size: 1.8rem; font-weight: bold;">
        <div class="d-flex justify-content-center h-100">
          <div class="justify-content-center h-100 align-self-center text-center">
            <span class="" style="font-size: 2rem; font-weight:bold;">
              <i class="fab fa-facebook-f"></i>
            </span>
          </div>
        </div>
      </div>
      <div class="clearfix">
      </div>
    </div>

    {{-- Body --}}
    <div class="container mb-4">
      <div class="row">
        <div class="col-md-6">
          <div class="row">

            <div class="col-md-4 mb-3">
              <img src="{{ asset('img/logo_1.jpg') }}" class="img-fluid" {{-- style="height: 80px;" --}}>
            </div>
            <div class="col-md-4 mb-3">
              <img src="{{ asset('img/logo_1.jpg') }}" class="img-fluid" {{-- style="height: 80px;" --}}>
            </div>
            <div class="col-md-4 mb-3">
              <img src="{{ asset('img/logo_1.jpg') }}" class="img-fluid" {{-- style="height: 80px;" --}}>
            </div>

            <div class="col-md-4 mb-3">
              <img src="{{ asset('img/logo_1.jpg') }}" class="img-fluid" {{-- style="height: 80px;" --}}>
            </div>
            <div class="col-md-4 mb-3">
              <img src="{{ asset('img/logo_1.jpg') }}" class="img-fluid" {{-- style="height: 80px;" --}}>
            </div>
            <div class="col-md-4 mb-3">
              <img src="{{ asset('img/logo_1.jpg') }}" class="img-fluid" {{-- style="height: 80px;" --}}>
            </div>

          </div>

          <div>
            @livewire ('website-hero-order')
          </div>

        </div>
        <div class="col-md-6">
          <img src="{{ asset('img/logo_1.jpg') }}" class="img-fluid" {{-- style="height: 80px;" --}}>
        </div>
      </div>
    </div>

    {{-- Second para --}}
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

    {{-- Third para --}}
    @if (true)
    <div class="container-fluid bg-light-rm border p-4 mb-4">
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
                          <td class="text-danger" style="font-size: 1.5rem;">
                            <i class="fas fa-rupee-sign mr-2"></i>
                            {{ $product->selling_price }}
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <div class="text-center">
                    <button class="btn btn-danger px-4 py-3">
                      Order
                    </button>
                  </div>
                </div>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </div>
    @endif

    <div class="container-fluid bg-light-rm border pt-4 pb-5 text-white" style="background-color: maroon;">
      <div class="container">
        @include ('partials.footer')
      </div>
    </div>

  </div>

    <!-- Livewire scripts -->
    @livewireScripts
</body>
</html>
