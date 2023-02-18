@extends('layouts.app')
@section ('content')
  @if (\App\Team::where('name', 'Sponsors')->first())
    <div class="mb-4">
      @livewire ('team.team-display', ['team' => \App\Team::where('name', 'Sponsors')->first(),])
    </div>
  @else
    <div class="text-secondary">
      <i class="fas fa-exclamation-circle mr-1"></i>
      No sponsor team
    </div>
  @endif

  @if (\App\Team::where('name', 'Co-Sponsors')->first())
    <div class="mb-4">
      @livewire ('team.team-display', ['team' => \App\Team::where('name', 'Co-Sponsors')->first(),])
    </div>
  @else
    <div class="text-secondary">
      <i class="fas fa-exclamation-circle mr-1"></i>
      No co sponsor team
    </div>
  @endif
@endsection
