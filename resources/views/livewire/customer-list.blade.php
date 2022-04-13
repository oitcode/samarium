<div>

  {{-- Search Bar --}}
  <div class="mb-4 p-3 bg-white border">

    @if (false)
    <div class="float-left mr-3">
        <h2 class="text-secondary">
          Search
        </h2>
    </div>
    @endif

    <div class="float-left mr-3">
      <div>
        <label class="text-secondary">
          <i class="fas fa-user mr-3"></i>
          Name
        </label>
      </div>
      <input type="text" wire:model.defer="customerSearch.name" style="font-size: 1.1rem;" wire:keydown.enter="search" />
    </div>

    <div class="float-left mr-3">
      <div>
        <label class="text-secondary">
          <i class="fas fa-phone mr-3"></i>
          Phone
        </label>
      </div>
      <input type="text" wire:model.defer="customerSearch.phone" style="font-size: 1.1rem;" wire:keydown.enter="search" />
    </div>

    <div class="float-left mr-3">
      <div>
      &nbsp;
      </div>
      <button class="btn btn-success" style="font-size: 1.3rem;" wire:click="search">
        Search
      </button>
    </div>

    <div class="float-right mr-3">
      <button class="btn btn-danger h-100 p-3 badge-pill" style="font-size: 1.3rem;" wire:click="getCreditors">
        Creditors
      </button>
    </div>

    <div class="clearfix">
    </div>
  </div>

  {{-- List info --}}
  <div class="my-3 text-secondary">
    Displaying
    {{ count($customers) }}
    out of
    {{ count($customers) }}
    customers
  </div>

  {{-- Customer table --}}
  @if ($customers != null && count($customers) > 0)

    <div class="table-responsive" style="font-size: 1.1rem;">
      <table class="table table-bordered table-hover">
        <thead>
          <tr class="text-secondary">
            <th>
              <i class="fas fa-user mr-2"></i>
              Name
            </th>
            <th>
              <i class="fas fa-phone mr-2"></i>
              Phone
            </th>
            <th>Pending balance</th>
            <th>Action</th>
          </tr>
        </thead>

        <tbody class="bg-white">
          @foreach ($customers as $customer)
            <tr>
              <td>
                {{ $customer->name }}
              </td>
              <td>
                {{ $customer->phone }}
              </td>
              <td>
                @if ($customer->getBalance() > 0)
                  <span class="text-danger font-weight-bold">
                    @php echo number_format( $customer->getBalance() ); @endphp
                  </span>
                @else
                  @php echo number_format( $customer->getBalance() ); @endphp
                @endif
              </td>
              <td>

                <button class="btn btn-success"
                    wire:click="$emit('displayCustomer', {{ $customer->customer_id }})">
                  View
                </button>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  @else
    <div class="text-secondary py-3 px-3" style="font-size: 1.3rem;">
      No customers.
    </div>
  @endif
</div>
