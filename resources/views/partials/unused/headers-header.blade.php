{{-- Very top bar --}}
<div class="container-fluid border bg-success text-white d-none d-md-block" style="{{--background-color: #fafafa;--}}">
  <div class="d-flex py-2 pl-4">
    {{-- Clock --}}
    <div class="mr-4">
      <i class="fas fa-cloud-download-alt text-white mr-2"></i>
      <span class="text-white" style="font-family: Mono;">
        Shop online
      </span>
    </div>

    {{-- Phone --}}
    <div class="mr-4">
      <i class="fas fa-phone text-white mr-2"></i>
      <span class="text-white" style="font-family: Arial;">
        {{ $company->phone }}
      </span>
    </div>
  </div>
</div>
