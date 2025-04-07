<div>
  
  <x-base-component moduleName="Testimonial">

    {{--
    |
    | Toolbar.
    |
    --}}

    <x-slot name="toolbar">
      @include ('partials.dashboard.spinner-button')

      @if (! array_search(true, $modes) || $modes['listTestimonialMode'])
        <x-toolbar-dropdown-component toolbarButtonDropdownId="testimonialToolbarDropdown">
          <x-toolbar-dropdown-item-component clickMethod="enterMode('search')">
            Search
          </x-toolbar-dropdown-item-component>
        </x-toolbar-dropdown-button>
      @endif
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
