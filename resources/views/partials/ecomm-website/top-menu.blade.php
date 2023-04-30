@if (false)
<div class="d-inline-block bg-danger h-100">
  {{-- Nav menu --}}
  <nav class="navbar navbar-light navbar-expand-lg navbar-dark-rm bg-light h-100" style="font-size: 1rem; background-color: #eee; !important">
    <button class="navbar-toggler border border-white" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
  
        @php
          $i = 0;
        @endphp

        @foreach ($productCategories as $productCategory)
          <li class="nav-item text-white-rm mr-3 pr-3 border-rm border-rm border-md-none badge-pill-rm">
            <a class="nav-link text-primary-rm btn-rm btn-outline-success-rm badge-pill-rm text-reset-rm"
                href="{{ route('website-product-category-product-list', [$productCategory->product_category_id, $productCategory->name]) }}"
                style="{{--color: #000;--}}">
              @if (false)
              <i class="fas fa-star text-info-rm mr-2"></i>
              @endif
              {{ $productCategory->name }}
            </a>
          </li>
          @php
            $i++;
          @endphp
          @if ($i == 8)
            @break
          @endif
        @endforeach
  
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-secondary" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            More
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            @php
              $j = 0;
            @endphp
            @foreach ($productCategories as $productCategory)
              @if ($j >= $i)
              <a class="dropdown-item"
                href="{{ route('website-product-category-product-list', [$productCategory->product_category_id, $productCategory->name]) }}">
                <i class="fas fa-angle-right text-info mr-2"></i>
                {{ $productCategory->name }}
                OLA
              </a>
              @endif
              @php
                $j++;
              @endphp
            @endforeach
          </div>
        </li>
      </ul>
    </div>
  </nav>
</div>
@endif

<div class="">
    @livewire ('ecomm-website.top-menu')
</div>
