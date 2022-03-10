@extends ('website.base')

@section ('fbOgMetaTags')
<meta property="og:url"                content="{{ Request::url() }}" />
<meta property="og:type"               content="article" />
<meta property="og:title"              content="{{ $product->name }}" />
<meta property="og:description"        content="{{ $product->description }}" />
<meta property="og:image"              content="http://static01.nyt.com/images/2015/02/19/arts/international/19iht-btnumbers19A/19iht-btnumbers19A-facebookJumbo-v2.jpg" />
@endsection

@section ('content')
  <div class="container p-3">
    @livewire ('website-product-display', ['product' => $product,])
  </div>
@endsection
