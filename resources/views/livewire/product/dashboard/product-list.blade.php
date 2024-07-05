<div class="">


  {{-- Flash message div --}}
  @if (session()->has('message'))
    @include ('partials.flash-message', [
        'flashMessage' => session('message'),
    ])
  @endif


  {{-- Show in bigger screens --}}
  <div class="table-responsive d-none-rm d-md-block-rm">
    <table class="table table-hover shadow-sm border">
      <thead>
        <tr class="bg-white text-dark p-4" style="font-size: 1rem;">
          <th>
            Product ID
          </th>
          <th class="">
            Name
          </th>
          <th class="">
            Active status
          </th>
          <th>
            Action
          </th>
        </tr>
      </thead>

      <tbody class="bg-white">
        @foreach ($products as $product)
          <tr>
            <td>
              {{ $product->product_id }}
            </td>
            <td class="h6 font-weight-bold" wire:click="$emit('displayProduct', {{ $product->product_id }})" role="button">
              {{ \Illuminate\Support\Str::limit($product->name, 60, $end=' ...') }}
            </td>
            <td class="h6 font-weight-bold">
              @if ($product->is_active == 1)
                <span class="badge badge-pill badge-success">
                  Active
                </span>
              @else
                <span class="badge badge-pill badge-danger">
                  Inactive
                </span>
              @endif
            </td>
            <td>
              <i class="fas fa-ellipsis-h text-secondary"></i>
              @if (false)
              <button class="dropdown-item" wire:click="deleteTodo({{ $todo }})">
                <i class="fas fa-trash text-danger mr-2"></i>
                Delete
              </button>
              @endif
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>

  </div>


</div>
