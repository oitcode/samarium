<x-box-list title="Customer list">

  {{-- Search bar --}}
  <div class="m-3">
    <h3 class="h4">Search</h3>
    <div class="row">

      <div class="col-md-2">
        <div class="font-weight-bold">
          Name
        </div>
        <input type="text" wire:model.defer="customerSearch.name" />
      </div>

      <div class="col-md-2">
        <div class="font-weight-bold">
          Phone
        </div>
        <input type="text" wire:model.defer="customerSearch.phone" />
      </div>

      <div class="col-md-2">
        <div class="font-weight-bold">
          Email
        </div>
        <input type="text" wire:model.defer="customerSearch.email" />
      </div>

      <div class="col-md-2">
        <div class="font-weight-bold">
          Address
        </div>
        <input type="text" wire:model.defer="customerSearch.address" />
      </div>

      <div class="col-md-2">
        <div class="font-weight-bold">
          &nbsp;
        </div>
        <button class="btn btn-primary" wire:click="search">
          Search
        </button>
      </div>

    </div>
  </div>

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
