<div class="border bg-white mx-3">

    <div class="table-responsive">
      <table class="table">
        <tr>
          <th class="bg-danger text-white">
            Notice
          </th>
        </tr>
        @foreach ($notices as $notice) 
        <tr>
          <td class="text-primary font-weight-bold">
            <a href="{{ route('website-webpage-' . $notice->permalink) }}">
              {{ $notice->name }}
            </a>
          </td>
        </tr>
        @endforeach
      </table>
    </div>
</div>
