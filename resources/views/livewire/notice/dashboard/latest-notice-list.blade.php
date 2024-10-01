<div class="border-rm bg-white">

  <div class="d-flex justify-content-between-rm col-md-4-rm bg-success-rm text-white-rm p-3" style="
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
    <div class="d-flex flex-column justify-content-center">
      <h2 class="h5 font-weight-bold bg-primary-rm text-white-rm py-3 mb-0" style="
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
        Latest Notice
      </h2>
    </div>
  </div>
      <div class="table-responsive border">
        <table class="table table-borderless-rm mb-0">
          @if (false)
          <tr>
            <th class="bg-danger-rm text-white">
              <h2 class="h5 font-weight-bold bg-primary-rm text-white-rm p-3 mb-0" style="
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
                Latest Notice
              </h2>
            </th>
          </tr>
          @endif
          @if (count($notices) > 0)
            @foreach ($notices as $notice) 
            <tr class="border-bottom">
              <td class="text-primary-rm font-weight-bold-rm">
                <a href="{{ route('website-webpage-' . $notice->permalink) }}" class="text-decoration-none text-reset">
                  <div>
                    <div class="h5 font-weight-bold">
                      {{ $notice->name }}
                    </div>
                    <div>
                      {{ \App\Traits\NepaliDateTrait::convertEnglishToNepaliDate($notice->created_at->toDateString(), 'english')  }}
                    </div>
                  </div>
                </a>
              </td>
            </tr>
            @endforeach
          @else
            <tr>
              <td class="text-muted">
                 <div class="h5 font-weight-bold" style="color: orange;">
                   <i class="fas fa-exclamation-circle mr-1"></i>
                   No notice.
                 </div>
              </td>
            </tr>
          @endif
        </table>
      </div>

      <div class="my-0-rm p-3 border">
        @if (Route::has('website-webpage-/notice'))
          <a href="{{ route('website-webpage-/notice') }}">See all notice</a>
        @elseif (Route::has('website-webpage-/noticeboard'))
          <a href="{{ route('website-webpage-/noticeboard') }}">See all notice</a>
        @endif
      </div>
</div>
