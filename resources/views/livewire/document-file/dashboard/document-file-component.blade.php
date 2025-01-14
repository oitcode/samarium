<div>

  
  <x-base-component moduleName="File">

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
