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
  <div class="border">
    <div class="h6 px-2 mb-0 mt-3 mb-2">
      <span class="font-weight-bold badge badge-dark">
        Today
      </span>
      </br>
      </br>
      <span class="h4 font-weight-bold">
        {{ \App\Traits\NepaliDateTrait::convertEnglishToNepaliDate($today['day']->toDateString(), 'english')  }}
        2081,
        {{ $today['day']->format('l') }}
      </span>
    </div>
    <div class="px-3">
      <h2 class="h5 font-weight-bold my-0">
      </h2>
    </div>
    @if ($today['is_holiday'] == 'yes')
      <div class="p-3">
        <div class="badge badge-pill badge-danger px-3">
          <span class="h6">
            Holiday
          </span>
        </div>
      </div>
    @else
    @endif
      <div class="px-2 pb-3 flex-grow-1">
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
