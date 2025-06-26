{{-- Creation and update info --}} 
<div class="border bg-white p-3 my-3 o-border-radius">
  <div class="mb-4">
    <h2 class="h6 o-heading">
      Product history
    </h2>
  </div>
  <div class="row">
    <div class="col-6">
      Created at:
      &nbsp;&nbsp;&nbsp;
      {{ $product->created_at }}
    </div>
    <div class="col-6">
    </div>
  </div>
  <div class="row">
    <div class="col-6">
      Updated at:
      &nbsp;&nbsp;
      {{ $product->updated_at }}
    </div>
    <div class="col-6">
    </div>
  </div>
</div>
