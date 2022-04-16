<div>
  @if (true)
  <div class="mb-3">
    <button class="btn
        @if ($modes['createProduct'])
          btn-success
        @endif
        m-0 border shadow-sm badge-pill"
        style="height: 75px; width: 150px; font-size: 1.3rem;"
        wire:click="enterMode('createProduct')">
      <i class="fas fa-plus-circle mr-3"></i>
      New
    </button>

    <button class="btn
        @if ($modes['createProductCategory'])
          btn-success
        @endif
        m-0 border shadow-sm badge-pill"
        style="height: 75px; {{-- width: 150px; --}} font-size: 1.3rem;"
        wire:click="enterMode('createProductCategory')">
      <i class="fas fa-plus-circle mr-3"></i>
      Category
    </button>

    @if (false)
    <button class="btn btn-success-rm m-0 border shadow-sm badge-pill"
        style="height: 75px; width: 150px; font-size: 1.3rem;"
        wire:click="">
      <i class="fas fa-list mr-3"></i>
      List
    </button>

    <button class="btn btn-success-rm m-0 border shadow-sm badge-pill"
        style="height: 75px; width: 150px; font-size: 1.3rem;"
        wire:click="">
      <i class="fas fa-chart-line mr-3"></i>
      Report
    </button>

    <button class="btn btn-success-rm m-0 border shadow-sm badge-pill"
        style="height: 75px; width: 150px; font-size: 1.3rem;"
        wire:click="">
      <i class="fas fa-search mr-3"></i>
      Search
    </button>
    @endif

    <button wire:loading class="btn m-0"
        style="height: 100px; width: 225px; font-size: 1.5rem;">
      <span class="spinner-border text-info mr-3" role="status">
      </span>
    </button>


    <div class="clearfix">
    </div>
  </div>
  @endif

  <div class="row">

    <div class="col-md-8">

    @if (session()->has('message'))
      <div>
        <div class="alert alert-success">
          {{ session('message') }}
        </div>
      </div>
    @endif

      @if ($modes['createProduct'])
        @livewire ('cafe-menu-product-create')
      @elseif ($modes['createProductCategory'])
        @livewire ('cafe-menu-product-category-create')
      @elseif ($modes['updateProduct'])
        @livewire ('cafe-menu-product-edit', ['product' => $updatingProduct,])
      @elseif ($modes['updateProductCategory'])
        @livewire ('cafe-menu-product-category-edit', ['productCategory' => $updatingProductCategory,])
      @else
      {{-- Categories Bar --}}
      <div class="mb-0 p-3 pb-0 border-rm d-flex-rm">


        {{-- Show in smaller screens --}}
        <div class="d-md-none">
          <nav class="navbar navbar-expand-lg navbar-light bg-light" style="font-size: 1.2rem;">
            <button class="navbar-toggler border border-white-rm" type="button" data-toggle="collapse" data-target="#cafeMenuProductCategories" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>

            <span class="text-secondary">
              Categories
            </span>
          
            <div class="collapse navbar-collapse mt-3" id="cafeMenuProductCategories">
              <ul class="navbar-nav mr-auto">
                <li class="nav-item text-white-rm mr-3 pr-3">
                  <a class="nav-link text-white-rm" href="" wire:click.prevent="enterMode('showFullMenuList')">
                    Show All
                  </a>
                </li>
                @foreach ($productCategories as $productCategory)
                  <li class="nav-item text-white-rm mr-3 pr-3">
                    <a class="nav-link text-white-rm" href="" wire:click.prevent="selectCategory('{{ $productCategory->product_category_id }}')">
                      <img src="{{ asset('storage/' . $productCategory->image_path) }}" style="height: 40px; width: 40px;" class="rounded-circle-rm">
                      <span class="ml-3">
                      {{ $productCategory->name }}
                      </span>
                    </a>
                  </li>
                @endforeach
              </ul>
            </div>
          </nav>
        </div>

        {{-- Show in bigger screens --}}
        <div class="d-none d-md-block">
          <div class="row">
            <div class="col-md-2 border p-0">
              <button class="btn btn-success w-100 h-100" style="font-size: 1.3rem;" wire:click="enterMode('showFullMenuList')">
                Show all
              </button>
            </div>
            @foreach ($productCategories as $productCategory)
              <div class="col-md-2 border p-0">
                <button class="btn btn-danger-rm w-100 h-100 bg-white" style="font-size: 1.1rem;" wire:click="selectCategory('{{ $productCategory->product_category_id }}')">
                  {{ $productCategory->name }}
                </button>
              </div>
            @endforeach
          </div>
        </div>

      </div>


      <div class="row">
        @if ($modes['showFullMenuList'])
          @livewire ('cafe-menu-full-list')
        @else
          @if ($products != null && count($products) > 0)
            <div class="table-responsive border">
              <table class="table table-hover" style="font-size: 1.3rem;">

                <thead>
                  <tr>
                    <th colspan="2">
                      Item
                    </th>
                    <th>
                      Stock
                    </th>
                    <th>
                      Price
                    </th>
                    <th>
                      Action
                    </th>
                  </tr>
                </thead>

                <tbody>
                  @foreach ($products as $product)
                    <tr>
                <td>
                  <img src="{{ asset('storage/' . $product->image_path) }}" class="mr-3" style="width: 75px; height: 75px;">
                </td>
                      <td>
                        {{ $product->name }}
                      </td>
                      <td>
                        @if ($product->stock_count)
                          {{ $product->stock_count }}
                        @else
                          <div style="font-size: 1rem;">
                            <i class="fas fa-exclamation-circle mr-3 text-danger"></i>
                            No info
                          </div>
                        @endif
                      </td>
                      <td>
                        @php echo number_format( $product->selling_price ); @endphp
                      </td>
                      <td>
                        <button href="" class="btn text-primary border-primary rounded-circle"
                          wire:click="$emit('updateProduct', {{ $product->product_id }})">
                          <i class="fas fa-pencil-alt"></i>
                        </button>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          @endif
        @endif
      </div>
    </div>
    <div class="col-md-4">
    </div>
  </div>
      @endif
</div>
