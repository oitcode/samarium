@extends('layouts.app')
@section ('content')
  @if (\App\Models\Team\Team::where('name', 'Quick Contacts')->first())
    @livewire ('team.dashboard.team-display', ['team' => \App\Models\Team\Team::where('name', 'Quick Contacts')->first(),])
  @else
    <div class="text-secondary">
      <i class="fas fa-exclamation-circle mr-1"></i>
      No quick contact team
    </div>
  @endif
@endsection
