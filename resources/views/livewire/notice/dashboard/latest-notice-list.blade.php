<div class="border bg-white">

      <div class="table-responsive">
        <table class="table">
          <tr>
            <th class="bg-danger text-white">
              Notice
            </th>
          </tr>
          @if (count($notices) > 0)
            @foreach ($notices as $notice) 
            <tr>
              <td class="text-primary font-weight-bold">
                <a href="{{ route('website-webpage-' . $notice->permalink) }}">
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
