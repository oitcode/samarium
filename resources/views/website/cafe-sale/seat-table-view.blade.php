@extends ('website.cms.base')

@section ('pageTitleTag')
  <title>{{ $seatTable->name }} {{ env ('CMP_NAME', '') }}</title>
@endsection

@section ('googleAnalyticsTag')
@endsection

@section ('pageDescriptionTag')
  <meta name="description" content="{{ $seatTable->name }}">
@endsection

@section ('fbOgMetaTags')
  <meta property="og:url"                content="{{ Request::url() }}" />
  <meta property="og:type"               content="article" />
  <meta property="og:title"              content="{{ $seatTable->name }}" />
  <meta property="og:description"        content="{{ $seatTable->name }}" />
  <meta property="og:image"              content="{{ asset('storage/' . $company->logo_image_path) }}" />
@endsection

@section ('content')
  <div class="container-fluid" style="background-color: #eee;">
    <div class="container p-3">
      @livewire ('cafe-sale.seat-table-display', ['seatTable' => $seatTable,])
    </div>
  </div>
@endsection
