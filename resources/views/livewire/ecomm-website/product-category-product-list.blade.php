<div class="p-3-rm border-rm bg-warning-rm">

  @if (false)
  <div>
  <span class="bg-primary-rm" style="border-bottom: 5px solid purple;">
    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
  </span>
  </div>
  @endif

  <div class="bg-danger text-white py-3 px-2 pl-3-rm border-rm shadow-sm-rm d-flex justify-content-between"
      style="{{-- background-color: #000; color: #555;  border: 10px solid #aaf;--}} font-size: 1.15rem; border-left: 10px solid brown;">
    <div class="h2 font-weight-bold pt-3" style=" {{-- background-color: white; color: black;--}} ">
      @if (false)
      <i class="fas fa-home mr-1"></i>
      <a class="text-primary-rm text-reset"
          href="{{ route('website-home') }}"
          style="color: #000;">
        <i class="fas fa-dot text-info mr-2"></i>
        @if (false)
        Products
        @endif
      </a>

      @endif
      <i class="far fa-dot-circle mx-1"></i>
      {{ $productCategory->name }}
    </div>
  </div>

  <div class="my-2 mb-4 text-scondary-rm px-3 h5 text-secondary">
    @if (false)
    <small>
    @endif
    @if (false)
    Displaying
    {{ count($productCategory->products) }}
    out of
    {{ count($productCategory->products) }}
    products
    @endif
    @if (false)
    </small>
    @endif
  </div>


  {{-- Show in smaller screens --}}
  @if (false)
  <div class="d-md-none">
    <div class="table-responsive">
      <table class="table">
        <tbody>
          @foreach ($productCategory->products as $product)
            <tr wire:key="{{ $loop->index * rand() }}">
              <td>
                @if ($product->image_path)
                  <img src="{{ asset('storage/' . $product->image_path) }}" class="mr-3" style="width: 75px; height: 75px;">
                @else
                  <div class="h-100 d-flex justify-content-center">
                    <div class="d-flex flex-columns justify-content-center">
                    </div>
                  </div>
                  <i class="fas fa-check-circle fa-2x"></i>
                @endif
              </td>
              <td>
                <div class="mb-3">
                  <a href="{{ route('website-product-view', [$product->product_id, $product->name]) }}">
                    {{ $product->name }}
                  </a>
                </div>
                <div>
                  Rs
                  {{ $product->selling_price }}
                </div>
              </td>
              <td>
                <button href="" class="btn text-danger border-danger"
                    wire:click="addItemToCart({{ $product->product_id }})"
                    wire:key="{{ $loop->index }} * rand() ">
                  <i class="fas fa-shopping-cart"></i>
                  Cart
                <span wire:loading class="spinner-border text-white" role="status" style="font-size: 0.8rem;">
                </span>
                </button>
              </td>
            </tr>
          @endforeach
        <tbody>
      </table>
    </div>
  </div>
  @endif

  {{-- Show in bigger screens --}}
  <div class="d-none-rm d-md-block-rm">

    {{-- First deal with its sub product categories --}}
    @if ($productCategory->subProductCategories)
      @foreach ($productCategory->subProductCategories as $subProductCategory)
        <div class="bg-primary-rm text-white-rm py-1 px-2 pl-3-rm border-rm shadow-sm-rm d-flex justify-content-between"
            style="font-size: 1.15rem; border-left: 10px solid brown; background-color: #531; color: white;">
          <div class="h2 font-weight-bold pt-3">
            <i class="far fa-dot-circle mx-1"></i>
            {{ $subProductCategory->name }}
          </div>
        </div>

        <div class="my-3">
          @if (count($subProductCategory->products) > 0)
            <div class="row" wire:key="{{ rand() }}">
              @foreach ($subProductCategory->products as $product)
                <div class="col-6 col-md-3 mb-4">
                  @livewire ('ecomm-website.product-list-display', ['product' => $product,])
                </div>
              @endforeach
            </div>
          @else
            <div class="p-2 text-secondary" style="font-size: 1.3rem;">
              No products
            </div>
          @endif
        </div>
      @endforeach
    @endif

    {{-- Now deal with its products --}}
    @if (count($productCategory->products) > 0)
      @if ($productCategory->subProductCategories)
        <div class="my-3 bg-danger-rm" style="background-color: #531; color: white;">
          &nbsp;
        </div>
      @endif
      <div class="row" wire:key="{{ rand() }}">
        @foreach ($productCategory->products as $product)
          <div class="col-6 col-md-3 mb-4">
            @livewire ('ecomm-website.product-list-display', ['product' => $product,])
          </div>
        @endforeach
      </div>
    @else
      <div class="p-2 text-secondary" style="font-size: 1.3rem;">
        No products
      </div>
    @endif
  </div>

  </div>
</div>
