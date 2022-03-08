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
                Lorem ipsum dolor emut connetidor delta
                Lorem ipsum dolor emut connetidor delta
                Lorem ipsum dolor emut connetidor delta
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
          </tbody>
        </table>
      </div>
    </div>
    <div class="col-md-6">
      <img class="img-fluid" src="{{ asset('storage/' . $product->image_path) }}" alt="Card image cap">
    </div>
  </div>
  <div class="p-3">
    @if (false)
    <button class="btn btn-warning px-4 py-3" style="background-color: orange;">
      View
    </button>
    @endif
    <button class="btn btn-success px-4 py-3">
      Order
    </button>
  </div>
</div>
