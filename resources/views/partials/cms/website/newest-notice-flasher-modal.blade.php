<!-- Modal -->
<div class="modal fade show" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-keyboard="false" data-backdrop="static">
  <div class="modal-dialog modal-lg-rm" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <img src="{{ asset('storage/' . $company->logo_image_path) }}"
            class="img-fluid-rm"
            alt="{{ $company->name }} logo"
            style="height: 100px !important; max-width: 100px !important;">
        @if (true)
        <button type="button" class="close-rm btn btn-danger" data-dismiss="modal" aria-label="Close">
          <i class="fas fa-times-circle fa-2x text-danger-rm"></i>
          Close
        </button>
        @endif
      </div>

      <div class="modal-body">


{{-- Notifications/post displayer  --}}
@if (\App\WebpageCategory::where('name', 'notice')->first())
  @if (count(\App\WebpageCategory::where('name', 'notice')->first()->webpages()->where('is_post', 'yes')->get()) > 0)
    <div class="container-fluid bg-dark-rm text-danger-rm p-0" style="{{-- background-color: #fdd; --}}">
      <div class="container">
        <div class="o-ltr-rm py-3 ">
          <div class="mb-1 font-weight-bold">
              {{ \App\WebpageCategory::where('name', 'notice')->first()->webpages()->where('is_post', 'yes')->where('visibility', 'public')->orderBy('webpage_id', 'desc')->first()->name }}
          </div>



          {{-- Published info --}}
          <div class="px-3-rm text-secondary mb-4">
            Published on:
            {{ \App\Traits\NepaliDateTrait::convertEnglishToNepaliDate(\App\WebpageCategory::where('name', 'notice')->first()->webpages()->where('is_post', 'yes')->where('visibility', 'public')->orderBy('webpage_id', 'desc')->first()->created_at->toDateString(), 'english')  }}
            2081
          </div>

          <div>
            <img src="{{ asset('storage/' . \App\WebpageCategory::where('name', 'notice')->first()->webpages()->where('is_post',
            'yes')->where('visibility', 'public')->orderBy('webpage_id', 'desc')->first()->featured_image_path) }}"
                class="img-fluid"
                alt="{{ $company->name }} logo"
                style="height: 400px !important; max-width: 400px !important;">
          </div>
        </div>
      </div>
    </div>
  @endif
@endif

      </div>
      <div class="modal-footer">
        <a href="{{ route('website-webpage-' . \App\WebpageCategory::where('name', 'notice')->first()->webpages()->where('is_post', 'yes')->where('visibility', 'public')->orderBy('webpage_id', 'desc')->first()->permalink) }}"
            class="btn btn-primary">
              Open this notice
        </a>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script>
  // var mdl = document.getElementById("exampleModal");
  // mdl->modal('show');
  $('#exampleModal').modal();
</script>
