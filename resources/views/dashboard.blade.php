{{--
 **
 * Samarium  -  A Laravel Livewire Application For Users
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
  <div class="p-0">
    {{--
    |
    | Upper part
    |
    --}}
    <div class="row mb-4 pt-3">
      {{-- Shop glance --}}
      @if (has_module('shop'))
        <div class="col-12 col-md-3">
          <div class="mb-2">
            @livewire ('shop.dashboard.shop-glance')
          </div>
        </div>
      @endif

      {{-- Online order glance --}}
      @if (has_module('shop'))
        <div class="col-12 col-md-3">
          <div class="mb-2">
            @livewire ('online-order.dashboard.online-order-glance')
          </div>
        </div>
      @endif

      {{-- Notice glance --}}
      @if (has_module('crm'))
        <div class="col-12 col-md-3">
          <div class="mb-2">
            @livewire ('cms.dashboard.notice-glance-component')
          </div>
        </div>
      @endif

      {{-- Contact form glance --}}
			@if (has_module('crm'))
        <div class="col-12 col-md-3">
          <div class="mb-2">
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
    <div>
			@if (has_module('project'))
        @livewire ('todo.dashboard.todo-glance')
      @endif
    </div>

    {{--
    |
    | Show create company message if company does not exist.
    |
    | TODO: Make it more user friendly and intuitive to create
    |       a company if company does not exist.
    |
    --}}
    @if (! $company)
      <div class="my-4 p-3 border bg-white">
        <i class="fas fa-exclamation-circle text-danger mr-1"></i>
        It seems you have not created company yet. Please create company.
        <br />
        <i class="fas fa-exclamation-circle text-danger mr-1"></i>
        Please got to More > Company from the left menu to create company.
      </div>
    @endif
  </div>

@endsection
