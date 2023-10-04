<div class="row-rm p-3-rm justify-content-between-rm bg-light-rm mb-4" style="margin: auto;">

  <div class="col-6-rm col-md-3-rm mr-3-rm mb-3 p-0 pr-3">
    <button class="btn btn-light p-3 w-100" wire:click="enterModeSilent('addItem')">
      <i class="fas fa-plus-circle mr-3"></i>
      <br/>
      Add item
    </button>
  </div>

  <div class="col-6-rm col-md-3-rm mr-3-rm mb-3 p-0 pr-3">
    <a href="{{ route('cafesale') }}" class="btn btn-light p-3 w-100">
      <i class="fas fa-print mr-3"></i>
      <br/>
      Print
    </a>
  </div>

  <div class="col-6-rm col-md-3-rm mr-3-rm mb-3 p-0 pr-3">
    <a href="{{ route('cafesale') }}" class="btn btn-light p-3 w-100">
      <i class="fas fa-trash-alt mr-3"></i>
      <br/>
      Delete
    </a>
  </div>

</div>
