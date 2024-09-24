<div class="border-rm bg-white">

      <div class="table-responsive border">
        <table class="table table-borderless-rm mb-0">
          @if (true)
          <tr>
            <th class="bg-danger text-white">
              Latest Notice
            </th>
          </tr>
          @endif
          @if (false && count($notices) > 0)
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
                 <div class="h5 font-weight-bold px-3" style="color: orange;">
                   <i class="fas fa-exclamation-circle mr-1"></i>
                   No notice.
                 </div>
              </td>
            </tr>
          @endif
        </table>
      </div>
</div>
