<div class="card w-100">
  <div class="card-body p-0">
  @foreach ($productCategories as $productCategory)
    <h2 class="p-3">
      {{ $productCategory->name }}
    </h2>

    <div class="table-responsive">
      <table class="table table-striped table-hover" style="font-size: 1.3rem;">
        @if (false)
        <thead>
          <tr>
            <th>
              Item
            </th>
            <th>
              Price
            </th>
          </tr>
        </thead>
        @endif
        <tbody>
          @foreach ($productCategory->products as $product)
            <tr>
              <td>
                <img src="{{ asset('storage/' . $product->image_path) }}" class="mr-3" style="width: 40px; height: 40px;">
                {{ $product->name }}
              </td>
              <td>
                Rs
                {{ $product->selling_price }}
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>

  @endforeach
  </div>
</div>
