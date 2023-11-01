<div>


  <div class="bg-white p-3 border my-5 shadow-lg">
    <h1 class="h5 font-weight-bold mb-4 mt-2">
      Write testimonial
    </h1>

    <div class="form-group">
      <label class="m-0">Your name (optional)</label>
      <input type="text" class="form-control" wire:model.defer="writer_name" />
    </div>

    <div class="form-group">
      <label class="m-0">Your info (optional)</label>
      <input type="text" class="form-control" wire:model.defer="writer_info" />
    </div>

    @if (false)
    <div class="mb-0 bg-warning-rm p-0">
      <label class="p-0 m-0">Email</label>
    </div>
    <input type="text" class="m-0 p-0" />
    <br/>
    <br/>

    <div class="mb-0 bg-warning-rm p-0">
      <label class="p-0 m-0">Phone</label>
    </div>
    <input type="text" />
    <br/>
    <br/>
    @endif

    <div class="form-group">
      <label class="m-0">Testimonial *</label>
      <textarea rows="5" class="form-control" wire:model.defer="body" ></textarea>
    </div>

    <div class="mb-2">
      <button class="btn btn-danger p-3" wire:click="store">
        Submit
      </button>
    </div>
  </div>



</div>
