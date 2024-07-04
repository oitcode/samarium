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

  <div class="d-flex justify-content-between bg-dark-rm text-white-rm py-1 border-rm">
    {{-- Breadcrumb --}}
    <div class="my-2 py-2">
      Product category

      <i class="fas fa-angle-right mx-2"></i>
      {{ $productCategory->name }}
    </div>

    {{-- Top tool bar --}}
    <div>
      <div>
        <div class="mt-0 p-2 d-flex justify-content-between border-rm"
            style="{{-- background-color: #dadada; --}}">

          <div>
            <button class="btn btn-light" wire:click="$refresh">
              <i class="fas fa-refresh"></i>
            </button>

            <button class="btn btn-outline-danger" wire:click="$emit('productCategoryDisplayCancelled')">
              <i class="fas fa-times"></i>
              Close
            </button>
          </div>

        </div>
      </div>
    </div>
  </div>


  {{-- Product category name --}}
  <div class="bg-white mb-3 border">
    <div class="">
      <div class="d-flex justify-content-between border-bottom">
        <div class="px-3 py-3">
            Product Category Name
        </div>
        <div class="d-flex flex-column justify-content-center px-3-rm">
          <button class="btn btn-light text-primary font-weight-bold" wire:click="enterMode('updateProductCategoryNameMode')">
            @if (false)
            <i class="fas fa-pencil-alt mr-2"></i>
            @endif
            Edit
          </button>
        </div>
      </div>
      @if ($modes['updateProductCategoryNameMode'])
        <div>
          @livewire ('product-category.product-category-edit-name', ['productCategory' => $productCategory,])
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
      <div class="px-3 py-3">
          Product Category Image
      </div>
      <div class="d-flex flex-column justify-content-center px-3-rm">
        <button class="btn btn-light text-primary font-weight-bold" wire:click="enterMode('updateProductCategoryImageMode')">
          @if (false)
          <i class="fas fa-pencil-alt mr-2"></i>
          @endif
          Edit
        </button>
      </div>
    </div>
    @if ($modes['updateProductCategoryImageMode'])
      <div>
        @livewire ('product-category.product-category-edit-image', ['productCategory' => $productCategory,])
      </div>
    @else
      <div class="d-flex justify-content-between bg-white p-3">
        {{-- Product image --}}
        <div class="">
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

    <div class="">
      <div class="d-flex justify-content-between border-bottom">
        <div class="px-3 py-3">
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
      <div class="border-bottom px-3 py-3">
          Products
      </div>
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
    </div>
    @if (true)
    <hr class="m-0 p-0"/>
    @endif
  </div>


  {{-- Settings --}}
  <div class="bg-white my-3">
    <div class="border-bottom px-3 py-3">
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
