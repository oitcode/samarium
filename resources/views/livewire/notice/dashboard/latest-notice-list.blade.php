<div class="bg-white">

  <div>
    <div class="h-100 w-100">
      <h2 class="h5 o-heading py-3 mb-0 h-100 w-100">
        Latest Notice
      </h2>
    </div>
  </div>
  <hr class="mb-4" width="10%" style="border: 3px solid black; margin: 0 0;"/>

  <div class="table-responsive border-rm">
    <table class="table mb-0">
      @if (false && $notices != null && count($notices) > 0)
        @foreach ($notices as $notice) 
        <tr class="border-bottom-rm border-0-rm">
          <td class="border-0 border-bottom-danger p-0 py-2">
            <a href="{{ route('website-webpage-' . $notice->permalink) }}" class="text-decoration-none text-reset">
              <div class="border-bottom pb-3">
                <div class="h6">
                  <i class="fas fa-exclamation-circle mr-1"></i>
                  {{ $notice->name }}
                </div>
                <div class="text-muted" style="@if ($cmsTheme) color: {{ $cmsTheme->ascent_bg_color }} @else color: #888; @endif;">
                  <i class="fas fa-calendar mr-1"></i>
                  {{ \App\Traits\NepaliDateTrait::convertEnglishToNepaliDate($notice->created_at->toDateString(), 'english')  }}
                  2081
                </div>
              </div>
            </a>
          </td>
        </tr>
        @endforeach
      @else
        <tr class="border-0">
          <td class="text-muted p-0 py-2 border-0">
             <div class="h6">
               <i class="fas fa-exclamation-circle mr-1"></i>
               No notice.
             </div>
          </td>
        </tr>
      @endif
    </table>
  </div>

  <div class="py-3 border-rm">
    @if (Route::has('website-webpage-/notice'))
      <a href="{{ route('website-webpage-/notice') }}">
        See all notice
        <i class="fas fa-link ml-2"></i>
      </a>
    @elseif (Route::has('website-webpage-/noticeboard'))
      <a href="{{ route('website-webpage-/noticeboard') }}">
        See all notice
        <i class="fas fa-link ml-2"></i>
      </a>
    @endif
  </div>

</div>
