@extends ('website.cms.base')

@if (config('app.site_type') !== 'erp')
  @section ('googleAnalyticsTag')
  @endsection
  
  @section ('pageTitleTag')
    <title>Book appointment</title>
  @endsection
  
  @section ('googleAnalyticsTag')
  @endsection
  
  @section ('pageDescriptionTag')
    <meta name="description" content="Book appointment">
  @endsection
@endif

@section ('content')
  @livewire ('appointment.website.appointment-create', ['teamMember' => $teamMember,])
@endsection
