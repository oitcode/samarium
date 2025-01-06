<div class="">


  {{-- Flash message div --}}
  @if (session()->has('message'))
    @include ('partials.unused.flash-message', [
        'flashMessage' => session('message'),
    ])
  @endif

  {{-- Filter div --}}
  <div class="d-flex justify-content-between bg-white my-1 p-2">
    <div class="d-flex flex-column justify-content-center">
      Total products: {{ \App\Product::count() }}
    </div>
    <div>
      <div class="form-group mb-0">
        <input type="text" class="form-row" placeholder="Search">
      </div>
    </div>
  </div>

  {{-- Filter div --}}
  <div class="d-flex justify-content-between bg-white p-2">
    <div class="d-flex flex-column justify-content-center">
      Displaying newest 5 products
    </div>
  </div>


  {{-- Show in bigger screens --}}
  <div class="table-responsive d-none-rm d-md-block-rm">
    <table class="table table-hover table-bordered shadow-sm border">
      <thead>
        <tr class="bg-white text-dark p-4">
          <th class="o-heading">
            Product ID
          </th>
          <th class="o-heading">
            Name
          </th>
          <th class="o-heading">
            Active status
          </th>
          <th class="o-heading">
            Selling price
          </th>
          <th class="o-heading text-right">
            Action
          </th>
        </tr>
      </thead>

      <tbody class="bg-white">
        @foreach ($products as $product)
          <tr>
            <td>
              {{ $product->product_id }}
            </td>
            <td class="h6" wire:click="$dispatch('displayProduct', { productId : {{ $product->product_id }} })" role="button">
              {{ \Illuminate\Support\Str::limit($product->name, 60, $end=' ...') }}
            </td>
            <td class="h6 font-weight-bold">
              @if ($product->is_active == 1)
                <span class="badge badge-pill badge-success">
                  Active
                </span>
              @else
                <span class="badge badge-pill badge-danger">
                  Inactive
                </span>
              @endif
            </td>
            <td>
              {{ $product->selling_price }}
            </td>
            <td class="text-right">
              @if (true)
                <button class="btn btn-primary px-2 py-1" wire:click="$dispatch('displayProduct', { productId : {{ $product->product_id }} })">
                  <i class="fas fa-pencil-alt"></i>
                </button>
                <button class="btn btn-success px-2 py-1" wire:click="$dispatch('displayProduct', { productId : {{ $product->product_id }} })">
                  <i class="fas fa-eye"></i>
                </button>
                <button class="btn btn-danger px-2 py-1" wire:click="">
                  <i class="fas fa-trash"></i>
                </button>
              @endif
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>

  </div>


</div>
