@extends ('website.base')

@section ('content')
  <div class="container p-3">
    @livewire ('website-product-category-product-list', ['productCategory' => $productCategory,])
  </div>
@endsection
