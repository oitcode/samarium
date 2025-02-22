@extends ('cms.website.base')

@section ('content')
  <div class="container p-3">
    @livewire ('vacancy.website.vacancy-view', ['vacancy' => $vacancy,])
  </div>
@endsection
