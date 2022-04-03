<div class="card shadow-sm w-100">
  <div class="card-header bg-success-rm" style="{{--background-color: orange;--}}">
    <h1 class="text-white-rm" style="font-size: 1.3rem;">
      Edit Product
    </h1>
  </div>
  <div class="card-body p-0">
    <div class="table-responsive mb-0">
      <table class="table table-bordered mb-0">
        <tbody>


          <tr style="font-size: 1.3rem; height: 50px;">
            <td class="w-50 p-0 bg-info-rm font-weight-bold">
              <span class="ml-4">
                Name
              </span>
            </td>
            <td class="p-0 h-100 bg-warning font-weight-bold">
              <input class="w-100 h-100 font-weight-bold @error('name') border-danger @enderror" type="text" wire:model.defer="name" />
            </td>
          </tr>

          <tr style="font-size: 1.3rem; height: 50px;">
            <td class="w-50 p-0 bg-info-rm font-weight-bold">
              <span class="ml-4">
                CateGORY
              </span>
            </td>
            <td class="p-0 h-100 bg-warning font-weight-bold">
              <select class="w-100 h-100 custom-control border" wire:model.defer="product_category_id" wire:change="">
                <option>---</option>

                @foreach ($productCategories as $productCategory)
                  <option value="{{ $productCategory->product_category_id }}">
                    {{ $productCategory->name }}
                  </option>
                @endforeach
              </select>
            </td>
          </tr>


          <tr style="font-size: 1.3rem; height: 50px;">
            <td class="w-50 p-0 bg-info-rm font-weight-bold">
              <span class="ml-4">
                Description
              </span>
            </td>
            <td class="p-0 h-100 bg-warning font-weight-bold">
              <textarea row="5" class="w-100 h-100 font-weight-bold @error('description') border-danger @enderror" type="text"
                wire:model.defer="description" />
              </textarea>
            </td>
          </tr>

          <tr style="font-size: 1.3rem; height: 50px;">
            <td class="w-50 p-0 bg-info-rm font-weight-bold">
              <span class="ml-4">
                Price
              </span>
            </td>
            <td class="p-0 h-100 bg-warning font-weight-bold">
              <input class="w-100 h-100 font-weight-bold @error('selling_price') border-danger @enderror" type="text" wire:model.defer="selling_price" />
            </td>
          </tr>

          <tr style="font-size: 1.3rem; height: 50px;">
            <td class="w-50 p-0 bg-info-rm font-weight-bold">
              <span class="ml-4">
                Stock count
              </span>
            </td>
            <td class="p-0 h-100 bg-warning font-weight-bold">
              <input class="w-100 h-100 font-weight-bold @error('stock_count') border-danger @enderror" type="text" wire:model.defer="stock_count" />
            </td>
          </tr>

          <tr style="font-size: 1.3rem; height: 50px;">
            <td class="w-50 p-0 bg-info-rm p-0 font-weight-bold">
              <span class="ml-4">
                Image
              </span>
            </td>
              
            <td class="p-0 h-100 font-weight-bold  @error('image') border-danger @enderror">
              <img src="{{ asset('storage/' . $product->image_path) }}" class="img-fluid">
            </td>

          </tr>

          <tr style="font-size: 1.3rem; height: 50px;">
            <td class="w-50 p-0 bg-info-rm p-0 font-weight-bold">
              <span class="ml-4">
                New image
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
        Update
      </button>

      <button class="btn btn-lg btn-danger" wire:click="$emit('exitUpdateProductMode')" style="{{--width: 120px; height: 80px; font-size: 1.3rem;--}}">
        Cancel
      </button>

      <button wire:loading class="btn">
        <span class="spinner-border text-info mr-3" role="status">
        </span>
      </button>
    </div>
  </div>
</div>
