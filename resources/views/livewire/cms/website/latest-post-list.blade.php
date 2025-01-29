<div class="border bg-white">

  <div class="table-responsive">
    <table class="table">
      <tr>
        <th class="bg-light text-dark font-weight-bold">
          Latest posts
        </th>
      </tr>
      @foreach ($webpages as $webpage) 
      <tr>
        <td>
          <a href="{{ route('website-webpage-' . $webpage->permalink) }}" class="text-reset text-decoration-none">
            {{ $webpage->name }}
          </a>
        </td>
      </tr>
      @endforeach
    </table>
  </div>

</div>
