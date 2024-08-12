<div class="p-3 mb-4 border">

  @if (false)
  {{-- Tab options --}}
  <div class="border p-3">
    <button class="btn mr-3">
      Margin
    </button>
    <button class="btn mr-3">
      Padding
    </button>
    <button class="btn mr-3">
      Border
    </button>
    <button class="btn mr-3">
      Colors
    </button>
    <button class="btn mr-3">
      Animation
    </button>
  </div>
  @endif

  {{-- Margin --}}
  <div class="cssOptions" id="editMargin">
    {{-- Margin top --}}
    <div class="d-flex mb-3">
      <div class="font-weight-bold" style="min-width: 200px;">
        Margin top:
      </div>
      <div>
        <input type="text" wire:model.live="margin_top">
      </div>
    </div>

    {{-- Margin bottom --}}
    <div class="d-flex mb-3">
      <div class="font-weight-bold" style="min-width: 200px;">
        Margin bottom:
      </div>
      <div>
        <input type="text" wire:model.live="margin_bottom">
      </div>
    </div>

    {{-- Margin left --}}
    <div class="d-flex mb-3">
      <div class="font-weight-bold" style="min-width: 200px;">
        Margin left:
      </div>
      <div>
        <input type="text" wire:model.live="margin_left">
      </div>
    </div>

    {{-- Margin right --}}
    <div class="d-flex mb-3">
      <div class="font-weight-bold" style="min-width: 200px;">
        Margin right:
      </div>
      <div>
        <input type="text" wire:model.live="margin_right">
      </div>
    </div>

    <hr />
  </div>

  {{-- Padding --}}
  <div class="cssOptions" id="editPadding">
    {{-- Padding top --}}
    <div class="d-flex mb-3">
      <div class="font-weight-bold" style="min-width: 200px;">
        Padding top:
      </div>
      <div>
        <input type="text" wire:model.live="padding_top">
      </div>
    </div>

    {{-- Padding bottom --}}
    <div class="d-flex mb-3">
      <div class="font-weight-bold" style="min-width: 200px;">
        Padding bottom:
      </div>
      <div>
        <input type="text" wire:model.live="padding_bottom">
      </div>
    </div>

    {{-- Padding left --}}
    <div class="d-flex mb-3">
      <div class="font-weight-bold" style="min-width: 200px;">
        Padding left:
      </div>
      <div>
        <input type="text" wire:model.live="padding_left">
      </div>
    </div>

    {{-- Padding right --}}
    <div class="d-flex mb-3">
      <div class="font-weight-bold" style="min-width: 200px;">
        Padding right:
      </div>
      <div>
        <input type="text" wire:model.live="padding_right">
      </div>
    </div>

    <hr />
  </div>


  {{-- Color --}}
  <div class="cssOptions" id="editColor">
    {{-- Background color --}}
    <div class="d-flex mb-3">
      <div class="font-weight-bold" style="min-width: 200px;">
        Background color:
      </div>
      <div>
        <input type="text" wire:model.live="bg_color">
      </div>
    </div>

    {{-- Text color --}}
    <div class="d-flex mb-3">
      <div class="font-weight-bold" style="min-width: 200px;">
        Text color:
      </div>
      <div>
        <input type="text" wire:model.live="text_color">
      </div>
    </div>
    <hr />
  </div>

  {{-- Border --}}

  {{-- Animation --}}
  <div class="cssOptions" id="editAnimation">
    <div class="d-flex mb-3">
      <div class="font-weight-bold" style="min-width: 200px;">
        Animation:
      </div>
      <div>
        <select wire:model="animation">
          <option value="fade-in 2s">Fade in</option>
          <option value="fade-in 2s infinite">Fade in continuous</option>
          <option value="fade-out 2s">Fade out</option>
          <option value="fade-out 2s infinite">Fade out continuous</option>
          @if (false)
          <option value="left-to-right 2s">Left to right</option>
          <option value="left-to-right 2s infinite">Left to right continuous</option>
          <option value="right-to-left 2s ">Right to left</option>
          <option value="right-to-left 2s infinite">Right to left continuous</option>
          @endif
        </select>
      </div>
    </div>

    @if (false)
    {{-- Animation duration --}}
    <div class="d-flex mb-3">
      <div class="font-weight-bold" style="min-width: 200px;">
        Animation duration:
      </div>
      <div>
        <input type="text" wire:model.live="animation_duration">
      </div>
    </div>

    {{-- Animation repeat --}}
    <div class="d-flex mb-3">
      <div class="font-weight-bold" style="min-width: 200px;">
        Animation repeat:
      </div>
      <div>
        <input type="text" wire:model.live="animation_repeat">
      </div>
    </div>
    @endif
  </div>

  {{-- Save button --}}
  <div>
    <button class="btn btn-success mr-3" wire:click="store">
      Save
    </button>
    <button class="btn btn-danger mr-3" wire:click="$dispatch('webpageContentEditCssCancel')">
      Cancel
    </button>
  </div>

</div>
