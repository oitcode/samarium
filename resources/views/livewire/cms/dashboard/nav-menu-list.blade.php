<div>
  @if (!is_null($cmsNavMenus) && count($cmsNavMenus) > 0)
    <div class="table-responsive">
      <table class="table table-hover table-bordered">
        <thead>
          <tr class="bg-white text-dark">
            <th>
              Name
            </th>
            <th>
              Action
            </th>
          </tr>
        </thead>

        <tbody class="bg-white">
          @foreach ($cmsNavMenus as $cmsNavMenu)
            <tr wire:click="$emit('displayCmsNavMenu', {{ $cmsNavMenu->cms_nav_menu_id }})" role="button">
              <td>
                {{ $cmsNavMenu->name }}
              </td>
              <td>
                <i class="fas fa-pencil-alt"></i>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  @else
    No nav menus
  @endif
</div>
