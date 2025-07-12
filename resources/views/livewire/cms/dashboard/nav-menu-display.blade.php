<div>

  <x-toolbar-classic toolbarTitle="Navigation menu" titleNone="yes">
    @include ('partials.dashboard.spinner-button')
    @if (!array_search(true, $modes))
      @include ('partials.dashboard.tool-bar-button-pill', [
          'btnClickMethod' => "enterMode('createNavMenuItem')",
          'btnIconFaClass' => 'fas fa-plus-circle',
          'btnText' => 'Add item',
          'btnCheckMode' => '',
      ])
    @else
    @endif
  </x-toolbar-classic>

  @if ($modes['createNavMenuItem'])
    @livewire ('cms.dashboard.nav-menu-display-nav-menu-item-create', ['cmsNavMenu' => $cmsNavMenu,])
  @elseif ($modes['createNavMenuDropdownItem'])
    @livewire ('cms.dashboard.nav-menu-display-nav-menu-dropdown-item-create', ['cmsNavMenuItem' => $editingDropdown,])
  @else
    @if (count($cmsNavMenu->cmsNavMenuItems) > 0)
      <div class="table-responsive bg-white border">
        <table class="table">
          <thead>
            <th class="o-heading text-muted">Name</th>
            <th class="o-heading text-muted">Webpage</th>
            <th class="o-heading text-muted text-right">Action</th>
          </thead>
          <tbody>
            @foreach ($cmsNavMenu->cmsNavMenuItems()->orderBy('order', 'asc')->get() as $cmsNavMenuItem)
              <tr>
                <td>
                  <div class="o-heading">
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
                    DROPDOWN
                  @endif
                </td>
                <td class="text-right">
                  @if ($cmsNavMenuItem->type == 'dropdown')
                    <button class="btn text-secondary" wire:click="editDropdown({{ $cmsNavMenuItem }})">
                      <i class="fas fa-plus-circle"></i>
                    </button>
                  @endif
                  <button class="btn btn-light" wire:click="moveUp({{ $cmsNavMenuItem }})">
                    <i class="fas fa-arrow-up"></i>
                  </button>
                  <button class="btn btn-light" wire:click="moveDown({{ $cmsNavMenuItem }})">
                    <i class="fas fa-arrow-down"></i>
                  </button>
                  <button class="btn btn-light"
                      wire:click="deleteCmsNavMenuItem({{ $cmsNavMenuItem }})">
                    <i class="fas fa-trash"></i>
                  </button>
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
