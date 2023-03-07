@extends ('website.base')

@section ('content')
  @livewire ('ecomm-website.checkout', ['cartItems' => $cartItems,])
@endsection

