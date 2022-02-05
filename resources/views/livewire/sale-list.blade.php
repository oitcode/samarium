<x-box-list title="Sale list">
  @if ($sales != null && count($sales) > 0)
    <div class="table-responsive">
      <table class="table table-sm table-hover">
        <thead>
          <tr class="text-secondary">
            <th>ID</th>
            <th>Date</th>
            <th>Customer</th>
            <th>Total</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($sales as $sale)
            <tr>
              <td>
                {{ $sale->sale_id }}
              </td>
              <td>
                {{ $sale->sale_date }}
              </td>
              <td>
                <a href="" wire:click.prevent="">
                {{ $sale->customer->name }}
                </a>
              </td>
              <td>
                {{ $sale->getTotalAmount() }}
              </td>
              <td>
                <span class="btn btn-tool btn-sm" wire:click="">
                  <i class="fas fa-pencil-alt text-info"></i>
                </span>

                <span class="btn btn-tool btn-sm" wire:click="">
                  <i class="fas fa-trash text-danger"></i>
                </span>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  @else
    <div class="text-secondary py-3 px-3">
      No sales.
    </div>
  @endif
</x-box-list>
