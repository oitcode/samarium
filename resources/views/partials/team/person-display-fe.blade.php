<div class="card h-100 shadow-sm border-0">

  <div class="d-flex flex-column justify-content-between h-100 bg-success-rm">
    <div class="d-flex justify-content-center flex-grow-1 bg-warning-rm">
      @if (true)
      <div class="d-flex-rm flex-column-rm justify-content-center-rm h-100-rm" style="border-radius: 50% !important; width: 150px !important; height: 150px !important;">
        @if ($person->image_path)
          <div>
            <img class="img-fluid shadow-lg h-25-rm w-100-rm rounded-circle-rm" src="{{ asset('storage/' . $person->image_path) }}" alt="{{ $person->name }}"
                style="{{-- border: 1px solid white; border-radius: 50%; min-width: 150px; min-height: 150px; --}}">
          </div>
        @else
          <div class="py-5">
            <i class="fas fa-user fa-5x text-secondary"></i>
          </div>
        @endif
      </div>
      @endif
    </div>

    <div class="d-flex flex-column justify-content-between overflow-auto" style="background-color: #f5f5f5;">
      <div class="p-2">
        <h2 class="h5 mt-2 mb-2" style="color: #004; font-family: Arial;">
          {{ $person->name }}
        </h2>

        <div class="my-2">
          <div class="h5 mb-2 text-primary">
            @if ($person->comment)
              {{ $person->comment }}
            @else
              &nbsp;
            @endif
          </div>
          @if ($person->phone)
          <div class="mb-1 text-secondary">
            <i class="fas fa-phone mr-1"></i>
            {{ $person->phone }}
          </div>
          @endif
          @if ($person->email)
          <div class="mb-1 text-secondary">
            <i class="fas fa-envelope mr-1"></i>
            {{ $person->email }}
          </div>
          @endif
        </div>

      </div>
    </div>
  </div>

</div>
