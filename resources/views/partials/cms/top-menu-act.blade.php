<div class="py-2-rm text-right mb-3-rm border-bottom-rm w-100">

  {{-- Top menu buttons. --}}

  @if ($cmsNavMenu)

    {{-- Home page --}}
    @include ('partials.cms.top-menu-button', [
      'btnRoute' => 'website-home',
      'iconFaClass' => 'fas fa-building',
      'btnText' => 'Home',
    ])

    @foreach ($cmsNavMenu->cmsNavMenuItems()->orderBy('order', 'asc')->get() as $cmsNavMenuItem)
      @if ($cmsNavMenuItem->type == 'item')

        {{-- Do not show if linked webpage's visibility is not public --}}
        @if ($cmsNavMenuItem->webpage->visibility != 'public')
          @continue
        @endif

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
  @endif


  <div class="clearfix">
  </div>

</div>
