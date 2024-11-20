<div>


  <div class="pt-3 pl-3">
    <div class="d-flex justify-content-between">

      <div class="mb-4 d-none d-md-block p-0">

        {{-- Date selector --}}
        <div class="float-left d-flex">


          <button class="btn btn-light mr-3 p-0" wire:click="setPreviousDay">
            <i class="far fa-arrow-alt-circle-left fa-2x text-secondary"></i>
          </button>

          <button class="btn btn-light m-0 p-0" wire:click="setNextDay">
            <i class="far fa-arrow-alt-circle-right fa-2x text-secondary"></i>
          </button>

          <div class="d-none d-md-block ml-3" style="font-size: 1rem;">

            <input type="date" wire:model="calendarDate" class="">
            <button class="btn btn-light" wire:click="setCalendarDate">
              Go
            </button>
          </div>

          <span class=" mr-3 px-2 font-weight-bold rounded-lg ml-5 pt-2" style="min-width: 300px;">
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
          </span>
        </div>

        <div wire:loading>
          <div class="spinner-border text-info mr-3" role="status">
            <span class="sr-only">Loading...</span>
          </div>
        </div>

        <div class="clearfix">
        </div>

      </div>
    </div>


    <div class="row" style="margin: auto;">
      <div class="col-md-6 p-0">
        {{-- Show calendar events for the selected date --}}
        <h2 class="h5 font-weight-bold mb-3">
          Events
        </h2>
        @if (count($today['events']) > 0)
          @foreach ($today['events'] as $event)
            <div class="mb-3 p-2 border rounded-lg py-3">
              <i class="fas fa-calendar mr-1 @if ($event->is_holiday == 'yes') text-danger @else text-primary @endif"></i>

              @foreach ($event->calendarGroups as $calendarGroup )
                <span class="badge badge-primary badge-pill mr-3 px-3">
                  {{ $calendarGroup->name }}
                </span>
              @endforeach

              @if ($event->is_holiday == 'yes')
                <span class="badge badge-danger badge-pill mr-3 px-3">
                  Holiday
                </span>
              @endif

              <span class="h6 font-weight-bold">
                {{ $event->title }}
              </span>
            </div>
          @endforeach
        @else
          <div class="my-2">
            No events
          </div>
        @endif
      </div>
    </div>
  </div>


</div>
