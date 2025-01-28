<div class="text-white" style="height: 100vh !important; background-image: linear-gradient(to right, #345 , #2ad);">
  <div class="d-flex justify-content-center h-100">
    <div class="d-flex flex-column justify-content-center h-100 p-3">
      <h1 class="h2 font-weight-bold mb-5">
        {{ config('app.cmp_name') }}
      </h1>
      <h2 class="h4 mb-5">
        <i class="fas fa-circle mr-1"></i>
        Our website is coming soon.
        <br/>
        <i class="fas fa-circle mr-1"></i>
        Please check again in future.
        <br/>
        <i class="fas fa-circle mr-1"></i>
        Thanks.
      </h2>
      @if (config('app.cmp_url'))
        <h5>
          {{ config('app.cmp_url') }}
        </h5>
      @endif
    </div>
  </div>
</div>
