<x-box-list title="Customer list">
  @if ($customers != null && count($customers) > 0)
    <div class="table-responsive">
      <table class="table table-sm table-hover">
        <thead>
          <tr class="text-secondary">
            <th>ID</th>
            <th>Name</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Address</th>
            <th>PAN Num</th>
            <th>Balance</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($customers as $customer)
            <tr>
              <td>
                {{ $customer->customer_id }}
              </td>
              <td>
                <a href="" wire:click.prevent="$emit('displayCustomer', {{ $customer->customer_id }})">
                {{ $customer->name }}
                </a>
              </td>
              <td>
                {{ $customer->phone }}
              </td>
              <td>
                {{ $customer->email }}
              </td>
              <td>
                {{ $customer->address }}
              </td>
              <td>
                {{ $customer->pan_num }}
              </td>
              <td>
                {{ $customer->getBalance() }}
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
      No customers.
    </div>
  @endif
</x-box-list>
