{{--

Quick links to pages that are most relevant to school.

--}}

<div class="bg-white">
  <div class="row p-3-rm" style="margin: auto;">
    <div class="col-4 col-md-3 d-flex justify-content-center bg-danger-rm text-white-rm border p-0"
        style="
          background-color:
              @if (\App\CmsTheme::first())
                {{ \App\CmsTheme::first()->ascent_bg_color }}
              @else
                orange
              @endif
              ;
          color:
              @if (\App\CmsTheme::first())
                {{ \App\CmsTheme::first()->ascent_text_color }}
              @else
                white
              @endif
          ;
    ">
      <a href="/calendar" class="p-0 py-2 text-reset text-decoration-none">
        <div class="text-center">
          <div class="mb-2">
            <i class="fas fa-calendar fa-2x"></i>
          </div>
          <div class="h6 mb-0">
            Calendar
          </div>
        </div>
      </a>
    </div>
    <div class="col-4 col-md-3 d-flex justify-content-center bg-danger-rm text-white-rm border p-0"
        style="
          background-color:
              @if (\App\CmsTheme::first())
                {{ \App\CmsTheme::first()->ascent_bg_color }}
              @else
                orange
              @endif
              ;
          color:
              @if (\App\CmsTheme::first())
                {{ \App\CmsTheme::first()->ascent_text_color }}
              @else
                white
              @endif
          ;
    ">
      <a href="/noticeboard" class="p-0 py-2 text-reset text-decoration-none">
        <div class="text-center">
          <div class="mb-2">
            <i class="fas fa-edit fa-2x"></i>
          </div>
          <div class="h6 mb-0">
            Noticeboard
          </div>
        </div>
      </a>
    </div>
    @if (false)
    <div class="col-4 col-md-3 d-flex justify-content-center bg-danger-rm text-white-rm border p-0"
        style="
          background-color:
              @if (\App\CmsTheme::first())
                {{ \App\CmsTheme::first()->ascent_bg_color }}
              @else
                orange
              @endif
              ;
          color:
              @if (\App\CmsTheme::first())
                {{ \App\CmsTheme::first()->ascent_text_color }}
              @else
                white
              @endif
          ;
    ">
      <a href="/gallery" class="p-0 py-2 text-reset text-decoration-none">
        <div class="text-center">
          <div class="mb-2">
            <i class="fas fa-images fa-2x"></i>
          </div>
          <div class="h6 mb-0">
            Gallery
          </div>
        </div>
      </a>
    </div>
    @endif
    <div class="col-4 col-md-3 d-flex justify-content-center bg-danger-rm text-white-rm border p-0"
        style="
          background-color:
              @if (\App\CmsTheme::first())
                {{ \App\CmsTheme::first()->ascent_bg_color }}
              @else
                orange
              @endif
              ;
          color:
              @if (\App\CmsTheme::first())
                {{ \App\CmsTheme::first()->ascent_text_color }}
              @else
                white
              @endif
          ;
    ">
      <a href="/contact-us" class="p-0 py-2 text-reset text-decoration-none">
        <div class="text-center">
          <div class="mb-2">
            <i class="fas fa-comment fa-2x"></i>
          </div>
          <div class="h6 mb-0">
            Contact us
          </div>
        </div>
      </a>
    </div>
  </div>
</div>
