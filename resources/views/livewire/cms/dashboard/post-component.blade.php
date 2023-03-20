<div>
  @if (true)


  <div class="mb-3 p-2 d-none d-md-block bg-dark-rm">

    @include ('partials.dashboard.tool-bar-button-pill', [
        'btnClickMethod' => "enterMode('createPostMode')",
        'btnIconFaClass' => 'fas fa-plus-circle',
        'btnText' => 'Create',
        'btnCheckMode' => 'createPostMode',
    ])

    @include ('partials.dashboard.tool-bar-button-pill', [
        'btnClickMethod' => "enterMode('listPostMode')",
        'btnIconFaClass' => 'fas fa-list',
        'btnText' => 'List',
        'btnCheckMode' => 'listPostMode',
    ])

    @if ($modes['displayPostMode'])
      @include ('partials.dashboard.tool-bar-button-pill', [
          'btnClickMethod' => "",
          'btnIconFaClass' => 'fas fa-circle',
          'btnText' => 'Post display',
          'btnCheckMode' => 'displayPostMode',
      ])
    @endif

    @include ('partials.dashboard.tool-bar-button-pill', [
        'btnClickMethod' => "clearModes",
        'btnIconFaClass' => 'fas fa-eraser',
        'btnText' => 'Clear modes',
        'btnCheckMode' => '',
    ])

    @include ('partials.dashboard.spinner-button')

    <div class="clearfix">
    </div>
  </div>

  @endif

  @if ($modes['createPostMode'])
    @livewire ('cms.dashboard.webpage-create', ['is_post' => 'yes',])
  @elseif ($modes['listPostMode'])
    @livewire ('cms.dashboard.post-list')
  @elseif ($modes['displayPostMode'])
    @livewire ('cms.dashboard.webpage-display', ['webpage' => $displayingPost,])
  @endif
</div>
