<div>
  <div class="row">
  
    <div class="col-md-3" style="">
      <h3 class="h5">
        ABOUT
      </h3>
      <div class="mb-2">
        <a href="{{ route('ecomm-collection-webpage-display-about-us') }}"
            class="text-white text-decoration-none">
          <i class="fas fa-angle-right mr-2"></i>
          About us
        </a>
      </div>
      <div class="mb-2">
        <a href=""
            class="text-white text-decoration-none">
          <i class="fas fa-angle-right mr-2"></i>
          Contact us
        </a>
      </div>
      <div class="mb-2">
        <a href="{{ route('ecomm-collection-webpage-display-careers') }}"
            class="text-white text-decoration-none">
          <i class="fas fa-angle-right mr-2"></i>
          Careers
        </a>
      </div>
      <div class="mb-2">
        <a href=""
            class="text-white text-decoration-none">
          <i class="fas fa-angle-right mr-2"></i>
          Press
        </a>
      </div>
    </div>

    <div class="col-md-3" style="">
      <h3 class="h5">
        HELP
      </h3>
      <div class="mb-2">
        <a href="{{ route('ecomm-collection-webpage-display-payments') }}"
            class="text-white text-decoration-none">
          <i class="fas fa-angle-right mr-2"></i>
          Payments
        </a>
      </div>
      <div class="mb-2">
        <a href="{{ route('ecomm-collection-webpage-display-shipping') }}"
            class="text-white text-decoration-none">
          <i class="fas fa-angle-right mr-2"></i>
          Shipping
        </a>
      </div>
      <div class="mb-2">
        <a href="{{ route('ecomm-collection-webpage-display-cancellation-and-returns') }}"
            class="text-white text-decoration-none">
          <i class="fas fa-angle-right mr-2"></i>
          Cancellation and returns
        </a>
      </div>
      <div class="mb-2">
        <a href=""
            class="text-white text-decoration-none">
          <i class="fas fa-angle-right mr-2"></i>
          FAQ
        </a>
      </div>
    </div>
  
    <div class="col-md-3" style="">
      <div class="mb-2">
        POLICY
      </div>
      <div class="mb-2">
        <a href="{{ route('ecomm-collection-webpage-display-return-policy') }}"
            class="text-white text-decoration-none">
          <i class="fas fa-angle-right mr-2"></i>
          Return policy
        </a>
      </div>
      <div class="mb-2">
        <a href="{{ route('ecomm-collection-webpage-display-terms-of-use') }}"
            class="text-white text-decoration-none">
          <i class="fas fa-angle-right mr-2"></i>
          Terms of use
        </a>
      </div>
      <div class="mb-2">
        <a href="{{ route('ecomm-collection-webpage-display-privacy') }}"
            class="text-white text-decoration-none">
          <i class="fas fa-angle-right mr-2"></i>
          Privacy
        </a>
      </div>
      <div class="mb-2">
        <a href="{{ route('ecomm-collection-webpage-display-sitemap') }}"
            class="text-white text-decoration-none">
          <i class="fas fa-angle-right mr-2"></i>
          Sitemap
        </a>
      </div>
    </div>

    @if (true)
    <div class="col-md-3" style="font-size: 1rem;">
      <div class="text-secondary">
        {{ $company->tagline }}
      </div>
    </div>
    @endif
  </div>

  <hr>
  <div class="border-top-rm text-center mt-4 pt-3" style="color: #aaa;">
    <div>
      &copy; 2022
      {{ $company->name }}
      |
      All rights reserved
    </div>
    <div>
      Website developed by
      <a href="https://oit.com.np">
        OIT
      </a>
      <i class="fas fa-check-circle ml-2"></i> 
    </div>
  </div>
</div>
