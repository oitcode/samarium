<div>

  {{--
  |
  | Flash message div
  |
  --}}

  @if (session()->has('message'))
    @include ('partials.flash-message', ['message' => session('message'),])
  @endif

  {{-- Basic info --}}
  <div class="py-5 mb-2 text-center o-linear-gradient o-border-radius">
    <div class="h2 o-heading o-linear-gradient-text-color">
      {{ $productCategory->name }}
    </div>
  </div>

  {{--
  |
  | Toolbar
  |
  --}}

  <x-toolbar-component>
    <x-slot name="toolbarInfo">
      Product category
      <i class="fas fa-angle-right mx-2"></i>
      {{ $productCategory->name }}
    </x-slot>
    <x-slot name="toolbarButtons">
      @if (false && env('APP_DEBUG') == true)
      <x-toolbar-button-component btnBsClass="btn-light" btnClickMethod="$refresh">
        <i class="fas fa-refresh"></i>
      </x-toolbar-button-component>
      @endif
      <x-toolbar-button-component btnBsClass="btn-danger" btnClickMethod="closeThisComponent">
        <i class="fas fa-times-circle mr-1"></i>
        Close
      </x-toolbar-button-component>
    </x-slot>
  </x-toolbar-component>

  {{-- Product category name --}}
  <div class="bg-white mb-3 border">
    <div>
      <div class="d-flex justify-content-between border-bottom">
        <div class="px-3 py-3 o-heading">
            Product Category Name
        </div>
        <div class="d-flex flex-column justify-content-center">
          <button class="btn btn-light text-primary font-weight-bold" wire:click="enterMode('updateProductCategoryNameMode')">
            Edit
          </button>
        </div>
      </div>
      @if ($modes['updateProductCategoryNameMode'])
        <div>
          @livewire ('product-category.dashboard.product-category-edit-name', ['productCategory' => $productCategory,])
        </div>
      @else
        <div class="d-flex justify-content-between">
          {{-- Product name --}}
          <div class="flex-grow-1">
            <div class="bg-white h-100">
              <h1 class="h6 p-3 font-weight-bold">
                {{ $productCategory->name }}
              </h1>
            </div>
          </div>
        </div>
      @endif
    </div>
  </div>

  {{-- Product category image --}}
  <div class="bg-white my-3 border">
    <div class="d-flex justify-content-between border-bottom">
      <div class="px-3 py-3 o-heading">
          Product Category Image
      </div>
      <div class="d-flex flex-column justify-content-center">
        <button class="btn btn-light text-primary font-weight-bold" wire:click="enterMode('updateProductCategoryImageMode')">
          Edit
        </button>
      </div>
    </div>
    @if ($modes['updateProductCategoryImageMode'])
      <div>
        @livewire ('product-category.dashboard.product-category-edit-image', ['productCategory' => $productCategory,])
      </div>
    @else
      <div class="d-flex justify-content-between bg-white p-3">
        {{-- Product image --}}
        <div>
          @if ($productCategory->image_path)
            <img src="{{ asset('storage/' . $productCategory->image_path) }}" class="mr-3" style="width: 200px; height: 200px;">
          @else
            <div class="p-3">
              <i class="fas fa-th text-muted fa-8x"></i>
            </div>
          @endif
        </div>
      </div>
    @endif
  </div>

  {{-- Number of products --}}
  <div class="bg-white my-3 border">
    <div>
      <div class="d-flex justify-content-between border-bottom">
        <div class="px-3 py-3 o-heading">
          Number of products
        </div>
        <div class="d-flex flex-column justify-content-center px-3">
        </div>
      </div>
      <div class="d-flex justify-content-between">
        {{-- Product name --}}
        <div class="flex-grow-1">
          <div class="bg-white h-100">
            <h1 class="h6 p-3 font-weight-bold">
              {{ count($productCategory->products) }}
            </h1>
          </div>
        </div>
      </div>
    </div>
  </div>

  {{-- Product list --}}
  <div class="my-3 border bg-white">
    <div>
      <div class="border-bottom px-3 py-3 o-heading">
        Products
      </div>
      @if (count($productCategory->products) > 0)
        {{-- Product list --}}
        <div class="table-responsive bg-white pl-1">
          <table class="table">
            <tbody>
              @foreach ($productCategory->products as $product)
                <tr>
                  <td>
                    {{ $product->name }}
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      @else
        <div class="p-3">
          No products
        </div>
      @endif
    </div>
    <hr class="m-0 p-0"/>
  </div>

  {{-- Settings --}}
  <div class="bg-white my-3">
    <div class="border-bottom px-3 py-3 o-heading">
      Settings
    </div>
    {{-- Show in website setitng --}}
    <div class="px-3 py-2">
      <div class="font-weight-bold mb-3">
        Show in website
      </div>
      <div>
        @if ($productCategory->does_sell == 'yes')
          <i class="fas fa-check-circle text-success"></i>
          Yes
        @else
          <i class="fas fa-times-circle text-danger"></i>
          No
        @endif
        <div>
          <button class="btn text-primary pl-0" wire:click="toggleProductCategorySellability">
            Toggle
          </button>
        </div>
      </div>
    </div>
  </div>

</div>
