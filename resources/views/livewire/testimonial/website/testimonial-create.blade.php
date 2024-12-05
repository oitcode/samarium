<div>


  <div class="bg-white p-3 border my-5 shadow-lg">
    <h1 class="h5 font-weight-bold mb-4 mt-2">
      Write testimonial
    </h1>

    <div class="form-group">
      <label class="m-0">Your name (optional)</label>
      <input type="text" class="form-control" wire:model="writer_name" />
    </div>

    <div class="form-group">
      <label class="m-0">Your info (optional)</label>
      <input type="text" class="form-control" wire:model="writer_info" />
    </div>

    <div class="form-group">
      <label class="m-0">Testimonial *</label>
      <textarea rows="5" class="form-control" wire:model="body" ></textarea>
    </div>

    <div class="mb-2">
      <button class="btn btn-danger p-3" wire:click="store">
        Submit
      </button>
    </div>
  </div>



</div>
