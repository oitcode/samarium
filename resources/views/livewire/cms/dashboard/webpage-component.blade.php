<div>

  <x-toolbar-classic toolbarTitle="Pages">

    @include ('partials.dashboard.spinner-button')

    @if (! $modes['display'])
      @include ('partials.dashboard.tool-bar-button-pill', [
          'btnClickMethod' => "enterMode('create')",
          'btnIconFaClass' => 'fas fa-plus-circle',
          'btnText' => 'Create',
          'btnCheckMode' => 'create',
      ])
    @endif

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

  @if ($modes['create'])
    @livewire ('cms.dashboard.webpage-create')
  @elseif ($modes['display'])
    @livewire ('cms.dashboard.webpage-display', ['webpage' => $displayingWebpage,])
  @elseif ($modes['list'])
    @livewire ('cms.dashboard.webpage-list')
  @else
    @livewire ('cms.dashboard.webpage-list')
  @endif
</div>
