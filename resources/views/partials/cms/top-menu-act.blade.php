<div class="bg-white py-2-rm text-right mb-3-rm border-bottom-rm">

  {{-- Top menu buttons. --}}

  @foreach ($cmsNavMenu->cmsNavMenuItems()->orderBy('order', 'asc')->get() as $cmsNavMenuItem)
    @if ($cmsNavMenuItem->type == 'item')
      @include ('partials.dashboard.app-top-menu-button', [
        'btnRoute' => 'website-webpage-' . $cmsNavMenuItem->webpage->permalink,
        'iconFaClass' => 'fas fa-building',
        'btnText' => $cmsNavMenuItem->name,
      ])
    @else
      @include ('partials.dashboard.app-top-menu-dropdown', [
        'iconFaClass' => 'fas fa-building',
        'btnText' => $cmsNavMenuItem->name,
      ])
    @endif
  @endforeach


  <div class="clearfix">
  </div>

  {{--
      TODO:

      This uses partials.dashboard.app-top-menu-button which is a dashboard
      parital. It should not be using dashboard partial as this menu is showing
      in the cms front end. 

      There should be a cms website partial for this.

  --}}

</div>
