{{-- A simple flash card --}}
<div class="card shadow-sm h-100 d-none d-md-block">
  <div class="card-body p-0 {{ $fcCardColor }}">
    <div class="p-3">
      <div class="d-flex justify-content-between">
        <h2 class="h5 mb-3">
          {{ $fcTitle }}
        </h2>
        <i class="{{ $fcIconFaClass }}"></i>
      </div>
      <h2 class="h3 font-weight-bold">
        {{ $fcData }}
      </h2>
    </div>
  </div>
</div>
