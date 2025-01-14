<div>

  
  <x-base-component moduleName="Link">

    {{--
    |
    | Toolbar.
    |
    --}}

    <x-slot name="toolbar">
      @include ('partials.dashboard.spinner-button')

      @include ('partials.dashboard.tool-bar-button-pill', [
          'btnClickMethod' => "enterMode('create')",
          'btnIconFaClass' => 'fas fa-plus-circle',
          'btnText' => 'Create',
          'btnCheckMode' => 'create',
      ])

      @include ('partials.dashboard.tool-bar-button-pill', [
          'btnClickMethod' => "enterMode('list')",
          'btnIconFaClass' => 'fas fa-list',
          'btnText' => 'List',
          'btnCheckMode' => 'list',
      ])

      @if ($modes['display'])
        @include ('partials.dashboard.tool-bar-button-pill', [
            'btnClickMethod' => "",
            'btnIconFaClass' => 'fas fa-circle',
            'btnText' => 'Url link display',
            'btnCheckMode' => 'display',
        ])
      @endif

      @include ('partials.dashboard.tool-bar-button-pill', [
          'btnClickMethod' => "clearModes",
          'btnIconFaClass' => 'fas fa-times',
          'btnText' => '',
          'btnCheckMode' => '',
      ])
    </x-slot>

    <div>

      {{--
         |
         | Use the required component as per mode
         |
      --}}

      @if ($modes['create'])
        @livewire ('url-link.dashboard.url-link-create')
      @elseif ($modes['list'])
        @livewire ('url-link.dashboard.url-link-list')
      @elseif ($modes['display'])
        @livewire ('url-link.dashboard.url-link-display', ['urlLink' => $displayingUrlLink,])
      @else
        @livewire ('url-link.dashboard.url-link-list')
      @endif

    </div>
  </x-base-component>


</div>
