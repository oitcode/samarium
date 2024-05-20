<div class="rounded bg-white">


  @if (true)
  <div style="
    {{--
    background-color:
        @if (\App\CmsTheme::first())
          {{ \App\CmsTheme::first()->footer_bg_color }}
        @else
          orange
        @endif
        ;
    color:
        @if (\App\CmsTheme::first())
          {{ \App\CmsTheme::first()->footer_text_color }}
        @else
          white
        @endif
        ;
        --}}
  ">
  </div>
  @endif

  <div>
  </div>
  <div class="border bg-danger-rm" style="">
    <div class="h6 px-2 mb-0 mt-3 text-muted mb-2">
      <span class="text-success-rm p-1-rm border-rm border-danger-rm px-2-rm bg-success-rm text-white-rm font-weight-bold text-dark">
      Today
      </span>,
      {{ \App\Traits\NepaliDateTrait::convertEnglishToNepaliDate($today['day']->toDateString(), 'english')  }}
      2081,
      {{ $today['day']->format('l') }}
    </div>
    <div class="col-md-3-rm bg-info-rm text-white-rm px-3">
      <h2 class="h5 font-weight-bold my-0">
      </h2>
      @if (false)
      <span class="">
        {{ $today['day']->format('Y F d') }}
      </span>
      @endif
    </div>
    @if ($today['is_holiday'] == 'yes')
      <div class="col-md-3-rm p-3 bg-success-rm text-white-rm border-rm">
        <div class="badge badge-pill badge-danger px-3">
          <span class="h6 font-weight-bold-rm">
            Holiday
          </span>
        </div>
      </div>
    @else
      @if (false)
      <div class="col-md-3-rm p-3 bg-success-rm text-white-rm border-rm">
        <div class="badge badge-pill badge-success px-3">
          <span class="h6 font-weight-bold-rm">
            Open
          </span>
        </div>
      </div>
      @endif
    @endif
    <div class="col-md-6-rm bg-success-rm text-white-rm px-2 pb-3 flex-grow-1">
      @if (false)
      <h2 class="h5 font-weight-bold mb-0">
        Events
      </h2>
      @endif
      @if (count($today['events']) > 0)
        @foreach ($today['events'] as $event)
          <i class="fas fa-calendar mr-1"></i>
          <span class="">
            {{ $event->title }}
          </span>
          <br />
        @endforeach
      @else
        <div class="p-0">
          No calendar events
        </div>
      @endif
    </div>
  </div>


</div>
