<div>
@if ($webpage->webpageCategoriesPostpage()->count() > 0) 
  <div class="container my-4">
    @foreach ($webpage->webpageCategoriesPostpage as $category)
      @livewire ('cms.website.post-list', ['category' => $category->name,])
    @endforeach
  </div>
@elseif ($webpage->webpageTeams()->count() > 0) 
  <div class="my-4">
    @foreach ($webpage->webpageTeams as $team)
      @if (count($team->teamMembers))
        <div class="container-fluid mt-4 border-bottom">
          <div class="container">
            @include ('partials.team.team-display-fe', ['team' => $team,])
          </div>
        </div>
      @endif
    @endforeach
  </div>
@elseif ($webpage->name == 'Gallery')
  <div class="container-fluid">
    <div class="container py-4">
      @if (\App\Gallery::where('show_in_gallery_page', 'yes')->get() != null && count(\App\Gallery::where('show_in_gallery_page', 'yes')->get()) > 0)
          @foreach (\App\Gallery::where('show_in_gallery_page', 'yes')->get() as $gallery)
            <div class="mb-5">
              <h2 class="h4 font-weight-bold mt-3 mb-3" style="color: #000; font-family: Arial; font-weight: bold;">
                {{ $gallery->name }}
              </h2>
              <hr />
              <div class="row">
              @foreach ($gallery->galleryImages as $galleryImage)
                <div class="col-md-3 mb-3 p-3 border-rm">
                  <img src="{{ asset('storage/' . $galleryImage->image_path) }}" class="img-fluid">
                </div>
              @endforeach
              </div>
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
@elseif ($webpage->name == 'Doctor Team')
  @if (\App\Team::where('comment', 'Doctor')->first())
    @foreach (\App\Team::where('comment', 'Doctor')->get() as $team)
      @if (count($team->teamMembers))
        <div class="container-fluid mt-4 border-bottom">
          <div class="container">
            @include ('partials.team.team-display-fe', ['team' => $team,])
          </div>
        </div>
      @endif
    @endforeach
  @endif
@elseif ($webpage->name == 'Our Team')
  @if (\App\Team::where('name', 'Our Team')->first())
    @foreach (\App\Team::where('name', 'Our Team')->get() as $team)
      @if (count($team->teamMembers))
        <div class="container-fluid mt-4 border-bottom">
          <div class="container">
            @include ('partials.team.team-display-fe', ['team' => $team,])
          </div>
        </div>
      @endif
    @endforeach
  @endif
@elseif ($webpage->name == 'Downloads')
  @livewire ('document-file.website.document-file-list')
@elseif ($webpage->name == 'Products')
  @livewire ('ecomm-website.home-component')
@elseif ($webpage->name == 'News')
  <div class="container my-4">
    @livewire ('cms.website.post-list')
  </div>
@elseif ($webpage->name == 'Post')
  <div class="container my-4">
    @livewire ('cms.website.post-list')
  </div>
@elseif ($webpage->name == 'What we did') 
  <div class="container my-4">
    @if (false)
    @livewire ('cms.website.post-list', ['category' => 'activities',])
    @endif
    @livewire ('cms.website.latest-post-list-grid', ['category' => 'activities',])
  </div>
@elseif ($webpage->name == 'Notice' || $webpage->name == 'Noticeboard' || $webpage->permalink == '/notice')
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
@elseif ($webpage->name == 'Committee')
  @if (\App\Team::where('name', 'Committee')->first())
    @foreach (\App\Team::where('name', 'Committee')->get() as $team)
      <div class="container my-4">
        @include ('partials.team.team-display-fe', ['team' => $team,])
      </div>
    @endforeach
  @endif
