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
    </x-slot>

    <x-slot name="listPaginationLinks">
      {{ $vacancies->links() }}
    </x-slot>

  </x-list-component>


</div>
