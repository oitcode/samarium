<div>


  @if (!is_null($calendarGroups) && count($calendarGroups) > 0)

    {{-- Show in bigger screens --}}
    <div class="d-none d-md-block bg-white border">
      <div class="table-responsive">
        <table class="table table-hover table-valign-middle">
          <thead>
            <tr class="{{ env('OC_ASCENT_BG_COLOR', 'bg-success') }}
                {{ env('OC_ASCENT_TEXT_COLOR', 'text-white') }}
                p-4" style="font-size: 1rem;">
              <th>Calendar group ID</th>
              <th>Name</th>
            </tr>
          </thead>
  
          <tbody>
            @foreach ($calendarGroups as $calendarGroup)
            <tr>

              <td>
                {{ $calendarGroup->calendar_group_id }}
              </td>

              <td class="font-weight-bold" wire:click="$emit('displayCalendarGroup', {{ $calendarGroup }})" role="button">
                {{ $calendarGroup->name }}
              </td>

            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>


    {{-- Show in smaller screens --}}
    <div class="d-md-none">

      @foreach ($calendarGroups as $calendarGroup)
        <div class="bg-white border px-3">
          <div class="h4-rm py-4">
            <span  wire:click="$emit('displayCalendarGroup', {{ $calendarGroup }})" class="h5 text-dark font-weight-bold" role="button">
              {{ $calendarGroup->name }}
            </span>
          </div>
        </div>
      @endforeach
    </div>

  @else
    <div class="p-2 text-muted">
      No calendar groups.
    </div>
  @endif


</div>
