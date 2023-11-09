<div>

  <div class="py-3 border-bootm">
    <div class="container">
      Please see below the list of open vacancies. Please apply
      for the position that you are interested in.
    </div>
  </div>

  <div class="container">
    @if (count($vacancies) > 0)
      <div>
        @foreach ($vacancies as $vacancy)
          <div class="py-4 px-4 mb-4 m-md-0-rm m-3 border shadow-sm bg-white">
            <div class="row">
              <div class="col-md-8">
                <div class="text-secondary">
                  Posted on
                  {{ $vacancy->created_at->toDateString() }}
                </div>
                <h2 class="h5 font-weight-bold">
                  {{ $vacancy->title }}
                </h2>
                <div class="text-dark mt-3">
                  <i class="fas fa-map-marker-alt mr-1"></i>
                  {{ $vacancy->job_location }}
                </div>

                <div class="text-secondary mt-3">
                  {{ $vacancy->description }}
                </div>

              </div>
              <div class="col-md-4">
                @if (false)
                <span class="badge badge-pill badge-success">
                <i class="fas fa-star"></i>
                </span>
                Full time
                @endif
              </div>
            </div>
            <div class="py-2">
              <a href="{{ route('website-vacancy-view',
                  [
                      $vacancy->vacancy_id, 
                      strtolower(str_replace(" ", "-", $vacancy->title)),
                  ]) }}" class="btn btn-primary mr-2" style="background-color: #55a;">
                View
                &
                Apply
              </a>
            </div>
          </div>
        @endforeach
      </div>
    @else
      <div class="p-2 text-secondary">
        <i class="fas fa-exclamation-circle mr-1"></i>
        No vacancies
      </div>
    @endif
  </div>

</div>
