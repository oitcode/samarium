<div class="d-flex-rm justify-content-center-rm border bg-white text-white-rm p-3 shadow">
    <div>
      @if (true)
      <h2 class="h5 text-success-rm font-weight-bold mb-3">
        <div class="mb-3">
          <img src="{{ asset('storage/' . $company->logo_image_path) }}" class="img-fluid" style="height: 75px;">
        </div>
        {{ $company->name }}
      </h2>
      @endif

      @if (true)
      <div class="">
        <h3 class="h6 mb-0 text-secondary">
          {{ $company->tagline }}
        </h3>
      </div>
      @endif

      @if (false)
      <div class="text-secondary-rm">
        <div class="mr-3">
          <i class="fas fa-copyright mr-1"></i>
          Powered by
          OIT
        </div>
      </div>
      @endif

    </div>
</div>
