{{-- Very top bar --}}
<div class="container-fluid border bg-danger-rm d-none d-md-block" style="background-color: #d9f1ff;">
  <div class="py-3 pl-4">

    {{-- Address --}}
    <div class="float-left mr-4">
      <i class="fas fa-map-marker-alt text-primary mr-2"></i>
      <span class="text-secondary" style="font-family: Arial;">
        {{ $company->name }}
      </span>
    </div>

    {{-- Clock --}}
    <div class="float-left">
      <i class="fas fa-clock text-primary mr-2"></i>
      <span class="text-secondary" style="font-family: Arial;">
        Mon - Fri: 09 AM - 05 PM
      </span>
    </div>


    {{-- Linkedin --}}
    <div class="float-right mr-3">
      <i class="fab fa-linkedin text-primary mr-2 fa-2x"></i>
    </div>

    @if (false)
    {{-- Twitter Link --}}
    <div class="float-right mr-3">
      <i class="fab fa-twitter text-primary mr-2 fa-2x"></i>
    </div>
    @endif

    {{-- FB Link --}}
    <div class="float-right mr-3">
      <i class="fab fa-facebook text-primary mr-2 fa-2x"></i>
    </div>

    {{-- Phone --}}
    <div class="float-right mr-4">
      <i class="fas fa-phone text-primary mr-2"></i>
      <span class="text-secondary" style="font-family: Arial;">
        {{ $company->phone }}
      </span>
    </div>


    <div class="clearfix">
    </div>
  </div>
</div>
