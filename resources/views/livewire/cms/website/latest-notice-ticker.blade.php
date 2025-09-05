<div>
    <div class="container-fluid px-2 py-2 bg-white-rm text-dark-rm table-danger-rm border-bottom">
        
        <div class="container">
          <!-- Scrolling Ticker Notice -->
          <div class="o-ticker-container o-ticker-fast">
              <div class="o-ticker-label bg-danger text-white o-heading o-border-radius-sm px-3 py-2 mr-3">
                  Latest Notice:
              </div>
              <div class="o-ticker-content">
                  @foreach ($notices as $notice)
                    <span class="o-ticker-item">
                        <a href="{{ route('website-webpage-' . $notice->permalink) }}" class="text-decoration-none text-reset">
                          📢
                          {{ $notice->name }}
                        </a>
                    </span>
                  @endforeach
              </div>
          </div>
        </div>
        
    </div>
</div>
