<div>


  <div class="bg-white p-3 border my-5 shadow-sm">
    <h1 class="h5 font-weight-bold mb-4 mt-2">
      Write product review
    </h1>

    <div class="form-group">
      <label class="m-0">Your name (optional)</label>
      <input type="text" class="form-control" wire:model.defer="writer_name" />
      @error('writer_name') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="form-group">
      <label class="m-0">Your info (optional)</label>
      <input type="text" class="form-control" wire:model.defer="writer_info" />
      @error('writer_info') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="form-group">
      <label class="m-0">Rating *</label>
      <input type="text" class="form-control" wire:model.defer="rating" />
      @error('rating') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="form-group">
      <label class="m-0">Review *</label>
      <textarea rows="5" class="form-control" wire:model.defer="review_text" ></textarea>
      @error('review_text') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="mb-2">
      <button class="btn btn-danger p-3" wire:click="store">
        Submit
      </button>
      @include ('partials.button-cancel', ['clickEmitEventName' => 'createProductReviewCancelled',])
    </div>
  </div>



</div>
