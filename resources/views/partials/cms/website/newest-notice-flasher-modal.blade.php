<!-- Modal -->
<div class="modal fade show" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-keyboard="false" data-backdrop="static">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <img src="{{ asset('storage/' . $company->logo_image_path) }}"
            class="img-fluid-rm"
            alt="{{ $company->name }} logo"
            style="height: 100px !important; max-width: 100px !important;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          @if (false)
          <span aria-hidden="true">&times;</span>
          @endif
          <i class="fas fa-times-circle fa-2x text-danger"></i>
        </button>
      </div>

      <div class="modal-body">

      <h5 class="modal-title h4 font-weight-bold mb-3" id="exampleModalLabel">Notice</h5>
{{-- Notifications/post displayer  --}}
@if (\App\WebpageCategory::where('name', 'notice')->first())
  @if (count(\App\WebpageCategory::where('name', 'notice')->first()->webpages()->where('is_post', 'yes')->get()) > 0)
    <div class="container-fluid bg-dark-rm text-danger p-0" style="background-color: #fdd;">
      <div class="container" style="font-size: 1.3rem;">
        <div class="o-ltr-rm py-3 ">
          <div class="d-inline mr-5">
              {{ \App\WebpageCategory::where('name', 'notice')->first()->webpages()->where('is_post', 'yes')->where('visibility', 'public')->orderBy('webpage_id', 'desc')->first()->name }}
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
