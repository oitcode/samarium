<div>


  <div class="bg-white border pt-3 pl-3">
    <div class="d-flex justify-content-between">

      @if (true)
      <div class="mb-4 d-none d-md-block p-0">

        {{-- Date selector --}}
        <div class="float-left d-flex bg-warning-rm">
          <button class="btn btn-light mr-3 p-0 bg-white-rm badge-pill-rm" wire:click="setPreviousDay">
            <i class="far fa-arrow-alt-circle-left fa-2x text-secondary"></i>
          </button>

          <button class="btn {{ env('OC_ASCENT_BTN_COLOR', 'btn-dark') }} mr-3 px-2 font-weight-bold rounded-lg" style="min-width: 300px;">
            @if (\Carbon\Carbon::today() == \Carbon\Carbon::create($calendarDate))
              <span class="">
                TODAY
              </span>
            @elseif (\Carbon\Carbon::yesterday() == \Carbon\Carbon::create($calendarDate))
              <span class="">
                YESTERDAY
              </span>
            @elseif (\Carbon\Carbon::tomorrow() == \Carbon\Carbon::create($calendarDate))
              <span class="">
                TOMORROW
              </span>
            @else
              <span class="">
                {{ Carbon\Carbon::parse($calendarDate)->format('Y F d') }}
                &nbsp;&nbsp;
                {{ Carbon\Carbon::parse($calendarDate)->format('l') }}
              </span>
            @endif
          </button>

          <button class="btn btn-light m-0 p-0 bg-white-rm badge-pill-rm" wire:click="setNextDay">
            <i class="far fa-arrow-alt-circle-right fa-2x text-secondary"></i>
          </button>

          <div class="d-none d-md-block my-3-rm text-secondary-rm ml-3" style="font-size: 1rem;">

            <input type="date" wire:model.defer="calendarDate" class="ml-5">
            <button class="btn btn-light" wire:click="setCalendarDate">
              Go
            </button>
          </div>
        </div>

        <div class="float-left">
          @if ($today['is_holiday'])
            <button class="btn btn-light">
              <i class="fas fa-flag text-danger"></i>
              HOLIDAY
            </button>
          @else
            <button class="btn btn-light">
              NOT A HOLIDAY
            </button>
          @endif
        </div>
        <div wire:loading>
          <div class="spinner-border text-info mr-3" role="status">
            <span class="sr-only">Loading...</span>
          </div>
        </div>

        <div class="clearfix">
        </div>

      </div>
      @endif
    </div>


    {{-- Show if holidary or not --}}
    <div class="col-md-6 p-0 bg-danger-rm text-white-rm mb-3-rm">
      @if (false)
      <h2 class="h5 font-weight-bold mb-3">
        Holiday
      </h2>
      @endif
    </div>

    <div class="row" style="margin: auto;">
      <div class="col-md-6 p-0 bg-danger-rm text-white-rm border-rm bg-warning-rm border-rm">
        {{-- Show calendar events for the selected date --}}
        <h2 class="h5 font-weight-bold mb-3">
          Events
        </h2>
        @if (count($today['events']) > 0)
          @foreach ($today['events'] as $event)
            <div class="mb-3 p-2 border rounded-lg shadow-rm bg-dark-rm text-white-rm py-3">
              <i class="fas fa-calendar mr-1 @if ($event->is_holiday == 'yes') text-danger @else text-primary @endif"></i>
              <span class="h6">
                {{ $event->title }}
              </span>
            </div>
          @endforeach
        @else
          No events
        @endif
      </div>
      @if (false)
      <div class="col-md-6">
        @if ($today['is_holiday'])
          <div class="font-weight-bold border shadow-rm p-2 py-3 rounded-lg">
            <i class="fas fa-flag text-danger"></i>
            HOLIDAY
          </div>
        @else
          <div class="bg-light text-dark font-weight-bold border shadow-rm p-2 py-3 rounded-lg">
            NOT A HOLIDAY
          </div>
        @endif
      </div>
      @endif
    </div>

  </div>


</div>
