<div class="border-rm bg-white-rm">


  @if (!is_null($userGroups) && count($userGroups) > 0)
    {{-- Show in bigger screens --}}
    <div class="d-none d-md-block bg-white border">
      <div class="table-responsive">
        <table class="table table-hover table-valign-middle">
          <thead>
            <tr class="{{ env('OC_ASCENT_BG_COLOR', 'bg-success') }}
                {{ env('OC_ASCENT_TEXT_COLOR', 'text-white') }}
                p-4" style="font-size: 1rem;">
              <th>User group ID</th>
              <th>Name</th>
              <th>Description</th>
            </tr>
          </thead>
  
          <tbody>
            @foreach($userGroups as $userGroup)
            <tr>
              <td>
                {{ $userGroup->user_group_id }}
              </td>

              <td class="font-weight-bold" wire:click="$emit('displayUserGroup', {{ $userGroup }})" role="button">
                {{ $userGroup->name }}
              </td>

              <td>
                {{ $userGroup->description }}
              </td>

            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>

    {{-- Show in smaller screens --}}
    <div class="d-md-none">

      @foreach ($userGroups as $userGroup)
        <div class="bg-white border px-3">
          <div class="h4-rm py-4">
            <span  wire:click="$emit('displayUserGroup', {{ $userGroup }})" class="h5 text-dark font-weight-bold" role="button">
              {{ \Illuminate\Support\Str::limit($userGroup->name, 60, $end=' ...') }}
            </span>
          </div>
        </div>
      @endforeach
    </div>
  @else
    <div class="p-2 text-muted">
      No user groups to display.
    </div>
  @endif


</div>
