<div class="p-3 p-md-0">

  {{-- Show in bigger screens --}}
  <div class="mb-3 d-none d-md-block">
    @include ('partials.dashboard.tool-bar-button-pill', [
        'btnClickMethod' => "enterMode('create')",
        'btnIconFaClass' => 'fas fa-plus-circle',
        'btnText' => 'New',
        'btnCheckMode' => 'create',
    ])

    @include ('partials.dashboard.tool-bar-button-pill', [
        'btnClickMethod' => "enterMode('list')",
        'btnIconFaClass' => 'fas fa-list',
        'btnText' => 'List',
        'btnCheckMode' => 'list',
    ])

    @include ('partials.dashboard.spinner-button')

    <div class="clearfix">
    </div>
  </div>

  {{-- Use the required component as per mode --}}
  {{-- Todo --}}
  <h1 class="h5">
    Coming soon~
  </h1>

</div>
