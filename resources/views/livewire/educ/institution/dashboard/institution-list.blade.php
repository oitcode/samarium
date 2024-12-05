<div>


  <!-- Flash message div -->
  @if (session()->has('message'))
    @include ('partials.flash-message', [
        'flashMessage' => session('message'),
    ])
  @endif


  @if (true)
  <div class="table-responsive">
    <table class="table table-hover shadow-sm border">
      <thead>
        <tr class="p-4 bg-white text-dark">
          <th>
            Name
          </th>
          <th>
            Country
          </th>
          <th>
            Type
          </th>
          <th>
            Action
          </th>
        </tr>
      </thead>

      <tbody class="bg-white">
        @if ($educInstitutions != null && count($educInstitutions) > 0)
          @foreach ($educInstitutions as $educInstitution)
            <tr wire:click="$dispatch('displayEducInstitution',{ educInstitution: {{ $educInstitution }} })">
              <td>
              {{ $educInstitution->name }}
              </td>
              <td class="h6 font-weight-bold" wire:click="" role="button">
                <span>
                  {{ $educInstitution->country }}
                </span>
              </td>
              <td>
                {{ $educInstitution->institution_type }}
              </td>
              <td>
                <i class="fas fa-ellipsis-horizontal"></i>
              </td>
            </tr>
          @endforeach
        @else
          <tr>
            <td colspan="4">
              <p class="font-weight-bold text-muted-rm h4 py-4 text-center" style="color: #fe8d01;">
                <i class="fas fa-exclamation-circle mr-2"></i>
                No institutions
              <p>
            </td>
          </tr>
        @endif
      </tbody>
    </table>

  </div>
  @endif

</div>
