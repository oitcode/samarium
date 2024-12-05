<div>


  {{-- Flash message div --}}
  @if (session()->has('message'))
    @include ('partials.flash-message', [
        'flashMessage' => session('message'),
    ])
  @endif

  {{-- Filter div --}}
  <div class="d-flex justify-content-between bg-white my-2 p-2">
    <div class="d-flex flex-column justify-content-center">
      Total product questions: {{ \App\ProductQuestion::count() }}
    </div>
    <div>
      <div class="form-group mb-0">
        <input type="text" class="form-row" placeholder="Search">
      </div>
    </div>
  </div>

  {{-- Filter div --}}
  <div class="d-flex justify-content-between bg-white mt-2 p-2">
    <div class="d-flex flex-column justify-content-center">
      <div>
        Displaying <span class="text-success font-weight-bold">all</span> product categories
      </div>
    </div>
  </div>


  {{-- Show product question list --}}
  <div class="table-responsive">
    <table class="table table-hover shadow-sm border">
      <thead>
        <tr class="p-4 bg-white text-dark">
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
            <td>
              @if (true)
                <button class="btn btn-primary px-2 py-1" wire:click="">
                  <i class="fas fa-pencil-alt"></i>
                </button>
                <button class="btn btn-danger px-2 py-1" wire:click="">
                  <i class="fas fa-trash"></i>
                </button>
                <button class="btn btn-success px-2 py-1" wire:click="" style="{{-- background-color: #ac0; --}}">
                  <i class="fas fa-eye"></i>
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


</div>
