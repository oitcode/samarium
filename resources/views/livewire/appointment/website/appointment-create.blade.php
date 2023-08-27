<div>

  <div class="container py-4">
    <div class="border shadow">
      <div class="py-4"
      style="
      @if (false && $webpage->is_post == 'yes')
      @else
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
      @endif"
      >
        <h1 class="h4 text-center">
          BOOK APPOINTMENT
        </h1>
      </div>

      <div class="row" style="margin: auto;">
        <div class="col-md-6 p-0">
          <!-- Flash message div -->
          @if (session()->has('message'))
            <div class="p-2">
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle mr-3"></i>
                {{ session('message') }}
                <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close">
                  <span class="text-danger" aria-hidden="true">&times;</span>
                </button>
              </div>
            </div>
          @endif
          <div class="my-4-rm py-4 px-2 border-top border-bottom bg-white">
            <h2 class="h6 mb-3">
              Doctor Details:
            </h2>
            <div class="d-flex">
              <div class="mr-4">
                <i class="fas fa-user fa-5x text-primary"></i>
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
    
          <div class="py-3 px-2 border-bottom-rm bg-white">
            <h2 class="h6">
              <i class="fas fa-calendar text-primary"></i>
              Date
            </h2>
            <div>
              <input type="date" class="form-control" wire:model.defer="appointment_date" />
              @error('appointment_date') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
          </div>

          <div class="py-3 px-2 border-bottom bg-white">
            <h2 class="h6">
              <i class="fas fa-clock text-primary"></i>
              Time
            </h2>
            <div>
              <select class="form-control" wire:model.defer="appointment_time">
                <option value="6:00">6:00</option>
                <option value="6:30">6:30</option>
                <option value="7:00">7:00</option>
                <option value="7:30">7:30</option>
                <option value="8:00">8:00</option>
                <option value="8:30">8:30</option>
                <option value="9:00">9:00</option>
                <option value="9:30">9:30</option>
              </select>
              @error('appointment_time') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
          </div>

          <div class="mt-3-rm py-3 pt-4 px-2 bg-white">
            <h2 class="h5">
              Patient Details
            </h2>
            <div class="form-group">
              @if (false)
              <label>Name</label>
              @endif
              <input type="text" class="form-control" id="" wire:model.defer="applicant_name" placeholder="Name">
              @error('applicant_name') <span class="text-danger">{{ $message }}</span>@enderror
            </div>

            <div class="form-group">
              @if (false)
              <label>Phone</label>
              @endif
              <input type="text" class="form-control" id="" wire:model.defer="applicant_phone" placeholder="Phone">
              @error('applicant_phone') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
    
            <div class="form-group">
              @if (false)
              <label>Description</label>
              @endif
              <textarea rows="3" class="form-control" wire:model.defer="applicant_description" placeholder="Description"></textarea>
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
