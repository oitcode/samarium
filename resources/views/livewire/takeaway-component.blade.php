<div class="p-3 p-md-0">
  @if (! $modes['create'] && ! $modes['display'])
  <div class="mb-3">

    {{-- Show in bigger screens --}}
    <button class="btn border shadow-sm m-0 badge-pill mr-3 d-none d-md-inline-block"
        style="{{-- height: 75px; width: 150px; --}} font-size: 1.1rem;" wire:click="enterMode('create')">
      <i class="fas fa-plus-circle mr-3"></i>
      New
    </button>
    <button class="btn border shadow-sm m-0 badge-pill mr-3 d-none d-md-inline-block"
        style="{{-- height: 75px; width: 150px; --}} font-size: 1.1rem;" wire:click="enterMode('list')">
      <i class="fas fa-list mr-3"></i>
      List
    </button>

    {{-- Show in smaller screens --}}
    <button class="btn m-0 border shadow-sm badge-pill mr-3 mb-3 d-md-none bg-white"
        style="font-size: 1.3rem;"
        wire:click="enterMode('create')">
      <i class="fas fa-plus-circle mr-3"></i>
      New
    </button>
    <button class="btn m-0 border shadow-sm badge-pill mr-3 mb-3 d-md-none bg-white"
        style="font-size: 1.3rem;" wire:click="enterMode('list')">
      <i class="fas fa-list mr-3"></i>
      List
    </button>

    @if (false)
    <button class="btn {{ env('OC_ASCENT_COLOR', 'bg-success') }} m-0 float-right d-none d-md-block"
        style="{{-- height: 100px; width: 225px; --}} font-size: 1.3rem;">
      @if (env('CMP_TYPE') == 'cafe')
        <i class="fas fa-skating mr-3"></i>
        Takeaway
      @else
        <i class="fas fa-dice-d6 mr-3"></i>
        Sales
      @endif
    </button>
    @endif

    <button wire:loading class="btn m-0"
        style="height: 100px; width: 225px; font-size: 1.5rem;">
      <span class="spinner-border text-info mr-3" role="status">
      </span>
    </button>


    <div class="clearfix">
    </div>
  </div>
  @endif

  @if ($modes['create'])
    @livewire ('takeaway-create')
  @elseif ($modes['display'])
    @livewire ('takeaway-work', ['takeaway' => $displayingTakeaway,])
  @else
    @livewire ('takeaway-list')
  @endif
</div>
