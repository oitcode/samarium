<div>

  <div class="row">

    <div class="col-md-8">
      {{-- Search Bar --}}
      <div class="mb-4 p-3 border-rm shadow-sm d-flex-rm">

        <div class="float-left mr-3">
          <div>
            <label class="text-secondary">
              <i class="fas fa-user mr-3"></i>
              Name
            </label>
          </div>
          <input type="text" wire:model.defer="productSearch.name" style="font-size: 1.1rem;" wire:keydown.enter="search" />
        </div>

        <div class="float-left mr-3">
          <div>
            <label class="text-secondary">
              <i class="fas fa-phone mr-3"></i>
              Phone
            </label>
          </div>
          <input type="text" wire:model.defer="producSearch.phone" style="font-size: 1.1rem;" wire:keydown.enter="search" />
        </div>

        <div class="clearfix">
        </div>
      </div>

      {{-- Categories Bar --}}
      <div class="mb-4 p-3 border-rm shadow-sm d-flex-rm">

        <div class="row">
          <div class="col-md-2 border p-0">
            <button class="btn btn-success w-100 h-100" style="font-size: 1.3rem;" wire:click="enterMode('showFullMenuList')">
              Show all
            </button>
          </div>
          @foreach ($productCategories as $productCategory)
            <div class="col-md-2 border p-0">
              <button class="btn btn-danger w-100 h-100" style="font-size: 1.1rem;" wire:click="selectCategory('{{ $productCategory->product_category_id }}')">
                {{ $productCategory->name }}
              </button>
            </div>
          @endforeach
        </div>

      </div>


      <div class="row">
        @if ($modes['showFullMenuList'])
          @livewire ('cafe-menu-full-list')
        @elseif ($modes['updateProduct'])
          @livewire ('cafe-menu-product-edit', ['product' => $updatingProduct,])
        @else
          @if ($products != null && count($products) > 0)
            @foreach ($products as $product)
              <div class="col-md-4 mb-3">
                <div class="card">
                  <div class="card-header bg-warning-rm" {{--style="background-image: linear-gradient(to right, #7B3F00, #8B3F00);"--}}>
                    <span style="font-size: 1.3rem;">
                    {{ $product->name }}
                    </span>
                  </div>
                  <div class="card-body p-0">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="table-responsive">
                          <table class="table">
                            <tbody style="font-size: 1.3rem;">
                              @if (false)
                              <tr>
                                <th>
                                  {{ $product->name }}
                                </th>
                              </tr>
                              @endif
                              <tr>
                                <th>
                                  <span class="badge mr-2">
                                  Stock
                                  </span>
                                  @if ($product->stock_count != null)
                                    {{ $product->stock_count }}
                                  @else
                                  <span class="text-secondary">
                                    NA
                                  </span>
                                  @endif
                                </th>
                              </tr>
                              <tr>
                                <th>
                                  <i class="fas fa-rupee-sign"></i>
                                  @php echo number_format( $product->selling_price ); @endphp
                                </th>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                        <div class="p-2">
                          <button class="btn btn-success" wire:click="updateProduct({{ $product->product_id }})">
                            <i class="fas fa-pencil-alt mr-2"></i>
                            Edit
                          </button>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="d-flex justify-content-center h-100">
                          <div class="justify-content-center align-self-center text-center">
                            <h3 class="font-weight-bold text-info" style="font-size: 2.5rem;">
                              <img src="{{ asset('storage/' . $product->image_path) }}" class="img-fluid">
                            </h3>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            @endforeach
          @endif
        @endif
      </div>
    </div>
    <div class="col-md-4">
      <div class="mb-3">
        @livewire ('cafe-menu-product-create')
      </div>
      <div class="mb-3">
        @livewire ('cafe-menu-product-category-create')
      </div>
    </div>
  </div>
</div>
