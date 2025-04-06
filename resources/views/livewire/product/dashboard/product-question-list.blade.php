<div>

  <x-list-component>
    <x-slot name="listInfo">
      Total product questions: {{ $totalProductQuestionCount }}
    </x-slot>
  
    <x-slot name="listHeadingRow">
      <th>
        Product
      </th>
      <th>
        Question
      </th>
      <th>
        Status
      </th>
      <th class="text-right">
        Action
      </th>
    </x-slot>
  
    <x-slot name="listBody">
      @if (count($productQuestions) > 0)
        @foreach ($productQuestions as $productQuestion)
          <x-table-row-component>
            <td class="h6 font-weight-bold"
                wire:click="$dispatch('displayProductQuestion', {productQuestion: {{ $productQuestion }} })"
                role="button">
              {{ \Illuminate\Support\Str::limit($productQuestion->product->name, 60, $end=' ...') }}
            </td>
            <td class="font-weight-bold">
              {{ $productQuestion->question_text }}
            </td>
            <td>
              <span class="badge badge-pill badge-danger p-2">
                New
              </span>
            </td>
            <td class="text-right">
              <button class="btn btn-light text-primary px-2 py-1"
                  wire:click="$dispatch('displayProductQuestion', {productQuestion: {{ $productQuestion }} })">
                <i class="fas fa-pencil-alt"></i>
              </button>
              <button class="btn btn-light text-success px-2 py-1"
                  wire:click="$dispatch('displayProductQuestion', {productQuestion: {{ $productQuestion }} })">
                <i class="fas fa-eye"></i>
              </button>
              <button class="btn btn-light text-danger px-2 py-1" wire:click="">
                <i class="fas fa-trash"></i>
              </button>
            </td>
          </x-table-row-component>
        @endforeach
      @else
        <x-table-row-component>
          <td colspan="4">
            <p class="font-weight-bold h4 py-4 text-center" style="color: #fe8d01;">
              <i class="fas fa-exclamation-circle mr-2"></i>
              No product questions yet.
            <p>
          </td>
        </x-table-row-component>
      @endif
    </x-slot>
  
    <x-slot name="listPaginationLinks">
      {{ $productQuestions->links() }}
    </x-slot>
  </x-list-component>

</div>
