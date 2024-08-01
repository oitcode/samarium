<div class="border-rm bg-white">

      <div class="table-responsive">
        <table class="table table-borderless">
          @if (false)
          <tr>
            <th class="bg-light text-dark">
              Notice
            </th>
          </tr>
          @endif
          @if (count($notices) > 0)
            @foreach ($notices as $notice) 
            <tr class="border-bottom">
              <td class="text-primary-rm font-weight-bold-rm">
                <a href="{{ route('website-webpage-' . $notice->permalink) }}" class="text-decoration-none text-reset">
                  <div>
                    <div>
                      {{ $notice->name }}
                    </div>
                    <div>
                      {{ $notice->created_at->toDateString() }}
                    </div>
                  </div>
                </a>
              </td>
            </tr>
            @endforeach
          @else
            <tr>
              <td class="text-muted">
                No notice to show.
              </td>
            </tr>
          @endif
        </table>
      </div>
</div>
