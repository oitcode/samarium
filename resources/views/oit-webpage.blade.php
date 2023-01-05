@extends ('bia')

@section ('pageAnnouncer')
  <div class="continer-fluid o-top-page-banner">
    <div class="o-overlay text-white">
      <div class="container py-5">
      <h1 style="font-family: Arial;">
        {{ $webpage->name }}
      </h1>
      @if (false)
      Home/AboutUs
      @endif
      </div>
    </div>
  </div>
@endsection

@section ('content')

@if (!is_null($webpage->webpageContents) && count($webpage->webpageContents) > 0)

  {{-- To track odd/even content --}}
  @php
    $i = 0;
  @endphp

  @foreach ($webpage->webpageContents as $webpageContent)

    <div class="container-fluid bg-white p-0 border-rm" 
        style="font-size: 1.2em;
          {{--
          @if ($i % 2 == 1 )
            /* background-image:url({{ asset('img/cool-2.jpg') }}); */
          @else
            background-image:url({{ asset('img/cool-4.jpg') }});
          @endif
            background-size: cover;
            background-position: center;
            --}}
        ">


        <div class="container py-5">
          <div class="row d-flex">
            @if ($i % 2 == 0)
              <div class="col-md-6 justify-content-center align-self-center" style="font-size: 1.1em !important;">
                <h2 class="h1 mt-3 mb-4" style="color: #000; font-family: Arial; font-weight: bold;">
                  {{ $webpageContent->title}}
                </h2>
                <p class="text-secondary">
                  {{ $webpageContent->body}}
                </p>
              </div>
              <div class="col-md-6">
                <img src="{{ asset('storage/' . $webpageContent->image_path) }}" class="img-fluid rounded-circle-rm">
              </div>
            @else
              <div class="col-md-6">
                <img src="{{ asset('storage/' . $webpageContent->image_path) }}" class="img-fluid rounded-circle-rm">
              </div>
              <div class="col-md-6 justify-content-center align-self-center" style="font-size: 1.1em !important;">
                <h2 class="h1 mt-3 mb-4" style="color: #000; font-family: Arial; font-weight: bold;">
                  {{ $webpageContent->title}}
                </h2>
                <p class="text-secondary">
                  {{ $webpageContent->body}}
                </p>
              </div>
            @endif
          </div>
        </div>

    </div>

    @php
      $i++;
    @endphp

  @endforeach
@else
  <div class="container py-5">
    <img src="{{ asset('storage/' . $company->logo_image_path) }}" class="img-fluid" style="height: 80px;">
    <h2 class="mt-5 text-secondary">
      <i class="fas fa-exclamation-circle mr-2 text-danger"></i>
      Content is coming soon.
    </h2>
  </div>
@endif

<div>
  @livewire ('ecs.contact-component')
</div>

@endsection
