<div>


  {{-- Breadcrumb --}}
  <h1 class="h5 my-2 py-2">
    Products

    <i class="fas fa-angle-right mx-2"></i>
    {{ $product->productCategory->name }}

    <i class="fas fa-angle-right mx-2"></i>
    {{ $product->name }}
  </h1>


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


  {{-- Toolbar --}}
  <div>
    <div>
      <div class="mt-0 p-2 d-flex justify-content-end border" style="background-color: #dadada;">

        <div>
          <button class="btn btn-light" wire:click="$refresh">
            <i class="fas fa-refresh"></i>
            @if (false)
            Refresh
            @endif
          </button>

          <button class="btn btn-light" wire:click="$emit('exitProductDisplayMode')">
            <i class="fas fa-times"></i>
            @if (false)
            Close
            @endif
          </button>
        </div>

      </div>
    </div>
  </div>


  {{-- Main info --}}
  @include ('partials.product.product-display.main-info')

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


</div>
