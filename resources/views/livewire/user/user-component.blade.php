<div class="mb-4">
  <div class="card-body" style="{{--font-size: 1.3rem;--}}">

    @if (false)
    <h1 class="h4 mb-4">
      <i class="fas fa-users mr-1"></i>
      Users
    </h1>
    @endif

    {{-- Toolbar --}}
    @if (false)
    <div class="mb-4">
        <button type="submit" class="btn btn-success badge-pill p-2 px-3" wire:click="enterMode('createUserMode')" style="">
          <i class="fas fa-plus-circle mr-1"></i>
          Create
        </button>

        <button type="submit" class="btn btn-success badge-pill p-2 px-3" wire:click="enterMode('listUserMode')" style="">
          <i class="fas fa-users mr-1"></i>
          List
        </button>

        <button wire:loading class="btn">
          <span class="spinner-border text-info mr-3" role="status">
          </span>
        </button>
    </div>
    @endif

    <div class="mb-3 p-2 d-none d-md-block bg-dark-rm">

      @include ('partials.dashboard.tool-bar-button-pill', [
          'btnClickMethod' => "enterMode('createUserMode')",
          'btnIconFaClass' => 'fas fa-plus-circle',
          'btnText' => 'Create',
          'btnCheckMode' => 'createPostMode',
      ])

      @include ('partials.dashboard.tool-bar-button-pill', [
          'btnClickMethod' => "enterMode('listUserMode')",
          'btnIconFaClass' => 'fas fa-list',
          'btnText' => 'List',
          'btnCheckMode' => 'listPostMode',
      ])

      @if (false)
      @if ($modes['displayUserMode'])
        @include ('partials.dashboard.tool-bar-button-pill', [
            'btnClickMethod' => "",
            'btnIconFaClass' => 'fas fa-circle',
            'btnText' => 'User display',
            'btnCheckMode' => 'displayUserMode',
        ])
      @endif
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

    @if (session()->has('message'))
      {{-- Flash message div --}}
      <div class="p-2">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <i class="fas fa-check-circle mr-3"></i>
          {{ session('message') }}
          <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close">
            <span class="text-success" aria-hidden="true">&times;</span>
          </button>
        </div>
      </div>
    @endif

    @if ($modes['createUserMode'])
      @livewire ('user.user-create')
    @elseif ($modes['listUserMode'])
      @livewire ('user.user-list')
    @endif

</div>
