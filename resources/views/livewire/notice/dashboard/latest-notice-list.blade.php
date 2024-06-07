<div class="border bg-white">

      <div class="table-responsive">
        <table class="table">
          <tr>
            <th class="bg-light text-dark">
              Notice
            </th>
          </tr>
          @if (count($notices) > 0)
            @foreach ($notices as $notice) 
            <tr>
              <td class="text-primary-rm font-weight-bold-rm">
                <a href="{{ route('website-webpage-' . $notice->permalink) }}" class="text-decoration-none text-reset">
                  {{ $notice->name }}
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
