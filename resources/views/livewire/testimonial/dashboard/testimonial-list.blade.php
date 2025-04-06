<div>

  <x-list-component>
    <x-slot name="listInfo">
      Total : {{ $testimonialsCount }}
    </x-slot>

    <x-slot name="listHeadingRow">
      <th>
        Writer name
      </th>
      <th>
        Writer info
      </th>
      <th>
        Body
      </th>
      <th class="text-right">
        Action
      </th>
    </x-slot>

    <x-slot name="listBody">
      @foreach ($testimonials as $testimonial)
        <x-table-row-component>
          <td class="h6 font-weight-bold" wire:click="$dispatch('displayTestimonial', { testimonial: {{ $testimonial }} })" role="button">
            {{ $testimonial->writer_name }}
          </td>
          <td wire:click="$dispatch('displayTestimonial', {testimonial: {{ $testimonial }} })" role="button">
            {{ $testimonial->writer_info }}
          </td>
          <td wire:click="$dispatch('displayTestimonial', {testimonial: {{ $testimonial }} })" role="button">
            {{ \Illuminate\Support\Str::limit($testimonial->body, 100, $end=' ...') }}
          </td>
          <td class="text-right">
            <x-list-edit-button-component clickMethod="$dispatch('displayTestimonial', { testimonialId: {{ $testimonial->testimonial_id }} })">
            </x-list-edit-button-component>
            <x-list-view-button-component clickMethod="$dispatch('displayTestimonial', { testimonialId: {{ $testimonial->testimonial_id }} })">
            </x-list-view-button-component>
            <x-list-delete-button-component clickMethod="">
            </x-list-delete-button-component>
          </td>
        </x-table-row-component>
      @endforeach
    </x-slot>

    <x-slot name="listPaginationLinks">
      {{ $testimonials->links() }}
    </x-slot>
  </x-list-component>

</div>
