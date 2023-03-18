<div class="bg-danger text-white py-2-rm text-right mb-3-rm border-bottom-rm w-100">

  {{-- Top menu buttons. --}}

  @foreach ($cmsNavMenu->cmsNavMenuItems()->orderBy('order', 'asc')->get() as $cmsNavMenuItem)
    @if ($cmsNavMenuItem->type == 'item')
      @include ('partials.cms.top-menu-button', [
        'btnRoute' => 'website-webpage-' . $cmsNavMenuItem->webpage->permalink,
        'iconFaClass' => 'fas fa-building',
        'btnText' => $cmsNavMenuItem->name,
      ])
    @else
      @include ('partials.cms.top-menu-dropdown', [
        'iconFaClass' => 'fas fa-building',
        'btnText' => $cmsNavMenuItem->name,
      ])
    @endif
  @endforeach


  <div class="clearfix">
  </div>

</div>
