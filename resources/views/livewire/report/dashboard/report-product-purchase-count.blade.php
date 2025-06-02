<div>

  <h2 class="h4 mt-3">
    Product purchase count
  </h2>

  {{-- Date bar --}}
  <div class="mt-3 text-secondary py-3">
    <input type="date" wire:model="startDate" class="mr-3" />
    <input type="date" wire:model="endDate" class="mr-3" />
    <button class="btn btn-success" wire:click="getPurchasesForDateRange">
      Go
    </button>
     @include ('partials.dashboard.spinner-button')
  </div>

  @if (count($todayItems) > 0)
    <div class="table-responsive">
      <table class="table table-bordered table-hover">
        <thead>
          <tr>
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
