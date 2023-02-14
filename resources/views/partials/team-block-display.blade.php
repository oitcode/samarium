<div class="row">
  @foreach (\App\Team::all() as $team)
    @if ($team->name != 'Organizing Committee' && $team->name != 'Quick Contacts')
      <div class="col-md-3 mb-4">
        <div class="card h-100 shadow-sm border-0">
        
          <div class="d-flex flex-column justify-content-between h-100 bg-success-rm">
            <div class="d-flex justify-content-center flex-grow-1 bg-warning-rm">
              @if (true)
              <div class="d-flex flex-column justify-content-center h-100">
                @if ($team->image_path)
                  <img class="img-fluid h-25-rm w-100-rm" src="{{ asset('storage/' . $team->image_path) }}" alt="{{ $team->name }}" style="max-height: 150px; {{--max-width: 100px;--}}">
                @else
                  <i class="fas fa-user fa-3x"></i>
                @endif
              </div>
              @endif
            </div>
        
            <div class="d-flex flex-column justify-content-between overflow-auto" style="background-color: #f5f5f5;">
              <div class="p-2">
                <h2 class="h4 mt-2 mb-2" style="color: #004; font-family: Arial;">
                  {{ $team->name }}
                </h2>
        
                <div class="my-2">
                  <div class="h5 mb-2 text-primary">
                    @if ($team->comment)
                      {{ $team->comment }}
                    @else
                      &nbsp;
                    @endif
                  </div>
                </div>
        
              </div>
            </div>
          </div>
        
        </div>
      </div>
    @endif
  @endforeach
</div>
