<div>

  @foreach ($calendarEvents as $calendarEvent)
    <div class="d-flex mb-3">
      <div class="border-right mr-4 pr-4">
        <div class="h2 font-weight-bold text-success">
          30
        </div>
        Aug
      </div>
      <div class="">
        {{ $calendarEvent->title }}
      </div>
    </div>
  @endforeach

</div>
