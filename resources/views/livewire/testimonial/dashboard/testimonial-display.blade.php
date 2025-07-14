<div>

  {{-- Basic info --}}
  <div class="py-5 mb-2 text-center o-linear-gradient o-border-radius">
    <div class="h2 o-heading o-linear-gradient-text-color">
      {{ $testimonial->writer_name }}
    </div>
    <div class="h5">
      {{ $testimonial->created_at }}
    </div>
  </div>

  {{--
  |
  | Toolbar.
  |
  --}}

  <x-toolbar-component>
    <x-slot name="toolbarInfo">
      Testimonial
      <i class="fas fa-angle-right mx-2"></i>
      {{ $testimonial->testimonial_id }}
    </x-slot>
    <x-slot name="toolbarButtons">
      <x-toolbar-button-component btnBsClass="btn-light" btnClickMethod="$refresh">
        <i class="fas fa-refresh"></i>
      </x-toolbar-button-component>
      <x-toolbar-button-component btnBsClass="btn-light" btnClickMethod="$dispatch('exitTestimonialDisplay')">
        <i class="fas fa-times-circle text-danger mr-1"></i>
        Close
      </x-toolbar-button-component>
    </x-slot>
  </x-toolbar-component>

  <div class="table-responsive bg-white border mb-2">
    <table class="table border-bottom border mb-0">
      <tbody>
        <tr>
          <th class="o-heading">
            <i class="fas fa-user-circle mr-1"></i>
            Testimonial
          </th>
          <td>
            {{ $testimonial->body }}
          </td>
        </tr>
        <tr>
          <th class="o-heading">
            <i class="fas fa-user-circle mr-1"></i>
            Testimonial ID
          </th>
          <td>
            {{ $testimonial->testimonial_id }}
          </td>
        </tr>
        <tr>
          <th class="o-heading">
            <i class="fas fa-user-circle mr-1"></i>
            Writer name
          </th>
          <td>
            {{ $testimonial->writer_name }}
          </td>
        </tr>
        <tr>
          <th class="o-heading">
            <i class="fas fa-phone mr-1"></i>
            Writer info
          </th>
          <td>
            {{ $testimonial->writer_info }}
          </td>
        </tr>
        <tr>
          <th class="o-heading">
            <i class="fas fa-envelope mr-1"></i>
            Status
          </th>
          <td>
            Active
          </td>
        </tr>
      </tbody>
    </table>
  </div>

  @if (false)
  {{-- Delete testimonial --}}
  <div class="bg-white border p-3 mb-2">
    <div class="col-md-6 p-3 border rounded">
      <div class="o-heading">
        Delete this testimonial
      </div>
      <div>
        Once you delete, it cannot be undone. Please be sure.
      </div>
    </div>
  </div>
  @endif

</div>
