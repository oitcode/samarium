@extends ('website.cms.base')

@section ('content')
  @livewire ('ecomm-website.checkout', ['cartItems' => $cartItems,])
@endsection

