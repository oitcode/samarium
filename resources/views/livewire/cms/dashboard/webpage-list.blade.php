<div>


  {{-- Show in bigger screens --}}
  <div class="d-none d-md-block">
    <div class="table-responsive border">
      <table class="table table-hover table-bordered-rm mb-0">
        <thead>
          <tr class="bg-white text-dark">
            <th class="o-heading">
              Name
            </th>
            <th class="o-heading">
              Author
            </th>
            <th class="o-heading">
              Date
            </th>
            <th class="o-heading">
              Visibility
            </th>
            <th class="o-heading text-right">
              Action
            </th>
          </tr>
        </thead>

        <tbody class="bg-white">
          @if (!is_null($webpages) && count($webpages) > 0)
            @foreach ($webpages as $webpage)
              <tr>
                <td class="h5 font-weight-bold py-4">
                  <span>
                    {{ $webpage->name }}
                  </span>
                </td>
                <td>

                  @if ($webpage->creator)
                    {{ $webpage->creator->name }}
                  @else
                    <span class="text-secondary">
                      <i class="fas fa-exclamation-circle mr-1"></i>
                      Not set
                    </span>
                  @endif
                </td>

                <td>
                  Published
                  <br/>
                  {{ $webpage->created_at->toDateString() }}
                </td>
                <td>
                  @if ($webpage->visibility == 'private')
                    <i class="fas fa-user text-secondary mr-2"></i>
                    Private
                  @elseif ($webpage->visibility == 'public')
                    <span class="text-success">
                    <i class="fas fa-check-circle mr-2"></i>
                      Public
                    </span>
                  @elseif ($webpage->visibility == null)
                    <i class="fas fa-exclamation-circle text-secondary"></i>
                  @else
                    Whoops!
                  @endif
                </td>
                <td class="text-right">
                  @if (true)
                    <button class="btn btn-primary px-2 py-1" wire:click="$dispatch('displayWebpage', { webpage: {{ $webpage }} })">
                      <i class="fas fa-pencil-alt"></i>
                    </button>
                    <button class="btn btn-success px-2 py-1" wire:click="$dispatch('displayWebpage', { webpage: {{ $webpage }} })">
                      <i class="fas fa-eye"></i>
                    </button>
                    <button class="btn btn-danger px-2 py-1" wire:click="deleteWebpage({{ $webpage }})">
                      <i class="fas fa-trash"></i>
                    </button>
                  @endif
                  @if ($modes['delete'])
                    @if ($deletingWebpage->webpage_id == $webpage->webpage_id)
                      @if ($modes['cannotDelete'])
                        <span class="text-danger mr-3">
                          Cannot be deleted
                        </span>
                        <span class="btn btn-light mr-3" wire:click="deleteWebpageCancel">
                          Cancel
                        </span>
                      @else
                        <span class="btn btn-danger mr-3" wire:click="confirmDeleteWebpage">
                          Confirm delete
                        </span>
                        <span class="btn btn-light mr-3" wire:click="deleteWebpageCancel">
                          Cancel
                        </span>
                      @endif
                    @endif
                  @endif
                </td>
              </tr>
            @endforeach
          @else
            <tr>
              <td colspan="5">
                <p class="font-weight-bold text-muted-rm h4 py-4 text-center" style="color: #fe8d01;">
                  <i class="fas fa-exclamation-circle mr-2"></i>
                  No webpages
                <p>
              </td>
            </tr>
          @endif
        </tbody>
      </table>
    </div>
  </div>

  {{-- Show in smaller screens --}}
  <div class="d-md-none">

    @if (!is_null($webpages) && count($webpages) > 0)
      @foreach ($webpages as $webpage)
        <div class="bg-white border px-3">
          <div class="h4-rm py-4">
            <span  wire:click="$dispatch('displayWebpage', { webpage: {{ $webpage }} })" class="h5 text-dark font-weight-bold" role="button">
              {{ \Illuminate\Support\Str::limit($webpage->name, 60, $end=' ...') }}
            </span>

            <br/ >
            <br/ >
            Author:
            @if ($webpage->creator)
              {{ $webpage->creator->name }}
            @else
              <span class="">
                <i class="fas fa-exclamation-circle text-secondary mr-1"></i>
                Not set
              </span>
            @endif

            <br />

            <br/>
            Published:
            {{ $webpage->created_at->toDateString() }}

            <br/>
            Visibility:
            @if ($webpage->visibility == 'private')
              <i class="fas fa-user text-secondary mr-2"></i>
              Private
            @elseif ($webpage->visibility == 'public')
              <span class="text-success">
              <i class="fas fa-check-circle mr-1"></i>
                Public
              </span>
            @elseif ($webpage->visibility == null)
              <i class="fas fa-exclamation-circle text-secondary"></i>
            @else
              Whoops!
            @endif
          </div>
          <div>
            <span class="btn btn-light mr-3 mb-3" wire:click="deleteWebpage({{ $webpage }})">
              <i class="fas fa-trash mr-1"></i>
              Delete webpage
            </span>
            @if ($modes['delete'])
              @if ($deletingWebpage->webpage_id == $webpage->webpage_id)
                <span class="btn btn-danger mr-3 mb-3" wire:click="confirmDeleteWebpage">
                  Confirm delete
                </span>
                <span class="btn btn-light mr-3 mb-3" wire:click="deleteWebpageCancel">
                  Cancel
                </span>
              @endif
            @endif
            @if (true)
              <button class="btn btn-primary px-2 py-1" wire:click="">
                <i class="fas fa-pencil-alt"></i>
              </button>
              <button class="btn btn-danger px-2 py-1" wire:click="">
                <i class="fas fa-trash"></i>
              </button>
              <button class="btn btn-success px-2 py-1" wire:click="">
                <i class="fas fa-eye"></i>
              </button>
            @endif
          </div>
        </div>
      @endforeach
    @else
      <p class="font-weight-bold text-muted-rm h4 py-4 text-center bg-white border" style="color: #fe8d01;">
        <i class="fas fa-exclamation-circle mr-2"></i>
        No webpages
      <p>
    @endif
  </div>

  {{-- Pagination links --}}
  <div class="bg-white border p-2">
    {{ $webpages->links() }}
  </div>


</div>
