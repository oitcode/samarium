@extends ('ecomm-website.base')

@section ('content')
  <div class="container p-3">
    <div class="row">

      <div class="col-md-8 pt-4 pt-md-0">
        <div class="bg-white border">
          <h2 class="h4 font-weight-bold mb-4-rm p-3">
            {{ Auth::user()->name }}
          </h2>

          {{-- Basic info --}}
          <div class="table-responsive">
            <table class="table mb-0">
              <tr>
                <th>Name</th>
                <td>{{ Auth::user()->name }}</td>
              </tr>
              <tr>
                <th>Email</th>
                <td>{{ Auth::user()->email }}</td>
              </tr>
            </table>
          </div>

        </div>

        {{-- Cart --}}
        <div class="bg-white border my-3 p-3">
          <h2 class="h5 font-weight-bold">
            Your cart
          </h2>
          <div class="text-secondary">
            Visit
            <a href="{{ route('website-checkout') }}">checkout</a>
            page to view your shoppping cart.
          </div>
        </div>

        {{-- Orders --}}
        <div class="bg-white border my-3 p-3">
          <h2 class="h5 font-weight-bold">
            Your orders
          </h2>
          <div class="text-secondary">
            <i class="fas fa-exclamation-circle mr-1"></i>
            No previous orders
          </div>
        </div>

      </div>

      <div class="col-md-4 bg-primary-rm pt-3" style="background-image: linear-gradient(to bottom right, #eee, #eee);">
        <div class="d-none d-md-block">
          <div class="d-flex justify-content-center h-100">
            <div class="d-flex flex-column justify-content-center">
              <h2 class="h2 font-weight-bold text-white-rm mb-4">
                <i class="fas fa-user-circle fa-2x text-secondary"></i>
              </h2>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
