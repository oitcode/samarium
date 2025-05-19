<div>

  <x-list-component>
    <x-slot name="listInfo">
      Total : {{ $totalTestimonialCount }}
    </x-slot>

    <x-slot name="listHeadingRow">
      <th>
        ID
      </th>
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
          <td>
            {{ $testimonial->testimonial_id }}
          </td>
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
            @if ($modes['confirmDelete'])
              @if ($deletingTestimonial->testimonial_id == $testimonial->testimonial_id)
                <button class="btn btn-danger mr-1" wire:click="deleteTestimonial">
                  Confirm delete
                </button>
                <button class="btn btn-light mr-1" wire:click="cancelDeleteTestimonial">
                  Cancel
                </button>
              @endif
            @endif
            @if ($modes['cannotDelete'])
              @if ($deletingTestimonial->testimonial_id == $testimonial->testimonial_id)
                <span class="text-danger mr-3">
                  <i class="fas fa-exclamation-circle mr-1"></i>
                  Testimonial cannot be deleted
                </span>
                <button class="btn btn-light mr-1" wire:click="cancelCannotDeleteTestimonial">
                  Cancel
                </button>
              @endif
            @endif
            <x-list-edit-button-component clickMethod="$dispatch('displayTestimonial', { testimonialId: {{ $testimonial->testimonial_id }} })">
            </x-list-edit-button-component>
            <x-list-view-button-component clickMethod="$dispatch('displayTestimonial', { testimonialId: {{ $testimonial->testimonial_id }} })">
            </x-list-view-button-component>
            <x-list-delete-button-component clickMethod="confirmDeleteTestimonial({{ $testimonial->testimonial_id }})">
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
