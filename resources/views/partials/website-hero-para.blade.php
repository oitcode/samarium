@if (false)
<div class="container-fluid bg-light-rm py-5" style="background-color: #eee;">
  <div class="container mb-4">
    <div class="row">
      @if (true)
      <div class="col-md-4">
        @foreach ($products as $product)
          <div class="col-md-12 mb-3 h-80 p-0">
            <div class="card h-100 shadow p-0">
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
                        <td class="text-danger" style="font-size: 1.5rem;">
                          Rs.
                          {{ $product->selling_price }}
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <div class="text-center">
                </div>
              </div>
            </div>
          </div>
          @break
        @endforeach

        <div class="h-20 mb-3">
          @livewire ('website-hero-order')
        </div>

      </div>
      @endif

      <div class="col-md-6 bg-white border">

        <div class="py-3 d-none d-md-block">
          <div class="">
            <div>
              <div class="" style="">
                @foreach ($productCategories as $productCategory)
                  <div class="d-inline mr-3">
                    <img src="{{ asset('storage/' . $productCategory->image_path) }}" style="wigth: 300px; height: 100px;">
                  </div>
                @endforeach
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>
@endif
