<div>
    <div class="container-fluid px-0 px-md-2 py-2 bg-white-rm text-dark-rm table-danger-rm border-bottom">
        
        <div class="container">
          <!-- Scrolling Ticker Notice -->
          <div class="o-ticker-container o-ticker-fast">
              <div class="o-ticker-label bg-danger text-white o-heading o-border-radius-sm px-3 py-2 mr-3">
                  Latest Notice:
              </div>
              <div class="o-ticker-content">
                  @if ($notices != null && count($notices) >0)
                    @foreach ($notices as $notice)
                      <span class="o-ticker-item">
                          <a href="{{ route('website-webpage-' . $notice->permalink) }}" class="text-decoration-none text-reset">
                            📢
                            {{ $notice->name }}
                          </a>
                      </span>
                    @endforeach
                  @else
                    <span class="o-ticker-item">
                       <i class="fas fa-exclamation-circle mr-1"></i>
                       No notice to display. Please check again for latest notice.
                    </span>
                  @endif
              </div>
          </div>
        </div>
        
    </div>
</div>
