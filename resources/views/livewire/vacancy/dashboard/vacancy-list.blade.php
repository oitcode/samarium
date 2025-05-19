<div>

  <x-list-component>
    <x-slot name="listInfo">
      Total : {{ $totalVacancyCount }}
    </x-slot>

    <x-slot name="listHeadingRow">
      <th>
        ID
      </th>
      <th>
        Vacancy
      </th>
      <th>
        Date
      </th>
      <th class="text-right">
        Action
      </th>
    </x-slot>

    <x-slot name="listBody">
      @foreach ($vacancies as $vacancy)
        <x-table-row-component>
          <td>
            {{ $vacancy->vacancy_id }}
          </td>
          <td class="h6 font-weight-bold" wire:click="$dispatch('displayVacancy', { vacancy: {{ $vacancy }} })" role="button">
            <span>
              {{ $vacancy->title }}
            </span>
          </td>
          <td>
          {{ $vacancy->created_at->toDateString() }}
          </td>
          <td class="text-right">
            @if ($modes['confirmDelete'])
              @if ($deletingVacancy->vacancy_id == $vacancy->vacancy_id)
                <button class="btn btn-danger mr-1" wire:click="deleteVacancy">
                  Confirm delete
                </button>
                <button class="btn btn-light mr-1" wire:click="cancelDeleteVacancy">
                  Cancel
                </button>
              @endif
            @endif
            @if ($modes['cannotDelete'])
              @if ($deletingVacancy->vacancy_id == $vacancy->vacancy_id)
                <span class="text-danger mr-3">
                  <i class="fas fa-exclamation-circle mr-1"></i>
                  Vacancy cannot be deleted
                </span>
                <button class="btn btn-light mr-1" wire:click="cancelCannotDeleteVacancy">
                  Cancel
                </button>
              @endif
            @endif
            <x-list-edit-button-component clickMethod="$dispatch('displayVacancy', { vacancyId: {{ $vacancy->vacancy_id }} })">
            </x-list-edit-button-component>
            <x-list-view-button-component clickMethod="$dispatch('displayVacancy', { vacancyId: {{ $vacancy->vacancy_id }} })">
            </x-list-view-button-component>
            <x-list-delete-button-component clickMethod="confirmDeleteVacancy({{ $vacancy->vacancy_id }})">
            </x-list-delete-button-component>
          </td>
        </x-table-row-component>
      @endforeach
    </x-slot>

    <x-slot name="listPaginationLinks">
      {{ $vacancies->links() }}
    </x-slot>
  </x-list-component>

</div>
