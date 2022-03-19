@extends ('website.base')

@section ('content')
  @livewire ('website-checkout', ['cartItems' => $cartItems,])
@endsection

