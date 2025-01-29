<div>

  <div class="container py-4">
    <div class="border shadow">
      <div class="py-4"
      style="
      background-image:
          linear-gradient(to right,
            @if (\App\CmsTheme::first())
              {{ \App\CmsTheme::first()->ascent_bg_color }}
            @else
              orange
            @endif
          ,
            @if (\App\CmsTheme::first())
              {{ \App\CmsTheme::first()->ascent_bg_color }}
            @else
              orange
            @endif
          );
      color:
            @if (\App\CmsTheme::first())
              {{ \App\CmsTheme::first()->ascent_text_color }}
            @else
              white
            @endif
            ;
      "
      >
        <h1 class="h4 text-center">
          BOOK APPOINTMENT
        </h1>
      </div>

      <div class="row" style="margin: auto;">
        <div class="col-md-6 p-0">

          {{--
          |
          | Flash message div.
          |
          --}}

          @if (session()->has('message'))
            @include ('partials.flash-message', ['message' => session('message'),])
          @endif

          <div class="py-4 px-2 border-top border-bottom bg-white">
            <h2 class="h6 mb-3">
              Doctor Details:
            </h2>
            <div class="d-flex">
              <div class="mr-4">
                @if ($teamMember->image_path)
                  <img class="img-fluid" src="{{ asset('storage/' . $teamMember->image_path) }}" alt="{{ $teamMember->name }}" style="max-height: 150px;">
                @else
                  <div class="py-5">
                    <i class="fas fa-user fa-5x text-secondary"></i>
                  </div>
                @endif
              </div>
              <div>
                <strong>
                  {{ $teamMember->name }}
                </strong>
                <br />
                <span class="text-muted">
                  {{ $teamMember->comment }}
                </span>
              </div>
            </div>
          </div>
    
          <div class="py-3 px-2 bg-white">
            <h2 class="h6">
              <i class="fas fa-calendar text-primary"></i>
              Date
            </h2>
            <div>
              <input type="date" class="form-control" wire:model.live="appointment_date" />
              @error('appointment_date') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
          </div>

          <div class="py-3 px-2 border-bottom bg-white">
            <h2 class="h6">
              <i class="fas fa-clock text-primary"></i>
              Time
            </h2>
            <div>
              @if ($availableTimes)
                <select class="form-control" wire:model="appointment_time">
                  <option value="---">---</option>
                  @foreach ($availableTimes as $availableTime)
                    <option value="{{ $availableTime }}">{{ $availableTime }}</option>
                  @endforeach
                </select>
                @error('appointment_time') <span class="text-danger">{{ $message }}</span>@enderror
              @else
                @if ($appointment_date)
                  <div class="text-muted">
                    <i class="fas fa-exclamation-circle mr-1"></i>
                    Appointment not available on this day
                  </div>
                @endif
              @endif
            </div>
          </div>

          <div class="py-3 pt-4 px-2 bg-white">
            <h2 class="h5">
              Patient Details
            </h2>

            <div class="form-group">
              <input type="text" class="form-control" wire:model="applicant_name" placeholder="Name">
              @error('applicant_name') <span class="text-danger">{{ $message }}</span>@enderror
            </div>

            <div class="form-group">
              <input type="text" class="form-control" wire:model="applicant_phone" placeholder="Phone">
              @error('applicant_phone') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
    
            <div class="form-group">
              <textarea rows="3" class="form-control" wire:model="applicant_description" placeholder="Description"></textarea>
              @error('applicant_description') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
          </div>

          <div class="px-2 mb-4">
            <button class="btn btn-lg btn-block btn btn-primary mr-3 py-4" wire:click="store">Book appointment</button>
          </div>
        </div>
        <div class="col-md-6" style="background-color: #eef;">
          <div class="d-flex justify-content-center h-100">
            <div class="d-flex flex-column justify-content-center h-100">
              <img src="{{ asset('storage/' . $company->logo_image_path) }}" class="img-fluid" style="height: 80px;">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>
