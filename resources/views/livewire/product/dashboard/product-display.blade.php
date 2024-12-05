<div>


  <!-- Flash message div -->
  @if (session()->has('message'))
    <div class="p-2">
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="fas fa-check-circle mr-3"></i>
        {{ session('message') }}
        <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close">
          <span class="text-danger" aria-hidden="true">&times;</span>
        </button>
      </div>
    </div>
  @endif


  <div class="d-flex justify-content-between bg-dark-rm text-white-rm py-1 border-rm bg-white mb-2">
    {{-- Breadcrumb --}}
    <div class="my-2 py-2 px-2">
      Products

      <i class="fas fa-angle-right mx-2"></i>
      {{ $product->name }}
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
  @include ('partials.product.product-display.additional-settings')

  {{-- Inventory info --}}
  @include ('partials.product.product-display.stock-info')

  {{-- Creation and Update info --}}
  @include ('partials.product.product-display.creation-update-info')

  {{-- Delete product --}} 
  @include ('partials.product.product-display.delete-product')


</div>
