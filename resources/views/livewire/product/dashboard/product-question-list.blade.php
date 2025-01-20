<div>


  <div class="d-flex justify-content-between py-2 border bg-white px-2">
    <div>
      <span class="mr-2">
        Total product questions: {{ \App\ProductQuestion::count() }}
      </span>
      <button class="btn btn-light mr-2">
        <i class="fas fa-plus-circle mr-1"></i>
      </button>
      <input type="text" class="mr-2">
      <button class="btn btn-light">
        <i class="fas fa-refresh mr-2"></i>
      </button>
    </div>
    <div>
      <button class="btn btn-light">
        <i class="fas fa-download mr-1"></i>
        Download
      </button>
    </div>
  </div>

  {{-- Show product question list --}}
  <div class="table-responsive">
    <table class="table table-hover shadow-sm border mb-0">
      <thead>
        <tr class="p-4 bg-white text-dark">
          <th class="o-heading">
            Product
          </th>
          <th class="o-heading">
            Question
          </th>
          <th class="o-heading">
            Status
          </th>
          <th class="text-right o-heading">
            Action
          </th>
        </tr>
      </thead>

      <tbody class="bg-white">
        @if (count($productQuestions) > 0)
        @foreach ($productQuestions as $productQuestion)
          <tr>
            <td class="h6 font-weight-bold" wire:click="$dispatch('displayProductQuestion', {productQuestion: {{ $productQuestion }} })" role="button">
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
              @if (true)
                <button class="btn btn-primary px-2 py-1" wire:click="">
                  <i class="fas fa-pencil-alt"></i>
                </button>
                <button class="btn btn-success px-2 py-1" wire:click="">
                  <i class="fas fa-eye"></i>
                </button>
                <button class="btn btn-danger px-2 py-1" wire:click="">
                  <i class="fas fa-trash"></i>
                </button>
              @endif
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

  {{-- Pagination links --}}
  <div class="bg-white border p-2">
    {{ $productQuestions->links() }}
  </div>


</div>
