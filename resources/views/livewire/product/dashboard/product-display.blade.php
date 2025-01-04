<div>


  <!-- Flash message div -->
  @if (session()->has('message'))
    <div class="my-2">
      <div class="alert alert-success alert-dismissible fade show mb-0" role="alert">
        <i class="fas fa-check-circle mr-3"></i>
        {{ session('message') }}
        <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close">
          <span class="text-danger" aria-hidden="true">&times;</span>
        </button>
      </div>
    </div>
  @endif

  <div class="d-flex justify-content-between bg-white-rm py-0 mb-1 bg-white-rm border" style="background-color: #f2f8f4;">
    {{-- Breadcrumb --}}
    <div class="my-2 p-2 d-flex flex-column justify-content-center">
      <div>
      Products
      <i class="fas fa-angle-right mx-2"></i>
      {{ $product->name }}
      </div>
    </div>

    {{-- Top tool bar --}}
    <div>
      <div>
        <div class="mt-0 p-2 d-flex justify-content-between border-rm">

          <div>
            <button class="btn btn-primary p-3" wire:click="$refresh">
              <i class="fas fa-refresh"></i>
            </button>

             @if ($product->is_active == 0)
               <button class="btn btn-primary p-3 mr-1" wire:click="makeProductActive">
                 <i class="fas fa-eye mr-2"></i>
                 @if (true)
                 <span>
                   Make active </span>
                 @endif
               </button>
             @elseif ($product->is_active == 1)
               <button class="btn btn-primary p-3 mr-1" wire:click="makeProductInactive">
                 <i class="fas fa-eye-slash mr-2"></i>
                 @if (true)
                 <span>
                   Make inactive
                 </span>
                 @endif
               </button>

               @if ($product->show_in_front_end == 'yes')
                 <button class="btn btn-primary p-3 mr-1" wire:click="makeProductNotVisibleInFrontEnd">
                   <i class="fas fa-eye-slash mr-2"></i>
                   @if (true)
                   <span class="">
                     Hide in website
                   </span>
                   @endif
                 </button>
               @else
                 <button class="btn btn-primary p-3 mr-1" wire:click="makeProductVisibleInFrontEnd">
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
               <button class="btn btn-primary p-3 mr-1" wire:click="makeProductFeaturedProductUndo">
                 <i class="fas fa-lock mr-2"></i>
                 @if (true)
                 <span class="">
                   Remove from featured product
                 </span>
                 @endif
               </button>
             @else
               <button class="btn btn-success p-3 mr-1" wire:click="makeProductFeaturedProduct">
                 <i class="fas fa-star mr-2"></i>
                 @if (true)
                 <span class="">
                   Mark as featured product
                 </span>
                 @endif
               </button>
             @endif

            <button class="btn btn-danger p-3" wire:click="closeThisComponent">
              <i class="fas fa-times"></i>
              Close
            </button>
          </div>

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
