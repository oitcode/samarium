{{-- Very top bar --}}
<div class="container-fluid border bg-success text-white d-none d-md-block">
  <div class="d-flex py-2 pl-4">
    {{-- Clock --}}
    <div class="mr-4">
      <i class="fas fa-cloud-download-alt text-white mr-2"></i>
      <span class="text-white">
        Shop online
      </span>
    </div>

    {{-- Phone --}}
    <div class="mr-4">
      <i class="fas fa-phone text-white mr-2"></i>
      <span class="text-white">
        {{ $company->phone }}
      </span>
    </div>
  </div>
</div>
