<div>
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
          @if (!is_null($cmsNavMenus) && count($cmsNavMenus) > 0)
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
          @else
            <tr>
              <td colspan="2">
                <p class="font-weight-bold text-muted-rm h4 py-4 text-center" style="color: #fe8d01;">
                  <i class="fas fa-exclamation-circle mr-2"></i>
                  No nav menu
                <p>
              </td>
            </tr>
          @endif
        </tbody>
      </table>
    </div>
</div>
