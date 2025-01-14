<div>

  
  <x-base-component moduleName="Contact Message">

    {{--
    |
    | Toolbar.
    |
    --}}

    <x-slot name="toolbar">
      @include ('partials.dashboard.spinner-button')

      @if ($modes['listContactMessageMode'] || ! array_search(true, $modes))
        @include ('partials.dashboard.tool-bar-button-pill', [
            'btnClickMethod' => "enterMode('listContactMessageMode')",
            'btnIconFaClass' => 'fas fa-list',
            'btnText' => 'List',
            'btnCheckMode' => 'listContactMessageMode',
        ])
      @endif

      @if ($modes['displayContactMessageMode'])
        @include ('partials.dashboard.tool-bar-button-pill', [
            'btnClickMethod' => "clearModes",
            'btnIconFaClass' => 'fas fa-times',
            'btnText' => '',
            'btnCheckMode' => '',
            'btnBsColor' => 'bg-danger text-white',
        ])
      @endif
    </x-slot>

    <div>

      {{--
         |
         | Use the required component as per mode
         |
      --}}

      @if ($modes['listContactMessageMode'])
        @livewire ('contact-form.dashboard.contact-message-list')
      @elseif ($modes['displayContactMessageMode'])
        @livewire ('contact-form.dashboard.contact-message-display', ['contactMessage' => $displayingContactMessage,])
      @endif

    </div>
  </x-base-component>


</div>
