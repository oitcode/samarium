<div>
  <!-- Menu tool bar -->
  @if (false)
  <div class="mb-3">
    <button class="btn
        @if (true || $modes['create'])
          btn-success text-white
        @endif
        m-0 border shadow-sm badge-pill mr-3 mb-3"
        style="height: 75px; width: 150px; font-size: 1.3rem;" wire:click="enterMode('create')">
      <i class="fas fa-plus-circle mr-3"></i>
      New
    </button>

    <button class="btn
        @if (true || $modes['list'])
          btn-success text-white
        @endif
        m-0 border shadow-sm badge-pill mr-3 mb-3"
        style="height: 75px; width: 150px; font-size: 1.3rem;" wire:click="enterMode('list')">
      <i class="fas fa-list mr-3"></i>
      List
    </button>

    <button class="btn
        @if (true || $modes['report'])
          btn-success text-white
        @endif
        m-0 border shadow-sm badge-pill mr-3 mb-3"
        style="height: 75px; width: 150px; font-size: 1.3rem;" wire:click="enterMode('report')">
      <i class="fas fa-paper-plane mr-3"></i>
      Report
    </button>

    <button class="btn btn-primary-rm m-0 float-right border-rm bg-white-rm text-primary-rm d-none d-md-block"
        wire:click="clearModes"
        style="height: 100px; width: 225px; font-size: 1.5rem;">
      <i class="fas fa-dolly-flatbed mr-3"></i>
      Inventory
    </button>

    <button wire:loading class="btn m-0"
        style="height: 100px; width: 225px; font-size: 1.5rem;">
      <span class="spinner-border text-info mr-3" role="status">
      </span>
    </button>


    <div class="clearfix">
    </div>
  </div>
  @endif
  <!-- ./Menu tool bar -->

  @if ($modes['productDetail'])
    @livewire ('inventory-product-detail', ['product' => $displayingProduct,])
  @else
    {{-- Simple list --}}
    <div class="table-responsive bg-white border">
      <table class="table table-hover mb-0">
        <thead>
          <tr class="
              {{ env('OC_ASCENT_BG_COLOR', 'bg-success') }}
              {{ env('OC_ASCENT_TEXT_COLOR', 'text-white') }}
              "
              style="">
            <th colspan="2">Item</th>
            <th>Stock applicable</th>
            <th>Inventory Unit</th>
            <th>Stock</th>
            <th>Action</th>
          </tr>
        </thead>

        <tbody>
          @foreach ($products as $product)
            @if ($product->stock_applicable == 'yes')
              <tr
                  class="
                    @if ($product->stock_count <= $product->stock_notification_count)
                      bg-danger text-white
                    @endif
                  "
              >
                <td style="width: 50px;">
                  <img src="{{ asset('storage/' . $product->image_path) }}" class="mr-3" style="width: 35px; height: 35px;">
                </td>
                <td class="font-weight-bold">
                  {{ $product->name }}
                </td>
                <td>
                  {{ $product->stock_applicable }}
                </td>
                <td>
                  {{ $product->inventory_unit }}
                </td>
                <td>
                  {{ $product->stock_count }}
                  {{ $product->inventory_unit }}
                </td>
                <td>
                  <div class="dropdown">
                    <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-cog text-secondary"></i>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                      <button class="dropdown-item" wire:click="displayProductDetail({{ $product }})">
                        <i class="fas fa-file text-primary mr-2"></i>
                        View
                      </button>
                    </div>
                  </div>
                </td>
              </tr>
            @endif
          @endforeach
        </tbody>
      </table>
    </div>
  @endif

</div>
