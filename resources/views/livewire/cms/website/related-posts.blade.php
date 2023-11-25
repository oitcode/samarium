<div>

  <div class="row">
  @foreach ($relatedPosts as $post)
    <div class="col-md-3 p-3">
      <div class="p-2 border h-100 bg-white shadow">
        <div class="d-flex">
          <div class="mr-3">
            <i class="fas fa-square fa-3x text-primary"></i>
          </div>
          <div>
            <a href="{{ $post->permalink }}" class="text-decoration-none text-reset">
              <h2 class="h5 font-weight-bold">
                {{ $post->name }}
              </h2>
            </a>
          </div>
        </div>
      </div>
    </div>
  @endforeach
  </div>


</div>
