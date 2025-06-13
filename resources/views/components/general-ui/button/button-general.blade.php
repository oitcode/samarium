<button type="submit" class="{{ $btnClass ?? 'btn btn-primary' }}"
    @if($btnClickMethod) wire:click="{{ $btnClickMethod }}" @endif
>
  {{ $slot }}
</button>
