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

  {{-- Simple list --}}
  <div class="table-responsive bg-white border" style="font-size: 1.1rem;">
    <table class="table">
      <thead>
        <tr class="bg-success text-white">
          <th>Item</th>
          <th>Stock applicable</th>
          <th>Stock</th>
        </tr>
      </thead>

      <tbody>
        @foreach ($products as $product)
          @if ($product->stock_applicable == 'yes')
            <tr>
              <td>
                {{ $product->name }}
              </td>
              <td>
                {{ $product->stock_applicable }}
              </td>
              <td>
                {{ $product->stock_count }}
              </td>
            </tr>
          @endif
        @endforeach
      </tbody>
    </table>
  </div>

</div>
