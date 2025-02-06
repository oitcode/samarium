@extends (config('app.site_type') === 'erp' ? 'ecomm-website.base' : 'cms.website.base' )

@section ('content')
  @livewire ('ecomm-website.checkout', ['cartItems' => $cartItems,])
@endsection

