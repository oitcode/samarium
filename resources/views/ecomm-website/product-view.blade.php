@extends (config('app.site_type') === 'erp' ? 'ecomm-website.base' : 'cms.website.base' )

@section ('pageTitleTag')
  <title>{{ $product->name }} {{ env ('CMP_NAME', 'Foobiz') }}</title>
@endsection

@section ('googleAnalyticsTag')
@endsection

@section ('pageDescriptionTag')
  <meta name="description" content="{{ $product->name }}, Price: Rs {{ $product->selling_price }}">
@endsection

@section ('fbOgMetaTags')
  <meta property="og:url"                content="{{ Request::url() }}" />
  <meta property="og:type"               content="article" />
  <meta property="og:title"              content="{{ $product->name }}" />
  <meta property="og:description"        content="{{ $product->description }}" />
  <meta property="og:image"              content="{{ asset('storage/' . $product->image_path) }}" />
@endsection

@section ('content')
  <div class="container p-3">
    @livewire ('ecomm-website.product-display', ['product' => $product,])
  </div>
@endsection
