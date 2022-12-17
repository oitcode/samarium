<div>
  <div class="row">
  
    <div class="col-md-4" style="font-size: 1.3rem;">
      <div class="mb-3" style="font-size: 1.3rem; font-weight: bold;">
        Address
      </div>
      <div class="mb-2">
        <i class="fas fa-map-marker-alt mr-3"></i>
        {{ $company->name }}
      </div>
      <div class="mb-1" style="font-size: 1rem;">
        <i class="fas fa-phone mr-3"></i>
        {{ $company->phone }}
      </div>
      <div class="mb-1" style="font-size: 1rem;">
        <i class="fas fa-envelope mr-3"></i>
        {{ $company->email }}
      </div>
      <div class="mb-4" style="font-size: 1rem;">
        <i class="fas fa-map-marker-alt mr-3"></i>
        {{ $company->address }}
      </div>
      <div>
        @if (true)
          <a href="" target="_blank">
            <div class="float-left text-info" style="">
              <i class="fab fa-facebook mr-3 fa-2x"></i>
            </div>
          </a>
        @endif
        @if (false)
          <a href="" target="_blank">
            <div class="float-left text-info" style="">
              <i class="fab fa-twitter mr-3 fa-2x"></i>
            </div>
          </a>
        @endif
        @if (true)
          <a href="" target="_blank">
            <div class="float-left text-info" style="">
              <i class="fab fa-linkedin mr-3 fa-2x"></i>
            </div>
          </a>
        @endif
        @if (false)
          <a href="" target="_blank">
            <div class="float-left text-danger" style="">
              <i class="fab fa-youtube mr-3 fa-2x"></i>
            </div>
          </a>
        @endif
        @if (false)
          <a href="" target="_blank">
            <div class="float-left text-danger" style="">
              <i class="fab fa-tiktok mr-3 fa-2x"></i>
            </div>
          </a>
        @endif
      </div>
    </div>
  
    <div class="col-md-3">
      <div class="mb-3" style="font-size: 1.3rem; font-weight: bold;">
        Services
      </div>
      <div class="mb-2">
        <a href=""
            class="text-white text-decoration-none">
          <i class="fas fa-angle-right mr-2"></i>
          Geotechnical investigation
        </a>
      </div>
      <div class="mb-2">
        <a href=""
            class="text-white text-decoration-none">
          <i class="fas fa-angle-right mr-2"></i>
          Design works
        </a>
      </div>
      <div class="mb-2">
        <a href=""
            class="text-white text-decoration-none">
          <i class="fas fa-angle-right mr-2"></i>
          Protection works design
        </a>
      </div>
      <div class="mb-2">
        <a href=""
            class="text-white text-decoration-none">
          <i class="fas fa-angle-right mr-2"></i>
          Slope stability analysis
        </a>
      </div>
      <div class="mb-2">
        <a href=""
            class="text-white text-decoration-none">
          <i class="fas fa-angle-right mr-2"></i>
          Topographical survey
        </a>
      </div>
      <div class="mb-2">
        <a href=""
            class="text-white text-decoration-none">
          <i class="fas fa-angle-right mr-2"></i>
          Construction supervision
        </a>
      </div>
    </div>

    <div class="col-md-3">
      <div class="mb-3" style="font-size: 1.3rem; font-weight: bold;">
        Quick Links
      </div>
      <div class="mb-2">
        <a href="" class="text-white text-decoration-none">
          <i class="fas fa-angle-right mr-2"></i>
          Home
        </a>
      </div>
      <div class="mb-2">
        <a href="" class="text-white text-decoration-none">
          <i class="fas fa-angle-right mr-2"></i>
          About us
        </a>
      </div>
      <div class="mb-2">
        <a href="" class="text-white text-decoration-none">
          <i class="fas fa-angle-right mr-2"></i>
          Services
        </a>
      </div>
      <div class="mb-2">
        <a href="" class="text-white text-decoration-none">
          <i class="fas fa-angle-right mr-2"></i>
          Portfolio
        </a>
      </div>
      <div class="mb-2">
        <a href="" class="text-white text-decoration-none">
          <i class="fas fa-angle-right mr-2"></i>
          Contact us
        </a>
      </div>
    </div>

    @if (true)
    <div class="col-md-2" style="font-size: 1rem;">
      <div class="mb-3" style="font-size: 1.3rem; font-weight: bold;">
        Map
      </div>
    </div>
    @endif
  </div>

  <hr />

  <div class="text-center-rm mt-4">
    &copy; 2022 | {{ $company->name }} | All rights reserved
        
        
  </div>
</div>
