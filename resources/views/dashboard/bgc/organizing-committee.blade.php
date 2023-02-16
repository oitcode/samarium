@extends('layouts.app')
@section ('content')
  @if (\App\Team::where('name', 'Organizing Committee')->first())
    @livewire ('team.team-display', ['team' => \App\Team::where('name', 'Organizing Committee')->first(),])
  @else
    <div class="text-secondary">
      <i class="fas fa-exclamation-circle mr-1"></i>
      No organizing committee team
    </div>
  @endif
@endsection
