<div class="card h-100 shadow">
  <div class="text-center">
    <img class="card-img-top img-fluid" src="{{ asset('storage/' . $product->image_path) }}" alt="Card image cap"
    style="height: 100px; width: 100px;">
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table">
        <tbody>
          <tr>
            <th style="font-size: 1.5rem; font-weight: bold;">
              {{ $product->name }}
            </th>
          </tr>
          <tr>
            <td class="text-danger" style="font-size: 1.5rem;">
              @if (false)
              <i class="fas fa-rupee-sign mr-2"></i>
              @endif
              Rs.
              @php echo number_format( $product->selling_price ); @endphp
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="">
      <a href="{{ route('website-product-view', [ $product->product_id, str_replace(' ', '-', $product->name),]) }}">
        <button class="btn btn-warning px-4 py-3" style="background-color: orange;" class="mb-3">
          View
        </button>
      </a>
      <a href="{{ route('website-product-view', [ $product->product_id, str_replace(' ', '_', $product->name),]) }}">
        <button class="btn btn-success px-4 py-3">
          Order
        </button>
      </a>
    </div>
  </div>
</div>
