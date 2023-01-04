@extends ('bia')

@section ('pageAnnouncer')
  <div class="continer-fluid o-top-page-banner">
    <div class="o-overlay text-white">
      <div class="container py-5">
      <h1 style="font-family: Arial;">
        {{ $webpage->name }}
      </h1>
      Home/AboutUs
      </div>
    </div>
  </div>
@endsection

@section ('content')

  @php
    $i = 0;
  @endphp
  @foreach ($webpage->webpageContents as $webpageContent)
    @if ($i % 2 == 0)
    <div class="container-fluid border py-4">
    @else
    <div class="container-fluid bg-light border py-4">
    @endif
      <div class="container" style="font-size: 1.2rem;">
          <div class="row my-4">
            @if ($i % 2 == 0)
              <div class="col-md-6 text-dark">
                @if ($webpageContent->webpage_content_type == 'image')
                  <img src="{{ asset('storage/' . $webpageContent->content) }}" class="img-fluid">
                @else
                  {{ $webpageContent->content }}
                @endif
              </div>
            @else
              <div class="col-md-6">
                @if ($webpageContent->webpage_content_type == 'image')
                  <img src="{{ asset('storage/' . $webpageContent->content) }}" class="img-fluid">
                @else
                  {{ $webpageContent->content }}
                @endif
              </div>
            @endif
          </div>
      </div>
    </div>
    @php
      $i++;
    @endphp
  @endforeach

@endsection
