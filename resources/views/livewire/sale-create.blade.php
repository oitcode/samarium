<x-box-create title="Create sale">

  <div class="form-group">
    <label for="">Name</label>
    <input type="text" class="form-control" wire:model.defer="c_name">
    @error('c_name') <span class="text-danger">{{ $message }}</span> @enderror
  </div>

  <div class="form-group">
    <label for="">Phone</label>
    <input type="text" class="form-control" wire:model.defer="c_phone">
    @error('c_phone') <span class="text-danger">{{ $message }}</span> @enderror
  </div>


  <!-- Remittance Lines -->
  <h4>Items</h4>

  <!-- Toolbar -->
  <div class="bg-alert" style="background-color: #eee; margin-bottom: 10px; padding: 5px; font-size: 10px; width: 25%;">
    <button class="btn btn-sm" wire:click="addRow">
      <i class="fas fa-plus"></i>
      Item
    </button>
    <button class="btn btn-sm" wire:click="clearSheet">
      <i class="fas fa-eraser"></i>
      Clear
    </button>
  </div>


  <div class="table-responsive" style="overflow: auto;">
    <table class="" style="">
      <thead>
        <tr class="border p-1">
          <th class="border p-2" style="max-width: 11vw !important;">SN</th>
          <th class="border p-2" style="max-width: 11vw !important;">Item</th>
          <th class="border p-2" style="max-width: 11vw !important;">Price</th>
    
          <th class="border p-2" style="max-width: 4vw !important;">---</th>
        </tr>
      </thead>

      <tbody>
	      <!-- Our way: Use 2D Array -->
        @for ($i=0; $i < $totalNumOfRows; $i++)
          <tr class="m-0 p-0" style="">
            <td class="m-0 p-1 border" style="max-width: 100%;">
              {{ $i + 1 }}
            </td>
            <td class="m-0 p-1 border" style="max-width: 100%;">
              <input type="text" class="border-0" wire:model.defer="saleItems.{{ $i }}.title" style="width: 11vw; font-color: blue;"/>
            </td>
            <td class="m-0 p-0 border" style="max-width: 100%;">
              <input type="text" class="border-0" wire:model.defer="saleItems.{{ $i }}.amount"
                  style="width: 4vw;" wire:keydown.tab="calculateTotal"/>
            </td>
            <td class="m-0 p-0 px-2 border" style="max-width: 100%;">
                <i class="fas fa-trash text-danger" wire:click="removeRow({{ $i }})"></i>
            </td>
          </tr>
        @endfor
        <tr>
          <th colspan="2" class="border py-2">
            Total
          </th>
          <td colspan="2" class="border py-2 font-weight-bold">
            {{  $total }}
          </td>
        </tr>
      </tbody>
    </table>
  </div>



  <div class="mt-3 p-2">
    <button type="submit" class="btn btn-primary" wire:click="store">Submit</button>
    <button type="submit" class="btn btn-danger" wire:click="$emit('exitCreateMode')">Cancel</button>
  </div>

</x-box-create>
