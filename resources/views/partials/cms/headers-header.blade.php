<div class="p-0 px-0" 
  style="
    background-color:
        @if ($cmsTheme)
          {{ $cmsTheme->top_header_bg_color }}
        @else
          white
        @endif
        ;
    color:
        @if ($cmsTheme)
          {{ $cmsTheme->top_header_text_color }}
        @else
          black
        @endif
    ;"
>
  {{-- Show in bigger screens --}}
  <div class="container-fluid d-none d-md-block bg-primary text-white">
    <div class="container text-right py-2">
      <i class="fas fa-envelope mr-1"></i>
      {{ $company->email }}
      <i class="fas fa-phone ml-4 mr-1"></i>
      {{ $company->phone }}
    </div>
  </div>
  <div class="container d-none d-md-block">
    <div class="d-flex justify-content-between">
      <div class="">
        <div class="d-flex justify-content-center h-100 pl-2">
          <a href="{{ route('website-home') }}" class="text-decoration-none">
          <div class="d-flex py-3">
            <div class="mr-4 d-flex flex-column justify-content-center">
                <img src="{{ asset('storage/' . $company->logo_image_path) }}" style="max-width: 100px; max-height: 100px;">
            </div>
          </div>
          </a>
          <div class="d-flex flex-grow-1">
            <div class="d-flex flex-column justify-content-center flex-grow-1 px-4">
              <h1 class="h5 font-weight-bold my-1" style="font-family: Mono;">
                @if ($company->short_name)
                  {{ \Illuminate\Support\Str::limit($company->short_name, 100, $end=' ...') }}
                @else
                  {{ \Illuminate\Support\Str::limit($company->name, 100, $end=' ...') }}
                @endif
              </h1>
              <div class="w-100">
                <div>
                  {{ $company->address }}
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="">
        <div class="h-100 d-flex flex-column justify-content-center">
          <button class="btn btn-primary btn-lg">
            <i class="fas fa-plus-circle mr-1"></i>
            Post product
          </button>
        </div>
      </div>
    </div>
  </div>

</div>
