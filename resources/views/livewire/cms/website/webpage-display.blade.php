<div>
@if ($webpage->name == 'Gallery')
  <div class="container-fluid">
    <div class="container py-4">
      @if (\App\Gallery::all() != null && count(\App\Gallery::all()) > 0)
          @foreach (\App\Gallery::all() as $gallery)
            <h2 class="h1 mt-3 mb-4" style="color: #000; font-family: Arial; font-weight: bold;">
              {{ $gallery->name }}
            </h2>
            <div class="row">
            @foreach ($gallery->galleryImages as $galleryImage)
              <div class="col-md-3 mb-3 p-3 border">
                <img src="{{ asset('storage/' . $galleryImage->image_path) }}" class="img-fluid">
              </div>
            @endforeach
            </div>
          @endforeach
        </div>
      @else
        <span class="text-danger">
          No gallery to show
        </span>
      @endif
    </div>
  </div>
@elseif ($webpage->name == 'News')
  <div class="container my-4">
    @livewire ('cms.website.post-list')
  </div>
@elseif ($webpage->name == 'Post')
  <div class="container my-4">
    @livewire ('cms.website.post-list')
  </div>
@elseif ($webpage->name == 'Notice')
  <div class="container my-4">
    @livewire ('cms.website.post-list', ['category' => 'notice',])
  </div>
@elseif ($webpage->name == 'Teams')
  @if (\App\Team::where('team_type', 'playing_team')->first())
    <div class="container my-4">
      @include ('partials.team.team-block-display')
    </div>
  @endif
@elseif ($webpage->name == 'Sponsors')
  @if (\App\Team::where('name', 'Sponsors')->first())
    <div class="container my-4">
      @include ('partials.team.team-display-fe', ['team' => \App\Team::where('name', 'Sponsors')->first(),])
    </div>
  @endif
  @if (\App\Team::where('name', 'Co-Sponsors')->first())
    <div class="container my-4">
      @include ('partials.team.team-display-fe', ['team' => \App\Team::where('name', 'Co-Sponsors')->first(),])
    </div>
  @endif
@elseif ($webpage->name == 'Organizing Committee')
  @if (\App\Team::where('team_type', 'organizing_team')->first())
    @foreach (\App\Team::where('team_type', 'organizing_team')->get() as $team)
      <div class="container my-4">
        @include ('partials.team.team-display-fe', ['team' => $team,])
      </div>
    @endforeach
  @endif
@elseif ($webpage->name == 'Contact us')
  @if (\App\Team::where('name', 'Quick Contacts')->first())
    <div class="container my-4">
      @include ('partials.team.team-display-fe', ['team' => \App\Team::where('name', 'Quick Contacts')->first(),])
    </div>
  @endif
@elseif ($webpage->name == 'Calendar')
  @livewire ('school.cms.calendar-component')
{{--
@elseif ($webpage->name == 'Fixtures')
  @livewire ('school.cms.calendar-component')
--}}
@else

  @if (!is_null($webpage->webpageContents) && count($webpage->webpageContents) > 0)
  
    @foreach ($webpage->webpageContents()->orderBy('position', 'ASC')->get() as $webpageContent)
  
      <div class="container-fluid bg-white-rm p-0 border-rm" 
          style="font-size: 1.2em; ">
  
  
        <div class="container p-0">

          <div style="
              @foreach ($webpageContent->cmsWebpageContentCssOptions as $cssOption)
                  {{ $cssOption->option_name }}: {{ $cssOption->option_value }};
              @endforeach
          ">
            <div class="row" style="margin: auto;">
                
              @if ($webpageContent->image_path && (! $webpageContent->video_link && ! $webpageContent->title && ! $webpageContent->body))
                <div class="col-md-6">
                  @if ($webpageContent->image_path)
                    <img src="{{ asset('storage/' . $webpageContent->image_path) }}" class="img-fluid rounded-circle-rm">
                  @endif
                </div>
              @else
                <div class="
                    @if ($webpageContent->video_link || $webpageContent->image_path)
                        col-md-6
                    @else
                        col-md-8
                    @endif
                    justify-content-center align-self-center" style="font-size: 1.1em !important; width: 500px !important;">
                  @if ($webpageContent->title)
                    <h2 class="h1 mt-3 mb-4" style="color: #000; font-family: Arial; font-weight: bold;">
                      {{ $webpageContent->title}}
                    </h2>
                  @endif
                  @if ($webpageContent->body)
                    <div class="@if ($webpage->is_post == 'yes') text-dark @else text-secondary @endif p-3">
                      {!! $webpageContent->body !!}
                    </div>
                  @endif
                </div>
                @if ($webpageContent->image_path)
                  <div class="col-md-6">
                    <img src="{{ asset('storage/' . $webpageContent->image_path) }}" class="img-fluid rounded-circle-rm">
                  </div>
                @endif
                @if ($webpageContent->video_link)
                  <div class="col-md-12">
                     <iframe class="w-100" {{-- width="560" --}} height="315" src="https://www.youtube.com/embed/{{ $webpageContent->video_link}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                  </div>
                @endif
              @endif
            </div>
          </div>
        </div>
  
      </div>
  
    @endforeach
  @else
    @if ($webpage->is_post == 'no')
      <div class="container py-4 d-flex">
        @if (false)
        <img src="{{ asset('storage/' . $company->logo_image_path) }}" class="img-fluid" style="height: 80px;">
        @endif
        <h2 class="mt-3 text-secondary">
          <i class="fas fa-exclamation-circle mr-2 text-danger"></i>
          Content is coming soon.
        </h2>
      </div>
    @endif
  @endif
@endif

</div>
