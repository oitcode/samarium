<div>
  
  <x-base-component moduleName="Testimonial">

    {{--
    |
    | Toolbar.
    |
    --}}

    <x-slot name="toolbar">
      @include ('partials.dashboard.spinner-button')
    </x-slot>

    <div>

      {{--
         |
         | Use the required component as per mode
         |
      --}}

      @if ($modes['listTestimonialMode'])
        @livewire ('testimonial.dashboard.testimonial-list')
      @elseif ($modes['displayTestimonialMode'])
        @livewire ('testimonial.dashboard.testimonial-display', ['testimonial' => $displayingTestimonial,])
      @else
        @livewire ('testimonial.dashboard.testimonial-list')
      @endif

    </div>
  </x-base-component>

</div>
