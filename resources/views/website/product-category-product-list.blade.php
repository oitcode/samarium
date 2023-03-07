@extends ('website.base')

@section ('pageTitleTag')
  <title>
    {{ $productCategory->name }}
    {{ env ('CMP_NAME', 'Foobiz') }}
  </title>
@endsection

@section ('content')
  <div class="container p-3">
    @livewire ('ecomm-website.product-category-product-list', ['productCategory' => $productCategory,])
  </div>
@endsection
