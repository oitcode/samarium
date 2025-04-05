<div>
  
  <x-base-component moduleName="File">

    {{--
    |
    | Toolbar
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

      <x-toolbar-dropdown-component toolbarButtonDropdownId="documentFileToolbarDropdown">
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

      @if ($modes['create'])
        @livewire ('document-file.dashboard.document-file-create')
      @elseif ($modes['list'])
        @livewire ('document-file.dashboard.document-file-list')
      @elseif ($modes['display'])
        @livewire ('document-file.dashboard.document-file-display', ['documentFile' => $displayingDocumentFile,])
      @elseif ($modes['pdfDisplay'])
        @livewire ('document-file.dashboard.document-file-display-pdf', ['documentFile' => $pdfDisplayingDocumentFile,])
      @else
        @livewire ('document-file.dashboard.document-file-list')
      @endif

    </div>
  </x-base-component>

</div>
