<div>


  {{--
     |
     | Flash message div
     |
  --}}
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


  {{--
     |
     | Filter div
     |
  --}}
  <div class="mb-1 p-3 bg-white border d-flex justify-content-between">
    <div class="pt-2 font-weight-bold">
      Total : {{ $vacanciesCount }}
    </div>
  </div>


  {{--
     |
     | Vacancy list
     |
  --}}
  @if ($vacancies != null && count($vacancies) > 0)
    {{-- Show in bigger screens --}}
    <div class="table-responsive d-none d-md-block">
      <table class="table table-hover shadow-sm border">
        <thead>
          <tr class="p-4 bg-white text-dark">
            <th class="o-heading">
              Vacancy
            </th>
            <th class="o-heading">
              Date
            </th>
            <th class="o-heading text-right">
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
              <td class="text-right">
                <button class="btn btn-primary px-2 py-1" wire:click="$dispatch('displayVacancy', { vacancy: {{ $vacancy }} })">
                  <i class="fas fa-pencil-alt"></i>
                </button>
                <button class="btn btn-success px-2 py-1" wire:click="$dispatch('displayVacancy', { vacancy: {{ $vacancy }} })">
                  <i class="fas fa-eye"></i>
                </button>
                <button class="btn btn-danger px-2 py-1" wire:click="">
                  <i class="fas fa-trash"></i>
                </button>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>

    </div>

    {{-- Pagination links --}}
    {{ $vacancies->links() }}
  @else
    <div class="p-2 text-secondary">
      <i class="fas fa-exclamation-circle mr-2"></i>
      No vacancies
    </div>
  @endif


</div>
