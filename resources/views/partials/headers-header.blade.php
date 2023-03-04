{{-- Very top bar --}}
<div class="container-fluid border bg-primary text-white d-none d-md-block" style="{{--background-color: #fafafa;--}}">
  <div class="py-2 pl-4">

    {{-- Clock --}}
    <div class="float-left mr-4">
      <i class="fas fa-cloud-download-alt text-white mr-2"></i>
      <span class="text-white" style="font-family: Mono;">
        Shop online
      </span>
    </div>

    @if (false)
    {{-- Address --}}
    <div class="float-left pl-3 mr-4 ml-5 border-rm border-rm border-left-rm border-danger-left-rm text-white-rm" style="">
      BROWSE
      <i class="fas fa-angle-right text-info mx-2"></i>
      ADD TO CART
      <i class="fas fa-angle-right text-info mx-2"></i>
      CHECKOUT
      <i class="fas fa-angle-right text-info mx-2"></i>
      <span class="text-success-rm" style="{{--color: #faf;--}} font-family: Arial;">
        FINISH
      </span>
    </div>
    @endif

    @if (false)
    {{-- Just a message --}}
    <div class="float-left ml-3" style="font-size: 0.7rem;">
      <span class="text-secondary" style="font-family: Mono;">
        Thanks for visiting our e-store.
      </span>
    </div>

    {{-- Feedback link --}}
    <div class="float-left ml-3">
      <span class="text-white" style="font-family: Mono;">
        Send feedback.
      </span>
    </div>
    @endif


    @if (false)
    {{-- Linkedin --}}
    <div class="float-right mr-3">
      <i class="fab fa-linkedin text-primary mr-2 fa-2x"></i>
    </div>

    {{-- Twitter Link --}}
    <div class="float-right mr-3">
      <i class="fab fa-twitter text-primary mr-2 fa-2x"></i>
    </div>

    {{-- FB Link --}}
    <div class="float-right mr-3">
      <i class="fab fa-facebook text-primary mr-2 fa-2x"></i>
    </div>
    @endif

    {{-- Phone --}}
    <div class="float-right mr-4">
      <i class="fas fa-phone text-white mr-2"></i>
      <span class="text-white" style="font-family: Arial;">
        {{ $company->phone }}
      </span>
    </div>


    <div class="clearfix">
    </div>
  </div>
</div>
