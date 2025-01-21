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
        <tr>
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
            <button class="btn btn-primary px-2 py-1" wire:click="$dispatch('displayTestimonial', { testimonial: {{ $testimonial }} })">
              <i class="fas fa-pencil-alt"></i>
            </button>
            <button class="btn btn-success px-2 py-1" wire:click="$dispatch('displayTestimonial', { testimonial: {{ $testimonial }} })">
              <i class="fas fa-eye"></i>
            </button>
            <button class="btn btn-danger px-2 py-1" wire:click="">
              <i class="fas fa-trash"></i>
            </button>
          </td>
        </tr>
      @endforeach
    </x-slot>

    <x-slot name="listPaginationLinks">
      {{ $testimonials->links() }}
    </x-slot>

  </x-list-component>


</div>
