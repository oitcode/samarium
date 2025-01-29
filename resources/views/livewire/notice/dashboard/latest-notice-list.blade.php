<div class="bg-white border">

  <div>
    <div class="h-100 w-100 p-3">
      <h2 class="h5 o-heading py-3 mb-0 h-100 w-100">
        Latest Notice
      </h2>
    </div>
  </div>
      <div class="table-responsive border">
        <table class="table mb-0">

          @if ($notices != null && count($notices) > 0)
            @foreach ($notices as $notice) 
            <tr class="border-bottom">
              <td>
                <a href="{{ route('website-webpage-' . $notice->permalink) }}" class="text-decoration-none text-reset">
                  <div>
                    <div class="h6">
                      {{ $notice->name }}
                    </div>
              
                    <div style="@if (\App\CmsTheme::first()) color: {{ \App\CmsTheme::first()->ascent_bg_color }} @else color: #888; @endif;">
                      {{ \App\Traits\NepaliDateTrait::convertEnglishToNepaliDate($notice->created_at->toDateString(), 'english')  }}
                      2081
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

      <div class="p-3 border">
        @if (Route::has('website-webpage-/notice'))
          <a href="{{ route('website-webpage-/notice') }}">See all notice</a>
        @elseif (Route::has('website-webpage-/noticeboard'))
          <a href="{{ route('website-webpage-/noticeboard') }}">See all notice</a>
        @endif
      </div>
</div>
