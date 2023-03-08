@extends ('ecomm-website.base')

@section ('content')
  @livewire ('ecomm-website.checkout', ['cartItems' => $cartItems,])
@endsection

