<div>

  <div class="bg-white border p-3 mb-4">
    <div class="mb-4">
      <input type="text"
          class="mr-5 h-100 form-control w-50"
          style="{{-- height: 50px; --}} font-size: 1.5rem; {{-- background-color: #cfc; --}}"
          wire:model.defer="product_search_name"
          wire:keydown.enter="search"
          autofocus>
    </div>
    <div>
      @include ('partials.button-general', ['clickMethod' => "search", 'btnText' => 'Search',])
    </div>
  </div>

  <div class="p-3 bg-white border">

    @if ($products != null && count($products) > 0)
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
            {{ $product->selling_price }}
          </div>
        </div>
      @endforeach
    @endif

  </div>
</div>
