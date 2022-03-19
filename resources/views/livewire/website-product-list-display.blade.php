<div class="card h-100 shadow">
  <div class="text-center">
    <img class="card-img-top img-fluid" src="{{ asset('storage/' . $product->image_path) }}" alt="Card image cap"
    style="height: 100px; width: 100px;">
  </div>
  <div class="card-body p-0">
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
              <span wire:loading class="spinner-border text-info ml-4" role="status">
              </span>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="p-2">
      <div class="float-left w-50">
        <a href="{{ route('website-product-view', [ $product->product_id, str_replace(' ', '-', $product->name),]) }}" class="w-100">
          <button class="btn btn-warning px-4 py-3 w-100" style="background-color: orange; font-size: 1.3rem;" class="mb-3">
            <i class="fas fa-shopping-cart mr-3"></i>
            Order
          </button>
        </a>
      </div>
      <div class="float-left w-50">
        <a href="" wire:click.prevent="addItemToCart({{ $product->product_id }})" class="w-100">
          <button class="btn btn-success px-4 py-3 w-100" style="font-size: 1.3rem;">
            <i class="fas fa-shopping-cart mr-3"></i>
            Cart
          </button>
        </a>
      </div>
      <div class="clearfix">
      </div>
    </div>
  </div>
</div>
