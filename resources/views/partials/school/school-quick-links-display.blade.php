{{--

Quick links to pages that are most relevant to school.

--}}

<div class="bg-white">
  <div class="row p-3">
    <div class="col-6 col-md-3 d-flex justify-content-center bg-danger-rm text-white-rm border p-0"
        style="
          background-color:
              @if (\App\CmsTheme::first())
                {{ \App\CmsTheme::first()->footer_bg_color }}
              @else
                orange
              @endif
              ;
          color:
              @if (\App\CmsTheme::first())
                {{ \App\CmsTheme::first()->footer_text_color }}
              @else
                white
              @endif
          ;
    ">
      <a href="/calendar" class="p-3 py-5 text-reset">
        <div class="text-center">
          <div class="mb-2">
            <i class="fas fa-calendar fa-2x"></i>
          </div>
          <div class="h5">
            Calendar
          </div>
        </div>
      </a>
    </div>
    <div class="col-6 col-md-3 d-flex justify-content-center bg-danger-rm text-white-rm border p-0"
        style="
          background-color:
              @if (\App\CmsTheme::first())
                {{ \App\CmsTheme::first()->footer_bg_color }}
              @else
                orange
              @endif
              ;
          color:
              @if (\App\CmsTheme::first())
                {{ \App\CmsTheme::first()->footer_text_color }}
              @else
                white
              @endif
          ;
    ">
      <a href="/noticeboard" class="p-3 py-5 text-reset">
        <div class="text-center">
          <div class="mb-2">
            <i class="fas fa-edit fa-2x"></i>
          </div>
          <div class="h5">
            Noticeboard
          </div>
        </div>
      </a>
    </div>
    <div class="col-6 col-md-3 d-flex justify-content-center bg-danger-rm text-white-rm border p-0"
        style="
          background-color:
              @if (\App\CmsTheme::first())
                {{ \App\CmsTheme::first()->footer_bg_color }}
              @else
                orange
              @endif
              ;
          color:
              @if (\App\CmsTheme::first())
                {{ \App\CmsTheme::first()->footer_text_color }}
              @else
                white
              @endif
          ;
    ">
      <a href="/gallery" class="p-3 py-5 text-reset">
        <div class="text-center">
          <div class="mb-2">
            <i class="fas fa-images fa-2x"></i>
          </div>
          <div class="h5">
            Gallery
          </div>
        </div>
      </a>
    </div>
    <div class="col-6 col-md-3 d-flex justify-content-center bg-danger-rm text-white-rm border p-0"
        style="
          background-color:
              @if (\App\CmsTheme::first())
                {{ \App\CmsTheme::first()->footer_bg_color }}
              @else
                orange
              @endif
              ;
          color:
              @if (\App\CmsTheme::first())
                {{ \App\CmsTheme::first()->footer_text_color }}
              @else
                white
              @endif
          ;
    ">
      <a href="/contact-us" class="p-3 py-5 text-reset">
        <div class="text-center">
          <div class="mb-2">
            <i class="fas fa-comment fa-2x"></i>
          </div>
          <div class="h5">
            Contact us
          </div>
        </div>
      </a>
    </div>
  </div>
</div>
