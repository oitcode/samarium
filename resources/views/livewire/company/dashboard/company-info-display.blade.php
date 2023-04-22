<div>
  @if (! $modes['editMode'])
    <div class="d-flex justify-content-between bg-white border p-3">
      <div class="mr-3 font-weight-bold">
        {{ $companyInfo->info_key }}
      </div>
      <div>
        {{ $companyInfo->info_value }}
      </div>
      <div>
        <button class="btn ml-3 mr-1" wire:click="enterMode('editMode')">
          <i class="fas fa-pencil-alt"></i>
        </button>
        <button class="btn mr-1">
          <i class="fas fa-trash"></i>
        </button>
      </div>
    </div>
  @elseif ($modes['editMode'])
    @livewire ('company.dashboard.company-info-update', ['companyInfo' => $companyInfo,])
  @endif
</div>
