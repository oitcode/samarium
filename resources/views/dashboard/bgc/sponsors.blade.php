@extends('layouts.app')
@section ('content')
  @if (\App\Team::where('name', 'Sponsors')->first())
    @livewire ('team.team-display', ['team' => \App\Team::where('name', 'Sponsors')->first(),])
  @else
    <div class="text-secondary">
      <i class="fas fa-exclamation-circle mr-1"></i>
      No sponsor team
    </div>
  @endif
@endsection
