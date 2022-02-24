<div>
  <div class="row">
    @foreach ($products as $product)
      <div class="col-md-4">
        <div class="card">
          <div class="card-header bg-warning-rm" style="background-image: linear-gradient(to right, #7B3F00, #8B3F00);">
            @if (false)
            {{ $product->name }}
            @endif
            &nbsp;
          </div>
          <div class="card-body p-0">
            <div class="row">
              <div class="col-md-6">
                <div class="table-responsive">
                  <table class="table">
                    <tbody style="font-size: 1.3rem;">
                      <tr>
                        <th>
                          {{ $product->name }}
                        </th>
                      </tr>
                      <tr>
                        <th>
                          <i class="fas fa-rupee-sign"></i>
                          {{ $product->selling_price }}
                        </th>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <div class="p-2">
                  <button class="btn btn-warning">
                    <i class="fas fa-shopping-cart mr-2"></i>
                    Order
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
  </div>
</div>
