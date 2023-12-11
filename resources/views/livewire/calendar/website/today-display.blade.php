<div class="my-4-rm mb-5-rm border p-3-rm rounded shadow">


  <div style="
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
  ">
    <div class="h5 p-3 mb-0 font-weight-bold" style="background-color: rgba(0, 0, 0, 0.2);">
      TODAY
    </div>
  </div>

  <div class="row" style="margin: auto;
    {{--
    background-color:
        @if (\App\CmsTheme::first())
          {{ \App\CmsTheme::first()->ascent_bg_color }}
        @else
          orange
        @endif
        ;
    color:
        @if (\App\CmsTheme::first())
          {{ \App\CmsTheme::first()->ascent_text_color }}
        @else
          white
        @endif
    ;
    --}}
  ">
    @if (false)
    <div class="col-md-3 p-3 bg-primary-rm text-white-rm">
      <span class="h5 font-weight-bold mb-3">
      TODAY
      </span>
      @if ($today['is_holiday'] == 'yes')
        <br/>
        <span class="badge badge-pill badge-danger h5 font-weight-bold p-2">
          HOLIDAY
        </span>
      @endif
    </div>
    @endif
    <div class="col-md-3 bg-info-rm text-white-rm p-3">
      <h2 class="h5 font-weight-bold mb-3">
        {{ strtoupper($today['day']->format('l')) }}
      </h2>
      {{ \App\Traits\NepaliDateTrait::convertEnglishToNepaliDate($today['day']->toDateString(), 'english')  }}
      <br />
      <span class="">
        {{ $today['day']->format('Y F d') }}
      </span>
    </div>
    @if ($today['is_holiday'] == 'yes')
      <div class="col-md-3 p-3 bg-success-rm text-white-rm border">
        <div class="badge badge-pill badge-danger px-3">
          <span class="h5 font-weight-bold">
            HOLIDAY
          </span>
        </div>
      </div>
    @endif
    <div class="col-md-6 bg-success-rm text-white-rm p-3 flex-grow-1">
      <h2 class="h5 font-weight-bold mb-3">
        EVENTS
      </h2>
      @if (count($today['events']) > 0)
        @foreach ($today['events'] as $event)
          <i class="fas fa-calendar mr-1"></i>
          <span class="">
            {{ $event->title }}
          </span>
          <br />
        @endforeach
      @else
        No events
      @endif
    </div>
  </div>


</div>
