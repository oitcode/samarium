<div class="sticky-top bg-white">

  <div class="container">
    <div class="o-ws-header bg-success-rm text-white-rm p-3 mb-4-rm border-bottom" style="{{--background-color: maroon;--}}">
      <a href="{{ route('website-home') }}">
        <div class="float-left mr-4">
          <img src="{{ asset('storage/' . $company->logo_image_path) }}" class="img-fluid" style="height: 80px;">
        </div>
        <div class="float-left mt-3 d-none d-md-block">
          <h1 class="mt-2 text-dark" style="font-weight: bold; font-size: 2rem;">{{ $company->name }}</h1>
          <div class="text-secondary">
            {{ $company->tagline }}
          </div>
        </div>
      </a>
  
  
  
     <div class="float-right mr-5 h-100 mt-3" style="font-size: 1.5rem; font-weight: bold;">
       @livewire ('website-shopping-cart-badge')
     </div>
  
  
      <div class="clearfix">
      </div>
    </div>
  </div>
</div>
