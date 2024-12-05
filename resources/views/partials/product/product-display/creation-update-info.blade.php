{{-- Creation and update info --}} 
<div class="border bg-white p-3 my-3">
  <div class="mb-4">
    <h3 class="h5"> Product history </h3>
  </div>
  @if (false)
  <div class="row">
    <div class="col-3">
      Created by
    </div>
    <div class="col-6">
      xx
    </div>
  </div>
  @endif
  <div class="row">
    <div class="col-1">
      Created at
    </div>
    <div class="col-6">
      {{ $product->created_at }}
    </div>
  </div>
  <div class="row">
    <div class="col-1">
      Updated at
    </div>
    <div class="col-6">
      {{ $product->updated_at }}
    </div>
  </div>
</div>
