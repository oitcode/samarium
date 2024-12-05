<div class="p-2 bg-white border">

    <div class="p-2 d-flex justify-content-between">
      <h2 class="h4">
        @if (true)
          Default nav menu
        @else
          {{ $cmsNavMenu->name }}
        @endif
      </h2>
      <div wire:loading>
        <div class="spinner-border" role="status">
          <span class="sr-only">Loading...</span>
        </div>
      </div>
    </div>

    <div class="my-3">
      <button class="btn btn-light border badge-pill" wire:click="enterMode('createNavMenuItem')">
        <i class="fas fa-plus-circle mr-2"></i>
        Add item
      </button>
    </div>


    @if ($modes['createNavMenuItem'])
      @livewire ('cms.dashboard.nav-menu-display-nav-menu-item-create', ['cmsNavMenu' => $cmsNavMenu,])
    @elseif ($modes['createNavMenuDropdownItem'])
      @livewire ('cms.dashboard.nav-menu-display-nav-menu-dropdown-item-create', ['cmsNavMenuItem' => $editingDropdown,])
    @else
      @if (count($cmsNavMenu->cmsNavMenuItems) > 0)
        <div class="table-responsive">
          <table class="table">

            <thead>
              <th>
              </th>
              <th>Name</th>
              <th>Webpage</th>
              <th>Action</th>
            </thead>

            <tbody>
              @foreach ($cmsNavMenu->cmsNavMenuItems()->orderBy('order', 'asc')->get() as $cmsNavMenuItem)
                <tr>
                  <td>
                    <button class="btn text-secondary" wire:click="moveUp({{ $cmsNavMenuItem }})">
                      <i class="fas fa-arrow-up"></i>
                    </button>
                    <button class="btn text-secondary" wire:click="moveDown({{ $cmsNavMenuItem }})">
                      <i class="fas fa-arrow-down"></i>
                    </button>
                  </td>
                  <td>
                    <div>
                      {{ $cmsNavMenuItem->name }}
                    </div>
                    @if ($cmsNavMenuItem->cmsNavMenuDropdownItems)
                      <div class="my-4">
                        @foreach ($cmsNavMenuItem->cmsNavMenuDropdownItems as $cmsNavMenuDropdownItem)
                          {{ $cmsNavMenuDropdownItem->name }}
                          <br />
                        @endforeach
                      </div>
                    @endif
                  </td>
                  <td>
                    @if ($cmsNavMenuItem->webpage)
                      {{ $cmsNavMenuItem->webpage->name }}
                    @else
                      NA
                    @endif
                  </td>
                  <td>
                    <button class="btn text-secondary"
                        wire:click="deleteCmsNavMenuItem({{ $cmsNavMenuItem }})">
                      <i class="fas fa-trash"></i>
                    </button>
                    @if ($cmsNavMenuItem->type == 'dropdown')
                      <button class="btn text-secondary" wire:click="editDropdown({{ $cmsNavMenuItem }})">
                        <i class="fas fa-plus-circle"></i>
                      </button>
                    @endif
                  </td>
                </tr>
              @endforeach
            </tbody>

          </table>
        </div>
      @else
        <div class="text-secondary">
          No nav menu items
        </div>
      @endif
    @endif
</div>
