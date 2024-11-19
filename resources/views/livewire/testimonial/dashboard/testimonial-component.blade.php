<div>


  {{--
     |
     | Top toolbar
     |
  --}}

  <x-toolbar-classic toolbarTitle="Testimonial">

    @include ('partials.dashboard.tool-bar-button-pill', [
        'btnClickMethod' => "enterMode('listTestimonialMode')",
        'btnIconFaClass' => 'fas fa-list',
        'btnText' => 'List',
        'btnCheckMode' => 'listTestimonialMode',
    ])

    @if ($modes['displayTestimonialMode'])
      @include ('partials.dashboard.tool-bar-button-pill', [
          'btnClickMethod' => "",
          'btnIconFaClass' => 'fas fa-circle',
          'btnText' => 'Testimonial display',
          'btnCheckMode' => 'displayTestimonialMode',
      ])
    @endif

    @include ('partials.dashboard.tool-bar-button-pill', [
        'btnClickMethod' => "clearModes",
        'btnIconFaClass' => 'fas fa-times',
        'btnText' => '',
        'btnCheckMode' => '',
    ])

    @include ('partials.dashboard.spinner-button')

  </x-toolbar-classic>


  {{--
     |
     | Flash message div
     |
  --}}

  @if (session()->has('message'))
    @include ('partials.flash-message', [
        'flashMessage' => session('message'),
    ])
  @endif


  {{--
     |
     | Use the required component as per mode
     |
  --}}

  @if ($modes['listTestimonialMode'])
    @livewire ('testimonial.dashboard.testimonial-list')
  @elseif ($modes['displayTestimonialMode'])
    @livewire ('testimonial.dashboard.testimonial-display', ['testimonial' => $displayingTestimonial,])
  @endif


</div>
