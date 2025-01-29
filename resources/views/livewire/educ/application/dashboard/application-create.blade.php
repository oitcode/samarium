<div class="card shadow-sm">

  <div class="card-body p-3">
    <h1 class="h5 font-weight-bold mb-4">
      Create application
    </h1>

    <select class="w-100 h-100 custom-control border-0 bg-white" wire:model="educ_institution_id" wire:change="selectEducInstitution">
      <option>---</option>
  
      @foreach ($educInstitutions as $educInstitution)
        <option value="{{ $educInstitution->educ_institution_id }}">
          {{ $educInstitution->name }}
        </option>
      @endforeach
    </select>

    @if ($selectedEducInstitution)
      <select class="w-100 h-100 custom-control border-0 bg-white" wire:model="educ_institution_program_id">
        <option>---</option>
        @foreach ($selectedEducInstitution->educInstitutionPrograms as $educInstitutionProgram)
          <option value="{{ $educInstitutionProgram->educ_institution_program_id }}">
            {{ $educInstitutionProgram->name }}
          </option>
        @endforeach
      </select>
    @endif

    <div class="py-3 m-0">
      @include ('partials.button-store')
      @include ('partials.button-cancel', ['clickEmitEventName' => 'educApplicationCreateCancelled',])
      @include ('partials.dashboard.spinner-button')
    </div>
  </div>

</div>
