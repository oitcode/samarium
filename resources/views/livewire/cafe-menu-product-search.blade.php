<div>


  <div class="bg-white border p-3 mb-4">
    <div class="mb-4">
      <h1 class="h5 font-weight-bold">
        Product search
      </h1>
    </div>
    <div class="my-4">
      <input type="text"
          class="mr-5 h-100 form-control"
          style="font-size: 1.5rem;"
          wire:model.defer="product_search_name"
          wire:keydown.enter="search"
          autofocus>
    </div>
    <div>
      @include ('partials.button-general', ['clickMethod' => "search", 'btnText' => 'Search',])
    </div>
  </div>


  @if ($searchDone)
    {{-- Show result count --}}
    <div class="my-3 p-3 border bg-white">
      Total: {{ count($products) }}
    </div>
  @endif

  {{-- Show search results --}}
  @if ($products != null && count($products) > 0)
    <div class="bg-white border p-3">

      @foreach ($products as $product)
        <div class="row py-3">
          <div class="col-md-2">
            @if ($product->image_path)
              <img src="{{ asset('storage/' . $product->image_path) }}" class="mr-3" style="width: 35px; height: 35px;">
            @else
              <i class="fas fa-dice-d6 fa-2x text-secondary" style="width: 35px; height: 35px;"></i>
            @endif
          </div>
          <div class="col-md-4" wire:click="$emit('displayProduct', {{ $product->product_id }})" role="button">
            <strong>
              {{ $product->name }}
            </strong>
          </div>
          <div class="col-md-6">
            Rs
            @php echo number_format($product->selling_price); @endphp
          </div>
        </div>
      @endforeach

    </div>
  @else
    <div class="bg-white border p-3">
      <i class="fas fa-exclamantion-circle mr-1"></i>
      No match found.
    </div>
  @endif


</div>
