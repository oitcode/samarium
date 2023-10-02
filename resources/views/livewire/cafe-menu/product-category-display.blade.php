<div>


  <h1 class="h5 my-2 py-2">
    Products

    <i class="fas fa-angle-right mx-2"></i>
    {{ $productCategory->name }}

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

  {{-- Top tool bar --}}
  <div>
    <div>
      <div class="mt-0 p-2 border-rm d-flex justify-content-between {{ env('OC_ASCENT_BG_COLOR') }}-rm bg-light-rm  {{ env('OC_ASCENT_TEXT_COLOR')
      }}-rm border"
          style="background-color: #dadada;">
        <div class="my-5-rm">
        </div>

        <div>
          <button class="btn btn-light" wire:click="$refresh">
            <i class="fas fa-refresh fa-2x-rm"></i>
            @if (false)
            Refresh
            @endif
          </button>

          <button class="btn btn-light" wire:click="$emit('productCategoryDisplayCancelled')">
            <i class="fas fa-times fa-2x-rm"></i>
            @if (false)
            Close
            @endif
          </button>
        </div>

      </div>
    </div>
  </div>


  <div class="px-3-rm bg-white-rm border-rm shadow-rm">
    <div class="bg-success-rm text-white-rm">
      <div class="p-3 bg-light text-secondary font-weight-bold mr-5-rm pt-3 pb-1">
        Product Category Name
      </div>
      <div class="d-flex justify-content-between">
        {{-- Product name --}}
        <div class="d-flex-rm flex-grow-1">
          <div class="bg-white h-100">
            <h1 class="h5 text-primary-rm p-3">
              {{ $productCategory->name }}
            </h1>
          </div>
        </div>
        <div>
          <button class="btn btn-light h-100" wire:click="enterMode('updateProductNameMode')">
            <i class="fas fa-pencil-alt"></i>
          </button>
        </div>
      </div>
    </div>
    @if (true)
    <hr class="m-0 p-0"/>
    @endif

  </div>

  <div class=" bg-white-rm border-rm shadow-rm">
    <div class="bg-success-rm text-white-rm">
      <div class="p-3 bg-light text-secondary font-weight-bold mr-5-rm pt-3 pb-1">
        Number of products
      </div>
      <div class="d-flex justify-content-between">
        {{-- Product name --}}
        <div class="d-flex-rm flex-grow-1">
          <div class="bg-white h-100">
            <h1 class="h5 text-primary-rm p-3">
              {{ count($productCategory->products) }}
            </h1>
          </div>
        </div>
        <div>
          @if (false)
          <button class="btn btn-light h-100" wire:click="enterMode('updateProductNameMode')">
            <i class="fas fa-pencil-alt"></i>
          </button>
          @endif
        </div>
      </div>
    </div>
    @if (true)
    <hr class="m-0 p-0"/>
    @endif

  </div>

</div>
