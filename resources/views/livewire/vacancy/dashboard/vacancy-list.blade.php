<div>


  <!-- Flash message div -->
  @if (session()->has('message'))
    @include ('partials.flash-message', [
        'flashMessage' => session('message'),
    ])
  @endif




  <div wire:loading>
    <div class="spinner-border text-info mx-3" role="status">
      <span class="sr-only">Loading...</span>
    </div>
  </div>

  {{-- Filter div --}}
  @if (true)
  <div class="mb-3 p-3 bg-white border d-flex justify-content-between">
    <div class="font-weight-bold h6 d-flex">
      <div class="d-flex">
        @if (true)
        <div class="mr-4 font-weight-bold pt-2">
          @if (false)
          <i class="fas fa-filter mr-2"></i>
          @endif
        </div>
        @endif
      </div>
    </div>


    <div class="pt-2 font-weight-bold">
      Total : {{ $vacanciesCount }}
    </div>
  </div>
  @endif


  @if ($vacancies != null && count($vacancies) > 0)
    @if (true)
    {{-- Show in bigger screens --}}
    <div class="table-responsive d-none d-md-block">
      <table class="table table-hover shadow-sm border">
        <thead>
          <tr class="p-4 bg-white text-dark" style="font-size: 1rem;">
            <th>
              Vacancy
            </th>
            <th>
              Date
            </th>
            <th>
              Action
            </th>
          </tr>
        </thead>

        <tbody class="bg-white">
          @foreach ($vacancies as $vacancy)
            <tr>
              <td class="h6 font-weight-bold" wire:click="$dispatch('displayVacancy', { vacancy: {{ $vacancy }} })" role="button">
                <span>
                  {{ $vacancy->title }}
                </span>
              </td>
              <td>
              {{ $vacancy->created_at->toDateString() }}
              </td>
              <td>
                <i class="fas fa-ellipsis-h text-secondary"></i>
                @if (false)
                <button class="btn mr-3" wire:click="">
                  <i class="fas fa-trash-alt"></i>
                </button>
                @endif
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>

    </div>
    @endif

    {{-- Pagination links --}}
    {{ $vacancies->links() }}
  @else
    <div class="p-2 text-secondary">
      <i class="fas fa-exclamation-circle mr-2"></i>
      No vacancies
    </div>
  @endif


</div>
