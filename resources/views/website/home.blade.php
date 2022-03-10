@extends ('website.base')

@section ('content')
  @foreach ($productCategories as $productCategory)
    @if (count($productCategory->products) > 0)
      <div class="container mt-5">
        <h2 class="mb-3">
          {{ $productCategory->name }}
        </h2>
        <hr/>
        @livewire ('website-product-category-product-list', ['productCategory' => $productCategory,])
      </div>
    @endif
  @endforeach
@endsection

