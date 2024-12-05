<div>
  <div class="container bg-white p-3 border">

    <h1 class="h4 font-weight-bold py-2">
      {{ $vacancy->title }}
    </h1>
    <div class="text-muted">
      <span class="mr-3">
      Posted on
      {{ $vacancy->created_at->toDateString() }}
      </span>
    </div>

    <div class="my-3 py-2">
      <button class="btn btn-primary" style="background-color: #55a;">
        Apply for this job
      </button>
    </div>

    <div class="py-2">
      <p>
      {{ $vacancy->description }}
      </p>
    </div>

    <h2 class="h5 font-weight-bold pt-2 mb-0">
      Location
    </h2>
    <hr class="my-2" />
    <div class="mb-4">
      {{ $vacancy->job_location }}
    </div>

    <div class="my-3 py-2">
      <button class="btn btn-primary" style="background-color: #55a;">
        Apply for this job
      </button>
    </div>
  </div>
</div>
