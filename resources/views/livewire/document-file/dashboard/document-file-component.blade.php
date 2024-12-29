<div>


  {{-- Top toolbar --}}
  <x-toolbar-classic toolbarTitle="File">

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

  </x-toolbar-classic>


  <!-- Flash message div -->
  @if (session()->has('message'))
    <div class="p-2">
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="fas fa-check-circle mr-3"></i>
        {{ session('message') }}
        <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close">
          <span class="text-danger" aria-hidden="true">&times;</span>
        </button>
      </div>
    </div>
  @endif


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
