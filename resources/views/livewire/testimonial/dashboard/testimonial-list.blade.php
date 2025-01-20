<div>


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


  <button wire:loading class="btn">
    <div class="spinner-border text-info mr-3" role="status">
      <span class="sr-only">Loading...</span>
    </div>
  </button>


  {{--
     |
     | Filter div
     |
  --}}

  <div class="mb-1 p-3 bg-white border d-flex justify-content-between">
    <div class="pt-2 font-weight-bold">
      Total : {{ $testimonialsCount }}
    </div>
  </div>


  {{--
     |
     | Testimonial list table
     |
  --}}

  @if ($testimonials != null && count($testimonials) > 0)
    @if (true)
    <div class="table-responsive">
      <table class="table table-hover shadow-sm border mb-0">
        <thead>
          <tr class="p-4 bg-white text-dark">
            <th class="o-heading">
              Writer name
            </th>
            <th class="o-heading">
              Writer info
            </th>
            <th class="o-heading">
              Body
            </th>
            <th class="o-heading text-right">
              Action
            </th>
          </tr>
        </thead>

        <tbody class="bg-white">
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
        </tbody>
      </table>

    </div>
    @endif
    {{-- Pagination links --}}
    <div class="bg-white border p-2">
      {{ $testimonials->links() }}
    </div>

  @else
    <div class="p-2 text-secondary">
      <i class="fas fa-exclamation-circle mr-2"></i>
      No testimonials
    </div>
  @endif


</div>
