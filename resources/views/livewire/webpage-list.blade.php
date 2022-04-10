<div>
  @if (!is_null($webpages) && count($webpages) > 0)
    <div class="table-responsive">
      <table class="table">
        @foreach ($webpages as $webpage)
          <tr>
            <td>
              {{ $webpage->name }}
            </td>
            <td>
              {{ $webpage->permalink }}
            </td>
            <td>
              <i class="fas fa-pencil-alt"></i>
            </td>
          </tr>
        @endforeach
      </table>
    </div>
  @else
    No webpages
  @endif
</div>
