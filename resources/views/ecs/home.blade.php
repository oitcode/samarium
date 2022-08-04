@extends ('bia')

@section ('content')

<div class="container my-4">
  <div class="row">

    <div class="col-md-4 p-2">
      <div class="card shadow-sm h-100 o-ecs-card" role="button">
        <div class="card-body p-2 bg-primary text-white o-ecs-card-body">
          <div class="d-flex justify-content-between p-4">
            <div class="">
              <h2 class="h3">
                Study Abroad
              </h2>
              <div>
                <span class="badge badge-light badge-pill mr-3 text-secondary">
                  USA
                </span>
                <span class="badge badge-light badge-pill mr-3 text-secondary">
                  UK
                </span>
                <span class="badge badge-light badge-pill mr-3 text-secondary">
                  Australia
                </span>
                <span class="badge badge-light badge-pill mr-3 text-secondary">
                  New Zealand
                </span>
                <span class="badge badge-light badge-pill mr-3 text-secondary">
                  Canada
                </span>
                <span class="badge badge-light badge-pill mr-3 text-secondary">
                  Japan
                </span>
              </div>
            </div>
            <div>
              <i class="fas fa-graduation-cap fa-2x"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-4 p-2">
      <div class="card shadow-sm h-100" role="button">
        <div class="card-body p-2 bg-success text-white o-ecs-card-body">
          <div class="d-flex justify-content-between p-4">
            <div class="">
              <h2 class="h3">
                Test Preparation
              </h2>
              <div>
                TOEFL
                <br>
                IELTS
                <br>
                PTE
              </div>
            </div>
            <div>
              <i class="fas fa-book-reader fa-2x"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-4 p-2">
      <div class="card shadow-sm h-100" role="button">
        <div class="card-body p-2 bg-warning-rm text-white o-ecs-card-body" style="background-color: #FF5800;">
          <div class="d-flex justify-content-between p-4">
            <div class="">
              <h2 class="h3">
                Entrance Preparation
              </h2>
              <div>
                Budhanilkantha School
                <br>
                St Xaviers School
                <br>
                St Marys School
                <br>
              </div>
            </div>
            <div>
              <i class="fas fa-user-graduate fa-2x"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
 
</div>

<div>
  @livewire ('ecs.contact-component')
</div>

@endsection

