{{-- Show on smaller screens --}}
<div class="row p-3 justify-content-between-rm bg-light-rm mb-4 d-md-none" style="margin: auto;">

  <div class="col-6 mr-3-rm mb-3 p-0 pr-3">
    <a href="{{ route('sale') }}" class="btn btn-light p-3 w-100">
      @if (env('CMP_TYPE') == 'cafe')
        <i class="fas fa-skating mr-3"></i>
        <br/>
        Takeaway
      @else
        <i class="fas fa-dice-d6 mr-3"></i>
        <br/>
        Sales
      @endif
    </a>
  </div>

  @if (env('CMP_TYPE') == 'cafe')
  <div class="col-6 mr-3-rm mb-3 p-0 pr-3">
    <a href="{{ route('cafesale') }}" class="btn btn-light p-3 w-100">
      <i class="fas fa-table mr-3"></i>
      <br/>
      Tables
    </a>
  </div>
  @endif

  @can ('is-admin')
  <div class="col-6 mr-3-rm mb-3 p-0 pr-3">
    <a href="{{ route('daybook') }}" class="btn btn-light p-3 w-100">
      <i class="fas fa-book mr-3"></i>
      <br/>
      Daybook
    </a>
  </div>
  @endcan

  @can ('is-admin')
  <div class="col-6 mr-3-rm mb-3 p-0 pr-3">
    <a href="{{ route('weekbook') }}" class="btn btn-light p-3 w-100">
      <i class="fas fa-book mr-3"></i>
      <br/>
      Weekbook
    </a>
  </div>
  @endcan

  @can ('is-admin')
  <div class="col-6 mr-3-rm mb-3 p-0 pr-3">
    <a href="{{ route('menu') }}" class="btn btn-light p-3 w-100">
      @if (env('CMP_TYPE') == 'cafe')
        <i class="fas fa-list mr-3"></i>
        <br/>
        Menu
      @else
        <i class="fas fa-list mr-3"></i>
        <br/>
        Products
      @endif
    </a>
  </div>
  @endcan

  @can ('is-admin')
  <div class="col-6 mr-3-rm mb-3 p-0 pr-3">
    <a href="{{ route('customer') }}" class="btn btn-light p-3 w-100">
      <i class="fas fa-users mr-3"></i>
      <br/>
      Customer
    </a>
  </div>
  @endcan

  @can ('is-admin')
  <div class="col-6 mr-3-rm mb-3 p-0 pr-3">
    <a href="{{ route('online-order') }}" class="btn btn-light p-3 w-100">
      <i class="fas fa-cloud-download-alt mr-3"></i>
      <br/>
      Weborders
    </a>
  </div>
  @endcan

</div>
