<div>

  @foreach ($webpages as $webpage)
    <a href="{{ route('website-webpage-' . $webpage->permalink) }}">
      {{ $webpage->permalink }}
    </a>
  @endforeach

</div>
