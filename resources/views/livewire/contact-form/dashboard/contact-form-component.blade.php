<div>
  
  <x-base-component moduleName="Contact Message">

    {{--
    |
    | Toolbar.
    |
    --}}

    <x-slot name="toolbar">
      @include ('partials.dashboard.spinner-button')

      <x-toolbar-dropdown-component toolbarButtonDropdownId="contactFormToolbarDropdown">
        <x-toolbar-dropdown-item-component clickMethod="enterMode('search')">
          Search
        </x-toolbar-dropdown-item-component>
      </x-toolbar-dropdown-button>
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
      @else
        @livewire ('contact-form.dashboard.contact-message-list')
      @endif

    </div>
  </x-base-component>

</div>
