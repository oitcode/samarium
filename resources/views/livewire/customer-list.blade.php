<div>

  {{-- Search Bar --}}

  {{-- Show in bigger screens --}}
  <div class="mb-4 p-3 bg-white border d-none d-md-block">

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

  {{-- Show in smaller screens --}}
  <div class="mb-4 p-3 bg-white border d-md-none">

    <div class=" mb-3">
      <button class="btn btn-danger h-100 badge-pill" style="font-size: 1.1rem;" wire:click="getCreditors">
        Creditors
      </button>
    </div>

    <div class="mb-3">

      <div class=" mb-3">
        <div>
          <label class="text-secondary">
            <i class="fas fa-user mr-3"></i>
            Name
          </label>
        </div>
        <input type="text" wire:model.defer="customerSearch.name" style="font-size: 1.1rem;" wire:keydown.enter="search" />
      </div>

      <div class="">
        <div>
          <label class="text-secondary">
            <i class="fas fa-phone mr-3"></i>
            Phone
          </label>
        </div>
        <input type="text" wire:model.defer="customerSearch.phone" style="font-size: 1.1rem;" wire:keydown.enter="search" />
      </div>

      <div class="mr-3">
        <div>
        &nbsp;
        </div>
        <button class="btn btn-success" style="font-size: 1.3rem;" wire:click="search">
          Search
        </button>
      </div>

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

    <div class="table-responsive border" style="font-size: 1.1rem;">
      <table class="table table-hover mb-0">
        <thead>
          <tr class="text-secondary">
            <th>
              <i class="fas fa-user mr-2"></i>
              Name
            </th>
            <th>Pending balance</th>
            <th>
              <i class="fas fa-phone mr-2"></i>
              Phone
            </th>
            <th>Action</th>
          </tr>
        </thead>

        <tbody class="bg-white">
          @foreach ($customers as $customer)
            <tr class="border">
              <td>
                @if ($customer->getBalance() > 0)
                  <i class="fas fa-circle mr-3 text-danger"></i>
                @else
                  <i class="fas fa-circle mr-3 text-success"></i>
                @endif
                {{ $customer->name }}
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
              <td class="text-secondary" style="font-size: 1.1rem;">
                {{ $customer->phone }}
              </td>
              <td>

                @if (false)
                <button class="btn btn-success-rm border border-primary rounded-circle text-primary"
                    wire:click="$emit('displayCustomer', {{ $customer->customer_id }})">
                  <i class="fas fa-folder"></i>
                </button>
                @endif

                <div class="dropdown">
                  <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-cog text-secondary"></i>
                  </button>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <button class="dropdown-item" wire:click="$emit('displayCustomer', {{ $customer->customer_id }})">
                      <i class="fas fa-file text-primary mr-2"></i>
                      View
                    </button>
                  </div>
                </div>
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
