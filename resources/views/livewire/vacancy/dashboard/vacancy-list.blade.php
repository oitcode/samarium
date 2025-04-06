<div>

  <x-list-component>
    <x-slot name="listInfo">
      Total : {{ $vacanciesCount }}
    </x-slot>

    <x-slot name="listHeadingRow">
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
          <td class="h6 font-weight-bold" wire:click="$dispatch('displayVacancy', { vacancy: {{ $vacancy }} })" role="button">
            <span>
              {{ $vacancy->title }}
            </span>
          </td>
          <td>
          {{ $vacancy->created_at->toDateString() }}
          </td>
          <td class="text-right">
            <x-list-edit-button-component clickMethod="$dispatch('displayVacancy', { vacancyId: {{ $vacancy->vacancy_id }} })">
            </x-list-edit-button-component>
            <x-list-view-button-component clickMethod="$dispatch('displayVacancy', { vacancyId: {{ $vacancy->vacancy_id }} })">
            </x-list-view-button-component>
            <x-list-delete-button-component clickMethod="">
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
