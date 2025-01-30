<div>

  {{--
  |
  | Flash message div.
  |
  --}}

  @if (session()->has('message'))
    @include ('partials.flash-message', ['message' => session('message'),])
  @endif

  {{--
  |
  | Toolbar.
  |
  --}}

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
         <x-toolbar-button-component btnBsClass="btn-primary" btnClickMethod="makeProductActive">
           Make active
         </x-toolbar-button-component>
       @elseif ($product->is_active == 1)
         <x-toolbar-button-component btnBsClass="btn-dark" btnClickMethod="makeProductInactive">
           Make inactive
         </x-toolbar-button-component>

         @if ($product->show_in_front_end == 'yes')
           <x-toolbar-button-component btnBsClass="btn-danger" btnClickMethod="makeProductNotVisibleInFrontEnd">
             Hide in website
           </x-toolbar-button-component>
         @else
           <x-toolbar-button-component btnBsClass="btn-success" btnClickMethod="makeProductVisibleInFrontEnd">
             Show in website
           </x-toolbar-button-component>
         @endif
       @endif

       @if ($product->featured_product == 'yes')
         <x-toolbar-button-component btnBsClass="btn-primary" btnClickMethod="makeProductFeaturedProductUndo">
           Remove from featured product
         </x-toolbar-button-component>
       @else
         <x-toolbar-button-component btnBsClass="btn-success" btnClickMethod="makeProductFeaturedProduct">
           Mark as featured product
         </x-toolbar-button-component>
       @endif

      <x-toolbar-button-component btnBsClass="btn-danger" btnClickMethod="closeThisComponent">
        Close
      </x-toolbar-button-component>
    </x-slot>
  </x-toolbar-component>

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
