<div class="mb-2">

  {{--
     |
     | Flash message div
     |
  --}}

  @if (session()->has('errorMessage'))
    @include ('partials.flash-message', [
        'flashMessage' => session('errorMessage'),
    ])
  @endif

  {{-- Search bar --}}
  <div class="bg-white px-2 border">
    <div class="table-responsive bg-white pt-3 m-0">
      <table class="table table-sm table-bordered m-0">
        <tbody>
          <tr class="p-0 font-weight-bold" style="height: 50px;">
            <td class="h-100 bg-white p-0 border-0">
              <div class="d-flex">
                <input class="form-control m-0 w-100 h-100 py-2" type="text"
                    wire:model="add_item_name" wire:keydown.enter="updateProductList" placeholder="Search product by name" autofocus/>
                <div class="m-0 bg-white">
                  <div class="d-flex">
                    <button class="btn btn-primary font-weight-bold ml-2 mr-4 h-100" wire:click="updateProductList">
                        Search
                    </button>
                    @if (true)
                    <button class="bg-white border-0 text-primary font-weight-bold mr-4" wire:click="resetInputFields">
                      Reset
                    </button>
                    @endif
                    @include ('partials.dashboard.spinner-button')
                  </div>
                </div>
              </div>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>

  {{-- Placeholder div --}}
  <div class="bg-white text-muted px-3 py-2">
    <small>
    Add products to the sale invoice
    </small>
  </div>
  {{-- Placeholder div. Todo: Make this empty space more useful --}}
  <div class="bg-white text-dark px-3 py-2">
    &nbsp;<br/>
    &nbsp;<br/>
    &nbsp;<br/>
    &nbsp;<br/>
    &nbsp;<br/>
    &nbsp;<br/>
  </div>

  {{-- Show selected product --}}
  @if ($modes['productSelected'])
    <div class="d-flex justify-content-between border p-3 bg-white mb-2" wire:key="{{ rand() }}">
      <div>
        <div class="o-heading">
          Product:
        </div>
        {{ $selectedProduct->name }}
      </div>
      <div class="d-flex">
        <div class="mr-4">
          <div class="o-heading">
            Qty
          </div>
          <input class="font-weight-bold border" type="text" wire:model="quantity" wire:keydown.enter="updateTotal" wire:change="updateTotal" />
        </div>
        <div class="mr-4">
          <div class="o-heading">
            Price per unit
          </div>
          {{ config('app.transaction_currency_symbol') }}
          {{ $selectedProduct->selling_price }}
        </div>
        <div class="mr-4">
          <div class="o-heading">
            Total
          </div>
          @if ($selectedProduct)
            {{ config('app.transaction_currency_symbol') }}
            @php echo number_format( $total ); @endphp
          @endif
        </div>
        <div class="px-3">
          <div class="o-heading">
            Action
          </div>
          <button class="btn btn-primary" wire:click="addItemToSaleInvoice">
            Add
          </button>
          <button class="btn btn-primary" wire:click="resetInputFields">
            Cancel
          </button>
        </div>
      </div>
    </div>
  @else
    {{-- Show product search results --}}
    @if ($products != null && count($products) > 0)
      <div class="mb-3">
        @foreach ($products as $product)
          <div class="d-flex justify-content-between border p-3 bg-white" wire:key="{{ rand() }}">
            <div>
              {{ $product->name }}
            </div>
            <div class="d-flex">
              @if ($modes['productSelected'])
              <div>
                Qty
                <br />
                <input type="text" />
              </div>
              <div>
                Price per unit
                <br />
                {{ $selectedProduct->selling_price }}
              </div>
              @endif
              <div class="px-3">
                <button class="btn btn-primary" wire:click="selectItemNew({{ $product }})">
                  Select
                </button>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    @endif
  @endif

</div>
