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
          @if (false)
          <th>
            ID
          </th>
          @endif
          <th class="">
            Product
          </th>
          <th class="">
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
        @if (false && count($productQuestions) > 0)
        @foreach ($productQuestions as $productQuestion)
          <tr>
            @if (false)
            <td>
              {{ $productQuestion->product_question_id }}
            </td>
            @endif
            <td class="h6 font-weight-bold" wire:click="$emit('displayProductQuestion', {{ $productQuestion }})" role="button">
              {{ \Illuminate\Support\Str::limit($productQuestion->product->name, 60, $end=' ...') }}
            </td>
            <td class="font-weight-bold" style="font-size: 1rem;">
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
        @else
          <tr>
            <td colspan="4">
              <p class="font-weight-bold text-muted-rm h4 py-4 text-center" style="color: #fe8d01;">
                <i class="fas fa-exclamation-circle mr-2"></i>
                No product questions yet.
              <p>
            </td>
          </tr>
        @endif
      </tbody>
    </table>

  </div>


</div>