@elseif ($webpage->name == 'Contact us' || $webpage->permalink == '/contact-us')

  @livewire ('cms.website.contact-component')

  {{-- Show quick contacts team if needed --}}
  @if (count(\App\Team::where('name', 'Quick Contacts')->first()->teamMembers) > 0)
    <div class="container-fluid my-4 border-top-rm">
      <div class="container">
        @if (\App\Team::where('name', 'Quick Contacts')->first())
          @include ('partials.team.team-display-fe', ['team' => \App\Team::where('name', 'Quick Contacts')->first(),])
        @endif
      </div>
    </div>
    </div>
  @endif

  {{-- Show google map share link if needed --}}
  @if (\App\Company::first()->google_map_share_link)
  <div class="container my-5">
    <h2 class="h4 font-weight-bold mb-3">
      Find us in google map
    </h2>

    <p class="mb-3">
      You can view our location in google map.
    </p>

    <a href="{{ \App\Company::first()->google_map_share_link }}" class="btn-rm btn-light-rm text-primary-rm" target="_blank">View in google map</a>
  </div>
  @endif

@elseif ($webpage->name == 'Calendar')
  @livewire ('school.cms.calendar-component')
@elseif ($webpage->name == 'Careers')
  @livewire ('vacancy.website.vacancy-list')
{{--
@elseif ($webpage->name == 'Fixtures')
  @livewire ('school.cms.calendar-component')
--}}
@else



  @if (!is_null($webpage->webpageContents) && count($webpage->webpageContents) > 0)
  
    <div class="row">
      <div class="col-md-8">
        @foreach ($webpage->webpageContents()->orderBy('position', 'ASC')->get() as $webpageContent)
  
          <div class="container border-rm border-success-rm p-0 px-2 mb-3" 
              style="
                  font-size: 1.2em;
                  @foreach ($webpageContent->cmsWebpageContentCssOptions as $cssOption)
                      {{ $cssOption->option_name }}: {{ $cssOption->option_value }};
                  @endforeach
              ">
  
                @if (true)
                <div class="row-rm" style="margin: auto;">
                    
                  @if ($webpageContent->image_path && (! $webpageContent->video_link && ! $webpageContent->title && ! $webpageContent->body))
                    <div class="col-md-6-rm">
                      @if ($webpageContent->image_path)
                        <img src="{{ asset('storage/' . $webpageContent->image_path) }}" class="img-fluid rounded-circle-rm">
                      @endif
                    </div>
                  @else
                    <div class="
                        @if ($webpageContent->video_link || $webpageContent->image_path)
                            col-md-6-rm
                        @else
                            col-md-8-rm
                        @endif
                        p-0 m-0
                        justify-content-center-rm align-self-center-rm p-0" style="font-size: 1.1em !important;{{-- width: 500px !important;--}}">
                      @if ($webpageContent->title)
                        <h2 class="h1 mt-3-rm mb-4-rm mb-0" style="color: #000; font-family: Arial; font-weight: bold;">
                          {{ $webpageContent->title}}
                        </h2>
                      @endif
                      @if ($webpageContent->body)
                        <div class="@if ($webpage->is_post == 'yes') text-dark @else text-secondary @endif bg-warning-rm px-3">
                          {!! $webpageContent->body !!}
                        </div>
                      @endif
                    </div>
                    @if ($webpageContent->image_path)
                      <div class="col-md-6-rm">
                        <img src="{{ asset('storage/' . $webpageContent->image_path) }}" class="img-fluid rounded-circle-rm">
                      </div>
                    @endif
                    @if ($webpageContent->video_link)
                      <div class="col-md-12-rm">
                         <iframe class="w-100" {{-- width="560" --}} height="315" src="https://www.youtube.com/embed/{{ $webpageContent->video_link}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                      </div>
                    @endif
                  @endif
                </div>
                @endif

          </div>
  
        @endforeach
      </div>
      <div class="col-md-4">
        @if (true)
        <div class="sticky-top">
          @livewire ('cms.website.create-webpage-question', ['webpage' => $webpage,])
        </div>
        @endif
      </div>
    </div>
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
  
  {{-- Previous, next posts section --}} 
  @if ($webpage->is_post == 'yes')
    <div class="container-fluid bg-light-rm border pt-4" style="background-color: #eee;">
      <div class="container p-3">
        <h2 class="h4 font-weight-bold">
          Related posts
        </h2>

        @livewire ('cms.website.related-posts', ['webpage' => $webpage, 'relation' => 'previous',])
      </div>
    </div>
  @endif
@endif

</div>
