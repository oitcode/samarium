<div class="card shadow-sm w-100">
  <div class="card-header bg-success" style="{{--background-color: orange;--}}">
    <h1 class="text-white" style="font-size: 1.8rem;">
      Edit Product Category
    </h1>
  </div>
  <div class="card-body p-0">
    <div class="table-responsive mb-0">
      <table class="table table-bordered mb-0">
        <tbody>


          <tr style="font-size: 1.3rem; height: 50px;">
            <td class="w-50 p-0 bg-info-rm font-weight-bold">
              <span class="ml-4">
                NAME
              </span>
            </td>
            <td class="p-0 h-100 bg-warning font-weight-bold">
              <input class="w-100 h-100 font-weight-bold @error('name') border-danger @enderror" type="text" wire:model.defer="name" />
            </td>
          </tr>

          <tr style="font-size: 1.3rem; height: 50px;">
            <td class="w-50 p-0 bg-info-rm p-0 font-weight-bold">
              <span class="ml-4">
                IMAGE
              </span>
            </td>
              
            <td class="p-0 h-100 font-weight-bold  @error('image') border-danger @enderror">
              <img src="{{ asset('storage/' . $productCategory->image_path) }}" class="img-fluid">
            </td>

          </tr>

          <tr style="font-size: 1.3rem; height: 50px;">
            <td class="w-50 p-0 bg-info-rm p-0 font-weight-bold">
              <span class="ml-4">
                NEW IMAGE
              </span>
            </td>
              
            <td class="p-0 h-100 font-weight-bold  @error('image') border-danger @enderror">
              <input type="file" class="w-100 h-100" wire:model="image">
            </td>

          </tr>
        </tbody>
      </table>
    </div>

    <div class="p-3 m-0" {{--style="background-image: linear-gradient(to right, white, #abc);"--}}>
      <button class="btn btn-lg btn-success mr-3" wire:click="update" style="{{--width: 130px; height: 80px; font-size: 1.3rem;--}}">
        UPDATE
      </button>

      <button class="btn btn-lg btn-danger" wire:click="$emit('exitUpdateProductCategoryMode')" style="{{--width: 120px; height: 80px; font-size: 1.3rem;--}}">
        CANCEL
      </button>

      <button wire:loading class="btn">
        <span class="spinner-border text-info mr-3" role="status">
        </span>
      </button>
    </div>
  </div>
</div>
