<div>

  @if (session()->has('message'))
    <div class="alert alert-success alert-dismissible fade show mx-3 my-2" role="alert">
      {{ session('message') }}
      We will call you soon.
      <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  @endif

  <div class="card">
    <div class="card-header p-3">
      <h2 class="text-success-rm">
        Order product
      </h2>
      <div class="text-secondary">
        Fill up your details to make an order. We will call you back soon.
      </div>
    </div>
    <div class="card-body">
      <div class="mb-3">
        <label>
          <i class="fas fa-phone mr-2"></i>
          Phone
          @error ('phone')
            <span class="text-danger">
              {{ $message }}
            </span>
          @enderror
        </label>
        <input class="p-3 w-100" type="text" style="height: 50px; width: 100%; color: #555;" wire:model="phone">
      </div>

      <div class="mb-3">
        <label>
          <i class="fas fa-map-marker-alt mr-2"></i>
          Address
        </label>
        <input class="p-3 w-100" type="text" style="height: 50px; width: 100%; color: #555;" wire:model="address">
      </div>

      <div class="row">
        <div class="col-md-6">
          <button class="btn btn-success mr-3 w-100" style="" wire:click="store">
            <i class="fas fa-shopping-cart mr-3"></i>
            CONFIRM
          </button>
        </div>
      </div>
    </div>
  </div>

</div>
