{{--
 **
 * Ozone - A Laravel Livewire Application For Users
 *
 * @package  Ozone
 * @author   _____
 *
--}}


{{--
|--------------------------------------------------------------------------
| Welcome to the dashboard
|--------------------------------------------------------------------------
|
| Dashboard blade file.
|
| This is the blade file of dashboard main screen. It is this screen
| that the admin users will see most of the time.
|
| If you want to modify the dashboard screen of our application,
| then this is the file that you have to edit.
|
--}}


@extends ('layouts.app')

@section ('content')

  <div class="d-none d-md-block p-0">

    {{--
    |
    | Upper part
    |
    --}}
    <div class="row mb-5 pt-3">

      {{-- Shop glance --}}
      @if (preg_match("/shop/i", env('MODULES')))
        <div class="col-md-3">
          <div class="mb-4">
            @livewire ('shop.dashboard.shop-glance')
          </div>
        </div>
      @endif

      {{-- Online order glance --}}
      @if (preg_match("/shop/i", env('MODULES')))
        <div class="col-md-3">
          <div class="mb-4">
            @livewire ('online-order.dashboard.online-order-glance')
          </div>
        </div>
      @endif

      {{-- Notice glance --}}
      @if (preg_match("/crm/i", env('MODULES')))
        <div class="col-md-3">
          <div class="mb-4">
            @livewire ('cms.dashboard.notice-glance-component')
          </div>
        </div>
      @endif

      {{-- Contact form glance --}}
      @if (preg_match("/crm/i", env('MODULES')))
        <div class="col-md-3">
          <div class="mb-4">
            @livewire ('contact-form.dashboard.contact-message-glance-component')
          </div>
        </div>
      @endif

    </div>


    {{--
    |
    | Lower part
    |
    --}}
    <div class="">
      {{-- Todo glance --}}
      @if (preg_match("/project/i", env('MODULES')))
        @livewire ('todo.dashboard.todo-glance')
      @endif
    </div>

  </div>

@endsection
