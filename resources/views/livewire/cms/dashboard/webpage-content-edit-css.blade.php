<div class="p-3 mb-4 border">

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
        </select>
      </div>
    </div>
  </div>

  <div>
    @include ('partials.button-store')
    @include ('partials.button-cancel', ['clickEmitEventName' => 'webpageContentEditCssCancel',])
    @include ('partials.dashboard.spinner-button')
  </div>

</div>
