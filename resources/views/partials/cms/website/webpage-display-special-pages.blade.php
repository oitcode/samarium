@if ($webpage->webpageCategoriesPostpage()->count() > 0) 
  {{--
  |--------------------------------------------------------------------------
  | Post page
  |--------------------------------------------------------------------------
  |
  | Post pages are pages which show posts of some specific category. It is
  | a special page.
  |
  --}}
  <div class="container my-4">
    @foreach ($webpage->webpageCategoriesPostpage as $category)
      @livewire ('cms.website.post-list', ['category' => $category->name,])
    @endforeach
  </div>
@elseif ($webpage->webpageTeams()->count() > 0) 
  {{--
  |--------------------------------------------------------------------------
  | Team page
  |--------------------------------------------------------------------------
  |
  | Team pages are pages which show posts of some specific team. It is
  | a special page.
  |
  --}}
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
@elseif ($webpage->webpageProductCategories()->count() > 0) 
  {{--
  |--------------------------------------------------------------------------
  | Product category page
  |--------------------------------------------------------------------------
  |
  | Product category pages are pages which show products of a specific
  | product category. It is a special page.
  |
  --}}
  <div class="my-4">
    @foreach ($webpage->webpageProductCategories as $productCategory)
      @if (count($productCategory->products))
        <div class="container">
          <div class="row my-4" style="margin: auto;">
            @foreach ($productCategory->products as $product)
              <div class="col-md-4 p-3">
                @livewire ('ecomm-website.product-list-display', ['product' => $product,])
              </div>
            @endforeach
          </div>
        </div>
      @endif
    @endforeach
  </div>
@elseif ($webpage->name == 'Gallery')
  {{--
  |--------------------------------------------------------------------------
  | Gallery page
  |--------------------------------------------------------------------------
  |
  | This page shows the galleries.
  |
  --}}
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
                <div class="col-md-3 mb-3 p-3">
                  <img src="{{ asset('storage/' . $galleryImage->image_path) }}" class="img-fluid">
                </div>
              @endforeach
              </div>
            </div>
          @endforeach
        </div>
      @else
        <div class="h5 font-weight-bold" style="color: orange;">
          <i class="fas fa-exclamation-circle mr-1"></i>
          No gallery to show.
        </div>
      @endif
    </div>
  </div>
@elseif ($webpage->name == 'Downloads')
  {{--
  |--------------------------------------------------------------------------
  | Downloads page
  |--------------------------------------------------------------------------
  |
  | This page shows the PDF files which can be viewed or downloaded.
  |
  --}}
  @livewire ('document-file.website.document-file-list')
@elseif ($webpage->name == 'Products')
  {{--
  |--------------------------------------------------------------------------
  | Products page
  |--------------------------------------------------------------------------
  |
  | This page shows the products of an ecommerce store.
  |
  --}}
  @livewire ('ecomm-website.home-component')
@elseif ($webpage->name == 'News')
  {{--
  |--------------------------------------------------------------------------
  | News page
  |--------------------------------------------------------------------------
  |
  | This page shows the latest post list.
  |
  --}}
  <div class="container my-4">
    @livewire ('cms.website.post-list')
  </div>
@elseif ($webpage->name == 'Post')
  {{--
  |--------------------------------------------------------------------------
  | Post page
  |--------------------------------------------------------------------------
  |
  | This page shows the latest post list.
  |
  --}}
  <div class="container my-4">
    @livewire ('cms.website.post-list')
  </div>
@elseif ($webpage->name == 'What we did') 
  {{--
  |--------------------------------------------------------------------------
  | What we did page
  |--------------------------------------------------------------------------
  |
  | This page shows the latest post list with post category ``activities''.
  |
  --}}
  <div class="container my-4">
    @livewire ('cms.website.latest-post-list-grid', ['category' => 'activities',])
  </div>
@elseif ($webpage->name == 'Notice' || $webpage->name == 'Noticeboard' || $webpage->permalink == '/notice')
  {{--
  |--------------------------------------------------------------------------
  | Notice / Noticeboard page
  |--------------------------------------------------------------------------
  |
  | This page shows the latest post list with post category ``notice''.
  |
  --}}
  <div class="container my-4">
    @livewire ('cms.website.post-list', ['category' => 'notice',])
  </div>
@elseif ($webpage->name == 'Teams')
  {{--
  |--------------------------------------------------------------------------
  | Teams page
  |--------------------------------------------------------------------------
  |
  | This page shows the first playing team.
  |
  --}}
  @if (\App\Team::where('team_type', 'playing_team')->first())
    <div class="container my-4">
      @include ('partials.team.team-block-display')
    </div>
  @endif
@elseif ($webpage->name == 'Sponsors')
  {{--
  |--------------------------------------------------------------------------
  | Sponsors page
  |--------------------------------------------------------------------------
  |
  | This page shows the first sponsor and co-sponsor team.
  |
  --}}
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
  {{--
  |--------------------------------------------------------------------------
  | Organizing Committee page
  |--------------------------------------------------------------------------
  |
  | This page shows the organizing committee team.
  |
  --}}
  @if (\App\Team::where('team_type', 'organizing_team')->first())
    @foreach (\App\Team::where('team_type', 'organizing_team')->get() as $team)
      <div class="container my-4">
        @include ('partials.team.team-display-fe', ['team' => $team,])
      </div>
    @endforeach
  @endif
@elseif ($webpage->name == 'Committee')
  {{--
  |--------------------------------------------------------------------------
  | Committee page
  |--------------------------------------------------------------------------
  |
  | This page shows the committee team.
  |
  --}}
  @if (\App\Team::where('name', 'Committee')->first())
    @foreach (\App\Team::where('name', 'Committee')->get() as $team)
      <div class="container my-4">
        @include ('partials.team.team-display-fe', ['team' => $team,])
      </div>
    @endforeach
  @endif
@elseif ($webpage->name == 'Contact us' || $webpage->permalink == '/contact-us')
  {{--
  |--------------------------------------------------------------------------
  | Contact us page
  |--------------------------------------------------------------------------
  |
  | This page shows the contact us details.
  |
  --}}

  @livewire ('cms.website.contact-component')

  {{-- Show quick contacts team if needed --}}
  @if (count(\App\Team::where('name', 'Quick Contacts')->first()->teamMembers) > 0)
    <div class="container-fluid my-5 px-3">
      <div class="container p-0">
        @if (\App\Team::where('name', 'Quick Contacts')->first())
          @include ('partials.team.team-display-fe', ['team' => \App\Team::where('name', 'Quick Contacts')->first(),])
        @endif
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

      <a href="{{ \App\Company::first()->google_map_share_link }}" target="_blank">View in google map</a>
    </div>
  @endif
@elseif ($webpage->name == 'Calendar' || $webpage->permalink == '/calendar')
  {{--
  |--------------------------------------------------------------------------
  | Calendar page
  |--------------------------------------------------------------------------
  |
  | This page shows the calendar.
  |
  --}}
  @livewire ('school.cms.calendar-component')
@elseif ($webpage->name == 'Careers')
  {{--
  |--------------------------------------------------------------------------
  | Careers page
  |--------------------------------------------------------------------------
  |
  | This page shows the vacancies.
  |
  --}}
  @livewire ('vacancy.website.vacancy-list')
{{--
@elseif ($webpage->name == 'Fixtures')
  @livewire ('school.cms.calendar-component')
--}}
@endif
