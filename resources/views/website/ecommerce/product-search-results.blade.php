@extends ('website.cms.base')

@section ('pageTitleTag')
  <title>
    {{ env ('HOME_PAGE_TITLE', '') }}
    {{ env ('CMP_NAME', 'Nizbiz') }}
  </title>
@endsection

@section ('googleAnalyticsTag')
@endsection

@section ('fbOgMetaTags')
@endsection

@if ($company)
  @section ('content')
    <div class="container py-5">
      @if (count($productSearchResults) > 0)
        <div class="row" style="margin: auto;">
          @foreach ($productSearchResults as $product)
            <div class="col-md-4 p-3">
              @livewire ('ecomm-website.product-list-display', ['product' => $product,])
            </div>
          @endforeach
        </div>
      @else
        <div class="p-3 border bg-white text-muted h4 o-heading">
          <i class="fas fa-ban mr-1 text-danger"></i>
          Sorry, No results found.
        </div>
      @endif
    </div>
  @endsection
@endif

