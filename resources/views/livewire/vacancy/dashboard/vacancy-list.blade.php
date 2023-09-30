<div>
  <!-- Flash message div -->
  @if (session()->has('message'))
    @include ('partials.flash-message', [
        'flashMessage' => session('message'),
    ])
  @endif

  <button wire:loading class="btn btn-danger-rm" style="font-size: 1.5rem;">
    <div class="spinner-border text-info mr-3" role="status">
      <span class="sr-only">Loading...</span>
    </div>
  </button>

  {{-- Top flash cards --}}
  @if (false)
  <div class="row mb-1">
    <div class="col-md-12">
      <div class="mb-4">
        @include ('partials.misc.glance-card', [
            'bsBgClass' => 'bg-white',
            'btnRoute' => '',
            'iconFaClass' => 'fas fa-edit',
            'btnTextPrimary' => 'Vacancies',
            'btnTextSecondary' => $vacanciesCount,
        ])
      </div>
    </div>
  </div>
  @endif

  @if (false)
  {{-- Search bar --}}
  <div class="mb-3 py-2 bg-white">
    <input type="text" />
    <button class="btn btn-primary">
      Search
    </button>
  </div>
  @endif

  @if ($vacancies != null && count($vacancies) > 0)
    @if (true)
    {{-- Show in bigger screens --}}
    <div class="table-responsive d-none d-md-block">
      <table class="table table-sm-rm table-bordered-rm table-hover shadow-sm border">
        <thead>
          <tr class="{{ env('OC_ASCENT_BG_COLOR', 'bg-success') }}
              {{ env('OC_ASCENT_TEXT_COLOR', 'text-white') }}
              p-4" style="font-size: 1rem;">
            <th>
              Vacancy
            </th>
            <th>
              Date
            </th>
            <th>
              Status
            </th>
            <th>
              Applications
            </th>
            <th>
              Action
            </th>
          </tr>
        </thead>

        <tbody class="bg-white">
          @foreach ($vacancies as $vacancy)
            <tr>
              <td>
                <span wire:click="$emit('displayVacancy', {{ $vacancy }})" role="button">
                  {{ $vacancy->title }}
                </span>
              </td>
              <td>2023 August 13</td>
              <td>Open</td>
              <td>24</td>
              <td>
                <button class="btn mr-3" wire:click="">
                  <i class="fas fa-trash-alt"></i>
                </button>
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
