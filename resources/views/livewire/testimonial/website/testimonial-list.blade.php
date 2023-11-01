<div>


  @if ($testimonials != null && count($testimonials) > 0)
    @if (true)
    <div class="">
      @foreach ($testimonials as $testimonial)
        <div class="p-3 border my-3 mb-4 bg-white-rm shadow-sm" style="{{-- border-top: 2px solid red !important; --}} background-color: #ffa;">
          <span class="font-weight-bold">
            {{ $testimonial->writer_name }}
          </span>
          <br />
          <span class="text-muted">
            {{ $testimonial->writer_info }}
          </span>
          <br />
          <br />
          {{ $testimonial->body }}
          <br />
        </div>
      @endforeach
    </div>
    @endif

  @else
    <div class="p-2 text-secondary">
      <i class="fas fa-exclamation-circle mr-2"></i>
      No testimonials
    </div>
  @endif


</div>
