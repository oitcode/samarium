<div class="my-4 bg-white">
  <h2 class="h6 o-heading m-3 pt-3">
    Additional settings
  </h2>
  <div>
    <div class="mt-0 p-2 d-flex justify-content-between border"
        style="{{-- background-color: #dadada; --}}">
      <div>
        @if ($product->is_active == 0)
          <button class="btn btn-light mr-1" wire:click="makeProductActive">
            <i class="fas fa-eye mr-2"></i>
            @if (true)
            <span>
              Make active </span>
            @endif
          </button>
        @elseif ($product->is_active == 1)
          <button class="btn btn-light mr-1" wire:click="makeProductInactive">
            <i class="fas fa-eye-slash mr-2"></i>
            @if (true)
            <span>
              Make inactive
            </span>
            @endif
          </button>

          @if ($product->show_in_front_end == 'yes')
            <button class="btn btn-light mr-1" wire:click="makeProductNotVisibleInFrontEnd">
              <i class="fas fa-eye-slash mr-2"></i>
              @if (true)
              <span class="">
                Hide in website
              </span>
              @endif
            </button>
          @else
            <button class="btn btn-light mr-1" wire:click="makeProductVisibleInFrontEnd">
              <i class="fas fa-eye-slash mr-2"></i>
              @if (true)
              <span class="">
                Show in website
              </span>
              @endif
            </button>
          @endif
        @else
        @endif

        @if ($product->featured_product == 'yes')
          <button class="btn btn-light mr-1" wire:click="makeProductFeaturedProductUndo">
            <i class="fas fa-lock mr-2"></i>
            @if (true)
            <span class="">
              Remove from featured product
            </span>
            @endif
          </button>
        @else
          <button class="btn btn-light mr-1" wire:click="makeProductFeaturedProduct">
            <i class="fas fa-star mr-2"></i>
            @if (true)
            <span class="">
              Mark as featured product
            </span>
            @endif
          </button>
        @endif
      </div>

    </div>
  </div>
</div>
