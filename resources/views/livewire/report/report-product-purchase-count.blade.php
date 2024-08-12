<div>
  <h2 class="h4 mt-3">
    Product purchase count
  </h2>

  {{-- Date bar --}}
  <div class="mt-3 text-secondary py-3" style="font-size: 1.3rem;">

    <input type="date" wire:model="startDate" class="mr-3" />
    <input type="date" wire:model="endDate" class="mr-3" />

    <button class="btn btn-success" wire:click="getPurchasesForDateRange">
      Go
    </button>

    <button wire:loading class="btn">
      <div class="spinner-border text-info mr-3" role="status">
        <span class="sr-only">Loading...</span>
      </div>
    </button>
  </div>

  @if (count($todayItems) > 0)
    <div class="table-responsive">
      <table class="table table-bordered table-hover" style="font-size: 1.3rem;">
        <thead>
          <tr class="bg-success-rm text-white-rm">
            <th>
              Item
            </th>
            <th>
              Quantity
            </th>
          </tr>
        </thead>

        <tbody class="bg-white">
            @foreach ($todayItems as $item)
              <tr>
                <td>
                  {{ $item['product']->name }}
                </td>
                <td>
                  {{ $item['quantity'] }}
                </td>
              <tr>
            @endforeach
        </tbody>
      </table>
    </div>
  @endif

</div>
