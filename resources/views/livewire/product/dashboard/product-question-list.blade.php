<div>


  {{-- Flash message div --}}
  @if (session()->has('message'))
    @include ('partials.flash-message', [
        'flashMessage' => session('message'),
    ])
  @endif


  {{-- Show product question list --}}
  <div class="table-responsive">
    <table class="table table-hover shadow-sm border">
      <thead>
        <tr class="p-4 bg-white text-dark" style="font-size: 1rem;">
          <th>
            ID
          </th>
          <th class="">
            Product
          </th>
          <th class="d-none d-md-table-cell">
            Question
          </th>
          <th class="">
            Status
          </th>
          <th>
            Action
          </th>
        </tr>
      </thead>

      <tbody class="bg-white">
        @foreach ($productQuestions as $productQuestion)
          <tr>
            <td>
              {{ $productQuestion->product_question_id }}
            </td>
            <td class="h6 font-weight-bold" wire:click="$emit('displayProductQuestion', {{ $productQuestion }})" role="button">
              {{ \Illuminate\Support\Str::limit($productQuestion->product->name, 60, $end=' ...') }}
            </td>
            <td class="d-none d-md-table-cell font-weight-bold" style="font-size: 1rem;">
              {{ $productQuestion->question_text }}
            </td>
            <td>
              <span class="badge badge-pill badge-danger p-2">
                New
              </span>
            </td>
            <td>
              <i class="fas fa-ellipsis-h text-secondary"></i>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>

  </div>


</div>
