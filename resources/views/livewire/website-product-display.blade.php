<div>

  <div class="row">
    <div class="col-md-6 py-3">
      <h2 class="ml-2 mb-3">
        {{ $product->name }}
      </h2>
      <div class="table-responsive">
        <table class="table">
          <tbody>
            <tr>
              <th>
                Price
              </th>
              <td class="text-danger" style="font-size: 1.5rem;">
                Rs.
                @php echo number_format( $product->selling_price ); @endphp
              </td>
            </tr>
            <tr>
              <th>
                Description
              </th>
              <td class="text-secondary">
                {{ $product->description }}
              </td>
            </tr>
            <tr>
              <th>
                In stock
              </th>
              <td class="">
                <span class="badge badge-pill badge-success p-2">
                  Yes
                </span>
              </td>
            </tr>
            <tr>
              <th>
                Share
              </th>
              <td class="">
                <a href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}" target="_blank">
                  <button class="btn">
                    <i class="text-primary fab fa-facebook fa-2x mr-3"></i>
                  </button>
                </a>
              </td>
            </tr>

          </tbody>
        </table>
      </div>
    </div>
    <div class="col-md-6">
      <img class="img-fluid" src="{{ asset('storage/' . $product->image_path) }}" alt="Card image cap">
    </div>
  </div>
  <div class="p-3">
    <div class="row">
      <div class="col-md-6">
        <h2 class="my-3">
          Order / Inquiry
        </h2>
        @livewire ('website-product-order', ['product' => $product,])
      </div>
    </div>
  </div>
</div>
