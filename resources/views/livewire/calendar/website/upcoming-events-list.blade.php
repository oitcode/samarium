<div>

  @foreach ($calendarEvents as $calendarEvent)
    @php
      $eventDate = \Carbon\Carbon::create($calendarEvent->start_date);
    @endphp
    <div class="d-flex mb-3">
      <div class="border-right mr-4 pr-4">
        <div class="h2 font-weight-bold text-success">
        {{ $eventDate->format('F j' ) }}
        </div>
        {{ $eventDate->format('l') }}
      </div>
      <div class="">
        {{ $calendarEvent->title }}

        @if ($calendarEvent->calendarGroups != null && count($calendarEvent->calendarGroups) > 0)
          @foreach ($calendarEvent->calendarGroups as $calendarGroup)
            <span class="badge badge-primary p-2">
            {{ $calendarGroup->name }}
          @endforeach
        @endif
      </div>
    </div>
  @endforeach

</div>
