<div>
  <div class="row">
  
    <div class="col-md-4" style="font-size: 1.5rem;">
      <div class="mb-2">
        <i class="fas fa-map-marker-alt mr-3"></i>
        {{ $company->name }}
      </div>
      <div style="font-size: 1rem;">
        <i class="fas fa-phone mr-3"></i>
        {{ $company->phone }}
      </div>
      <div style="font-size: 1rem;">
        <i class="fas fa-map-marker-alt mr-3"></i>
        {{ $company->address }}
      </div>
    </div>
  
    <div class="col-md-4" style="font-size: 1.3rem;">
      <div class="mb-2">
        @if (false)
        <i class="fas fa-star mr-3"></i>
        @endif
        Social media
      </div>
      <div>
        <div class="float-left text-primary" style="">
          <i class="fab fa-facebook mr-3 fa-2x"></i>
        </div>
        <div class="float-left text-info" style="">
          <i class="fab fa-twitter mr-3 fa-2x"></i>
        </div>
        <div class="float-left text-danger" style="">
          <i class="fab fa-instagram mr-3 fa-2x"></i>
        </div>
        <div class="float-left text-danger" style="">
          <i class="fab fa-youtube mr-3 fa-2x"></i>
        </div>
        <div class="clearfix">
        </div>
      </div>
    </div>

    @if (true)
    <div class="col-md-4" style="font-size: 1rem;">
      @if (false)
      <img src="{{ asset('storage/' . $company->logo_image_path) }}" class="img-fluid" style="height: 80px;">
      @else
        <div class="text-secondary">
          Online order queries: 
          <span class="text-primary">
          +977 1 4423005
          </span>
        </div>

        <div class="text-secondary">
          Appy for job
          <span class="text-primary">
          +977 1 4423006
          </span>
        </div>
      @endif
    </div>
    @endif
  </div>
  <div class="text-center-rm mt-4">
    &copy; 2022 | Website developed by OIT
  </div>
</div>
