<div>


  <!-- Flash message div -->
  @if (session()->has('message'))
    @include ('partials.flash-message', [
        'flashMessage' => session('message'),
    ])
  @endif


  <button wire:loading class="btn" style="font-size: 1.5rem;">
    <div class="spinner-border text-info mr-3" role="status">
      <span class="sr-only">Loading...</span>
    </div>
  </button>


  <div class="d-flex mb-3 pl-3" style="font-size: 1rem;">
    <div class="mr-4">
      Total : {{ $testimonialsCount }}
    </div>
  </div>


  @if ($testimonials != null && count($testimonials) > 0)
    @if (true)
    {{-- Show in bigger and smaller screens --}}
    <div class="table-responsive">
      <table class="table table-hover shadow-sm border">
        <thead>
          <tr class="{{ env('OC_ASCENT_BG_COLOR', 'bg-success') }}
              {{ env('OC_ASCENT_TEXT_COLOR', 'text-white') }}
              p-4" style="font-size: 1rem;">
            <th>
              Writer name
            </th>
            <th>
              Writer info
            </th>
            <th>
              Body
            </th>
            <th>
              Action
            </th>
          </tr>
        </thead>

        <tbody class="bg-white">
          @foreach ($testimonials as $testimonial)
            <tr>
              <td class="h6 font-weight-bold" wire:click="$emit('displayTestimonial', {{ $testimonial }})" role="button">
                {{ $testimonial->writer_name }}
              </td>
              <td wire:click="$emit('displayTestimonial', {{ $testimonial }})" role="button">
                {{ $testimonial->writer_info }}
              </td>
              <td wire:click="$emit('displayTestimonial', {{ $testimonial }})" role="button">
                {{ \Illuminate\Support\Str::limit($testimonial->body, 100, $end=' ...') }}
              </td>
              <td>
                <i class="fas fa-ellipsis-h text-secondary"></i>
                @if (false)
                <button class="btn mr-3" wire:click="">
                  <i class="fas fa-trash-alt"></i>
                </button>
                @endif
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>

    </div>
    @endif

  @else
    <div class="p-2 text-secondary">
      <i class="fas fa-exclamation-circle mr-2"></i>
      No testimonials
    </div>
  @endif


</div>
