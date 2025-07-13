<div>

  {{--
  |
  | Flash message div.
  |
  --}}

  @if (session()->has('message'))
    @include ('partials.flash-message', ['message' => session('message'),])
  @endif

  <div class="mb-4 py-5 o-linear-gradient o-border-radius px-3 h4 o-heading mb-0">
    {{ $product->name }}
  </div>

  {{--
  |
  | Toolbar.
  |
  --}}

  @if (false)
  <x-toolbar-component>
    <x-slot name="toolbarInfo">
      Products
      <i class="fas fa-angle-right mx-2"></i>
      {{ $product->name }}
    </x-slot>
    <x-slot name="toolbarButtons">
      <x-toolbar-button-component btnBsClass="btn-light" btnClickMethod="$refresh">
        <i class="fas fa-refresh"></i>
      </x-toolbar-button-component>
       @if ($product->is_active == 0)
         <x-toolbar-button-component btnBsClass="btn-light" btnClickMethod="makeProductActive">
           Make active
         </x-toolbar-button-component>
       @elseif ($product->is_active == 1)
         <x-toolbar-button-component btnBsClass="btn-light" btnClickMethod="makeProductInactive">
           Make inactive
         </x-toolbar-button-component>

         @if ($product->show_in_front_end == 'yes')
           <x-toolbar-button-component btnBsClass="btn-light" btnClickMethod="makeProductNotVisibleInFrontEnd">
             Hide in website
           </x-toolbar-button-component>
         @else
           <x-toolbar-button-component btnBsClass="btn-light" btnClickMethod="makeProductVisibleInFrontEnd">
             Show in website
           </x-toolbar-button-component>
         @endif
       @endif

       @if ($product->featured_product == 'yes')
         <x-toolbar-button-component btnBsClass="btn-light" btnClickMethod="makeProductFeaturedProductUndo">
           Remove from featured product
         </x-toolbar-button-component>
       @else
         <x-toolbar-button-component btnBsClass="btn-light" btnClickMethod="makeProductFeaturedProduct">
           Mark as featured product
         </x-toolbar-button-component>
       @endif

      <x-toolbar-button-component btnBsClass="btn-light" btnClickMethod="closeThisComponent">
        <i class="fas fa-times-circle text-danger mr-1"></i>
        Close
      </x-toolbar-button-component>
    </x-slot>
  </x-toolbar-component>
  @endif

  <div class="d-flex justify-content-between mb-4">
    <div class="d-flex">
      @if ($product->featured_product == 'yes')
        <button class="btn btn-primary mr-3 px-4 o-border-radius o-heading text-white" wire:click="makeProductFeaturedProductUndo">
          <i class="fas fa-star mr-1"></i>
          Remove from featured product
        </button>
      @else
        <button class="btn btn-primary mr-3 px-4 o-border-radius o-heading text-white" wire:click="makeProductFeaturedProduct">
          <i class="fas fa-star mr-1"></i>
          Mark as featured product
        </button>
      @endif
      @if ($product->is_active == 0)
        <button class="btn btn-dark mr-3 px-4 o-heading text-white o-border-radius" wire:click="makeProductActive">
          <i class="fas fa-eye mr-1"></i>
          Make active
        </button>
      @elseif ($product->is_active == 1)
        <button class="btn btn-dark mr-3 px-4 o-heading text-white o-border-radius" wire:click="makeProductInactive">
          <i class="fas fa-ban mr-1"></i>
          Make inactive
        </button>

        @if ($product->show_in_front_end == 'yes')
          <button class="btn btn-dark mr-3 px-4 o-heading text-white o-border-radius" wire:click="makeProductNotVisibleInFrontEnd">
            <i class="fas fa-ban mr-1"></i>
            Hide in website
          </button>
        @else
          <button class="btn btn-dark mr-3 px-4 o-heading text-white o-border-radius" wire:click="makeProductVisibleInFrontEnd">
            <i class="fas fa-eye mr-1"></i>
            Show in website
          </button>
        @endif
      @endif
    </div>
    <div>
      <button class="btn btn-danger mr-3 o-border-radius" wire:click="closeThisComponent">
        <i class="fas fa-times-circle mr-2"></i>
        Close
      </button>
    </div>
  </div>

  <div class="row mb-4" style="margin: auto;">
    <div class="col-md-4 pr-3 pl-0">
      <div class="border p-4 bg-white o-border-radius">
        <div class="h2 o-heading text-dark">
          {{ $product->website_views }}
        </div>
        <div class="h6 o-heading text-muted">
          VIEWS
        </div>
      </div>
    </div>
    <div class="col-md-4 pr-3 pl-0">
      <div class="border p-4 bg-white o-border-radius">
        <div class="h2 o-heading text-dark">
          {{ config('app.transaction_currency_symbol') }}
          {{ $product->selling_price }}
        </div>
        <div class="h6 o-heading text-muted">
          PRICE
        </div>
      </div>
    </div>
    <div class="col-md-4 pr-3 pl-0">
      <div class="border p-4 bg-white o-border-radius">
        <div class="h2 o-heading text-dark">
          @if ($product->is_active == 1)
            ACTIVE
          @else
            INACTIVE
          @endif
        </div>
        <div class="h6 o-heading text-muted">
          STATUS
        </div>
      </div>
    </div>
  </div>


  {{-- Main info --}}
  @include ('partials.product.product-display.main-info')

  {{-- Product vendor --}}
  @include ('partials.product.product-display.product-vendor')

  {{-- Social count --}}
  @include ('partials.product.product-display.social-count')

  {{-- Product gallery --}}
  @include ('partials.product.product-display.product-gallery')

  {{-- Product video --}}
  @include ('partials.product.product-display.product-video')

  {{-- Product specifications --}}
  @include ('partials.product.product-display.product-specifications')

  {{-- Product features --}}
  @include ('partials.product.product-display.product-features')

  {{-- Product options --}}
  @include ('partials.product.product-display.product-options')

  {{-- Questions and answers --}}
  @include ('partials.product.product-display.question-and-answer')

  {{-- Additional settings --}} 
  {{--
  @include ('partials.product.product-display.additional-settings')
  --}}

  {{-- Inventory info --}}
  @include ('partials.product.product-display.stock-info')

  {{-- Creation and Update info --}}
  @include ('partials.product.product-display.creation-update-info')

  {{-- Delete product --}} 
  @include ('partials.product.product-display.delete-product')

</div>
