<div>

  {{--
  |
  | Toolbar.
  |
  --}}

  <x-toolbar-classic toolbarTitle="{{ $moduleName }}">
    {{ $toolbar }}
  </x-toolbar-classic>


  {{--
  |
  | Flash message div.
  |
  --}}

  @if (session()->has('message'))
    @include ('partials.flash-message', ['message' => session('message'),])
  @endif


  {{--
  |
  | Component main content slot.
  |
  --}}

  {{ $slot }}

</div>
