<div>

  <div class="bg-white border p-3 mb-4">
    <div class="mb-4">
      <input type="text"
          class="mr-5 h-100 form-control w-50"
          style="{{-- height: 50px; --}} font-size: 1.5rem; background-color: #cfc;"
          wire:model.defer="search_product_category"
          wire:keydown.enter="searchProductCategory">
    </div>
    <div>
      @include ('partials.button-general', ['clickMethod' => "searchProductCategory", 'btnText' => 'Search',])
    </div>
  </div>

  <div class="p-3 bg-white border">
    @for ($i=0; $i<5; $i++)
      <div class="row py-3 @if ($i % 2 == 0) o-darker @endif">
        <div class="col-md-2">
          <i class="fas fa-edit fa-3x mr-2"></i>
        </div>
        <div class="col-md-2">
          TVS Victor
          <br />
          Alpha beta gamma
        </div>
        <div class="col-md-4">
          Rs 5,500
        </div>
        <div class="col-md-4">
          2023 July 12
        </div>
      </div>
    @endfor

  </div>
</div>
