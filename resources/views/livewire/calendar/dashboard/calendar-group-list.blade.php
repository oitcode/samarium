<div>


  @if (!is_null($calendarGroups) && count($calendarGroups) > 0)

    {{--
       | Show in bigger screens
    --}}
    <div class="d-none d-md-block bg-white border">
      <div class="table-responsive">
        <table class="table table-hover table-valign-middle">
          <thead>
            <tr class="{{ config('app.oc_ascent_bg_color', 'bg-light') }}
                {{ config('app.oc_ascent_text_color', 'text-dark') }}
                p-4">
              <th class="w-25">Calendar group ID</th>
              <th>Name</th>
              <th class="text-right">Action</th>
            </tr>
          </thead>
  
          <tbody>
            @foreach ($calendarGroups as $calendarGroup)
            <tr>

              <td>
                {{ $calendarGroup->calendar_group_id }}
              </td>

              <td class="font-weight-bold" wire:click="$dispatch('displayCalendarGroup', {calendarGroup: {{ $calendarGroup }} })" role="button">
                {{ $calendarGroup->name }}
              </td>

              <td class="text-right">
                <button class="btn btn-primary px-2 py-1" wire:click="">
                  <i class="fas fa-pencil-alt"></i>
                </button>
                <button class="btn btn-success px-2 py-1" wire:click="">
                  <i class="fas fa-eye"></i>
                </button>
                <button class="btn btn-danger px-2 py-1" wire:click="">
                  <i class="fas fa-trash"></i>
                </button>
              </td>

            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>


    {{--
       | Show in smaller screens
    --}}
    <div class="d-md-none">

      @foreach ($calendarGroups as $calendarGroup)
        <div class="bg-white border px-3">
          <div class="py-4">
            <span  wire:click="$dispatch('displayCalendarGroup', {calendarGroup: {{ $calendarGroup }} })" class="h5 text-dark font-weight-bold" role="button">
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
