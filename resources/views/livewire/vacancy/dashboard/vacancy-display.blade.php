<div>

  {{-- Basic info --}}
  <div class="py-5 mb-2 text-center o-linear-gradient o-border-radius">
    <div class="h2 o-heading o-linear-gradient-text-color">
      {{ $vacancy->title }}
    </div>
    <div class="h5">
      {{ $vacancy->created_at }}
    </div>
  </div>

  {{--
  |
  | Toolbar.
  |
  --}}

  <x-toolbar-component>
    <x-slot name="toolbarInfo">
      Vacancy
      <i class="fas fa-angle-right mx-2"></i>
      {{ $vacancy->vacancy_id }}
    </x-slot>
    <x-slot name="toolbarButtons">
      <x-toolbar-button-component btnBsClass="btn-light" btnClickMethod="$refresh">
        <i class="fas fa-refresh"></i>
      </x-toolbar-button-component>
      <x-toolbar-button-component btnBsClass="btn-light" btnClickMethod="$dispatch('exitVacancyDisplay')">
        <i class="fas fa-times-circle text-danger mr-1"></i>
        Close
      </x-toolbar-button-component>
    </x-slot>
  </x-toolbar-component>

  <div class="bg-white border p-3">
    <div class="mb-3 h5 font-weight-bold py-3">
      <i class="fas fa-cogs mr-3 text-secondary"></i>
      {{ $vacancy->title }}
    </div>

    <div>
      <div class="row" style="margin: auto;">
        <div class="col-md-3 border p-3 bg-light font-weight-bold">
          Title
        </div>
        <div class="col-md-9 border p-3">
          @if ($modes['updateTitleMode'])
            @livewire ('vacancy.dashboard.vacancy-edit-title', ['vacancy' => $vacancy,])
          @else
            <div class="d-flex justify-content-between">
              <div>
                {{ $vacancy->title }}
              </div>
              <div>
                <button class="btn btn-light" wire:click="enterMode('updateTitleMode')">
                  Edit
                </button>
              </div>
            </div>
          @endif
        </div>
      </div>
    </div>

    <div>
      <div class="row" style="margin: auto;">
        <div class="col-md-3 border p-3 bg-light font-weight-bold">
          Vacancy ID
        </div>
        <div class="col-md-9 border p-3">
          {{ $vacancy->vacancy_id }}
        </div>
      </div>
    </div>

    <div>
      <div class="row" style="margin: auto;">
        <div class="col-md-3 border p-3 bg-light font-weight-bold">
          Posted Date
        </div>
        <div class="col-md-9 border p-3">
          {{ $vacancy->created_at->toDateString() }}
        </div>
      </div>
    </div>

    <div>
      <div class="row" style="margin: auto;">
        <div class="col-md-3 border p-3 bg-light font-weight-bold">
          Job location
        </div>
        <div class="col-md-9 border p-3">
          {{ $vacancy->job_location }}
        </div>
      </div>
    </div>

    <div>
      <div class="row" style="margin: auto;">
        <div class="col-md-3 border p-3 bg-light font-weight-bold">
          Description
        </div>
        <div class="col-md-9 border p-3">
          @if ($modes['updateDescriptionMode'])
            @livewire ('vacancy.dashboard.vacancy-edit-description', ['vacancy' => $vacancy,])
          @else
            <div class="d-flex justify-content-between">
              <div>
                {{ $vacancy->description }}
              </div>
              <div>
                <button class="btn btn-light" wire:click="enterMode('updateDescriptionMode')">
                  Edit
                </button>
              </div>
            </div>
          @endif
        </div>
      </div>
    </div>

    <div>
      <div class="row" style="margin: auto;">
        <div class="col-md-3 border p-3 bg-light font-weight-bold">
          Status
        </div>
        <div class="col-md-9 border p-3">
          Active
        </div>
      </div>
    </div>
  </div>

  {{--
     |
     | Delete vacancy
     |
  --}}
  @if (false)
  <div class="bg-white border p-3 my-3">
    <div class="col-md-6 p-0 border rounded">
      <div>
        <div class="d-flex justify-content-between p-3">
          <div>
            <div>
              <strong>
                Delete this vacancy
              </strong>
            </div>
            <div>
              Once you delete, it cannot be undone. Please be sure.
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endif

</div>
