<div class="d-inline-block bg-danger h-100">
  <nav class="navbar navbar-light-rm navbar-expand-lg navbar-dark-rm bg-danger-rm h-100" style="font-size: 1rem; background-color: #eee; !important">
    <button class="navbar-toggler border border-white" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
  
        @php
          $i = 0;
        @endphp

        @foreach ($productCategories as $productCategory)
          <li class="nav-item text-white mr-3 pr-3 border-rm">
            <a class="nav-link text-primary-rm"
                href="{{ route('website-product-category-product-list', [$productCategory->product_category_id, $productCategory->name]) }}"
                style="color: #000;">
              <i class="fas fa-dot text-info mr-2"></i>
              {{ $productCategory->name }}
              <span class="sr-only">(current)</span>
            </a>
          </li>
          @php
            $i++;
          @endphp
          @if ($i == 4)
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
                {{ $productCategory->name }}
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
