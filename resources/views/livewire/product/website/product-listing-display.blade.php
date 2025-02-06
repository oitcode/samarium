<div>
  
  <div class="bg-white border my-3 p-3 shadow-sm">
    <div class="mb-3">
      <button class="btn btn-outline-success">
        <i class="fas fa-heart mr-1"></i>
        Save
      </button>
    </div>
    <div class="row" style="margin: auto;">
      <div class="col-md-6 p-0">
        @if ($product->image_path)
          <img class="img-fluid" src="{{ asset('storage/' . $product->image_path) }}" alt="{{ $product->name }}">
        @else
          <i class="fas fa-ellipsis-h fa-10x text-muted m-5"></i>
        @endif
      </div>
      <div class="col-md-6 py-4 py-md-0 pl-0 pl-md-4">
        <h2 class="h6 o-heading text-success mb-1">
          Rs
          {{ $product->selling_price }}
        </h2>
        <div class="mb-1">
          {{ $product->description }}
        </div>
        <div class="mb-3">
          <i class="fas fa-map-marker-alt mr-2 text-success"></i>
          Lorem ipsum
        </div>
        <div class="border p-3 mb-3" style="background-color: #ddd;">
          <div class="row" style="margin: auto;">
            @foreach ($product->productFeatures as $productFeature)
              <div class="col-md-6 p-0 mb-2">
                <i class="fas fa-plus-circle mr-1 text-success"></i>
                {{ $productFeature->feature }}
              </div>
            @endforeach
          </div>
        </div>

        <div class="">
          <div class="row" style="margin: auto;">
            <div class="col-md-6 px-1 mb-2">
              <a href="{{ route('website-product-view', [$product->product_id, str_replace(' ', '-', $product->name)]) }}">
                <button class="btn btn-block btn-success o-heading text-white">
                  View Property
                </button>
              </a>
            </div>
            <div class="col-md-6 px-1 mb-2">
              <button class="btn btn-block btn-success o-heading text-white">
                Send Enquiry
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="mt-3">
      <i class="fas fa-user-circle mr-1"></i>
      John Doe
      <br/>
      2025-04-12
    </div>
  </div>

</div>
