<div>


  @if ($modes['list'] || !array_search(true, $modes))
  {{-- Toolbar --}}
  <x-toolbar-classic toolbarTitle="Product question">
    @if (false)
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
          'btnText' => 'Product question display',
          'btnCheckMode' => 'display',
      ])
    @endif

    @include ('partials.dashboard.tool-bar-button-pill', [
        'btnClickMethod' => "clearModes",
        'btnIconFaClass' => 'fas fa-times',
        'btnText' => '',
        'btnCheckMode' => '',
    ])
    @endif

    @include ('partials.dashboard.spinner-button')

  </x-toolbar-classic>
  @endif


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
  | Use required component as per mode.
  |
  --}}

  @if ($modes['list'])
    @livewire ('product.dashboard.product-question-list')
  @elseif ($modes['display'])
    @livewire ('product.dashboard.product-question-display', ['productQuestion' => $displayingProductQuestion,])
  @else
    @livewire ('product.dashboard.product-question-list')
  @endif


</div>
