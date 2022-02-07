<div class="card">
  <div class="card-header">
    <h3 class="card-title">
      {{ $title }}
    </h3>

    <div wire:loading.delay class="float-right text-info">
      <div class="spinner-border spinner-border-sm text-info mr-3" role="status">
        <span class="sr-only">Loading...</span>
      </div>
      Loading ...
    </div>

  </div>
  <div class="card-body p-0">
    {{ $slot }}
  </div>
</div>
