@if (false)
<div class="container p-3 mb-3">
  @if (false)
  <h2>
    Categories
  </h2>
  @endif
  <div class="row">
    @foreach ($productCategories as $productCategory)
        <div class="col-md-2 border p-0">
          <a href="{{ route('website-product-category-product-list', [$productCategory->product_category_id, $productCategory->name]) }}">
            <button class="btn btn-danger w-100 h-100" style="font-size: 1.1rem;">
              {{ $productCategory->name }}
            </button>
          </a>
        </div>
    @endforeach
  </div>
</div>
@endif

<div class="container">
  <nav class="navbar navbar-expand-lg navbar-dark bg-danger" style="font-size: 1.2rem;">
    @if (false)
    <a class="navbar-brand" href="#">Furniture Delights</a>
    @endif
    <button class="navbar-toggler border border-white" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
  
        @foreach ($productCategories as $productCategory)
          <li class="nav-item text-white border-right mr-3 pr-3">
            <a class="nav-link text-white" href="{{ route('website-product-category-product-list', [$productCategory->product_category_id, $productCategory->name]) }}">
              {{ $productCategory->name }}
              <span class="sr-only">(current)</span>
            </a>
          </li>
        @endforeach
  
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            More
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
        </li>
        @if (false)
        <li class="nav-item">
          <a class="nav-link disabled" href="#">Disabled</a>
        </li>
        @endif
      </ul>
      @if (false)
      <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form>
      @endif
    </div>
  </nav>
</div>
