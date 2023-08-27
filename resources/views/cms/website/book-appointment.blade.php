@extends (env('SITE_TYPE') == 'erp' ? 'ecomm-website.base' : 'cms.website.base' )

@if (env('SITE_TYPE') != 'erp')
@section ('googleAnalyticsTag')
@endsection

@section ('pageTitleTag')
  <title>Book appointment</title>
@endsection

@section ('googleAnalyticsTag')
@endsection

@section ('pageDescriptionTag')
  <meta name="description" content="Book appointment">
@endsection

@if (false)
@section ('pageAnnouncer')
  <div class="container-fluid o-top-page-banner-rm bg-success-rm mb-0 bg-danger-rm"
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
            )
      @endif
  ;">
    <div class="o-overlay text-white-rm">
      <div class="container pb-3 pt-4 @if ($webpage->is_post == 'yes') border-left-rm border-right-rm @else @endif bg-primary-rm">
      <h1 class="h1 font-weight-bold"
          style="
            @if (false && $webpage->is_post == 'yes')
              color: #000;
            @else
                color:
                      @if (\App\CmsTheme::first())
                        {{ \App\CmsTheme::first()->ascent_text_color }}
                      @else
                        white
                      @endif
            @endif
          ;">
        {{ $webpage->name }}
      </h1>
      @if ($webpage->is_post == 'yes')
        <div class="d-flex mt-4 text-white-rm"
            style="
                color:
                      @if (\App\CmsTheme::first())
                        {{ \App\CmsTheme::first()->ascent_text_color }}
                      @else
                        black
                      @endif
                      ;
            ">
        </div>
      @endif
      </div>
    </div>
  </div>

@endsection
@endif
@endif

@section ('content')
  @livewire ('appointment.website.appointment-create', ['teamMember' => $teamMember,])
  @if (false)
  @endif
@endsection
