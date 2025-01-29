<div>

  <div class="my-3">
    <div>
      <div class="form-group">
        <label>Num of rows</label>
        <select class="form-control">
          <option value="2">2</option>
          <option value="2">3</option>
          <option value="2">4</option>
        </select>
      </div>
    </div>
  </div>

  <div class="row">
    @for ($i = 0; $i < $numOfRows; $i++)
      <div class="col-md-4 p-3">
        <div class="p-3 border">

          <div class="form-group">
            <label>Image</label>
            <input type="file" class="form-control" wire:model="contents.{{ $i }}.image">
            @error('image') <span class="text-danger">{{ $message }}</span> @enderror
          </div>

          <div class="form-group">
            <input type="text" class="form-control" wire:model="contents.{{ $i }}.heading" />
          </div>

          <div class="form-group">
            <textarea rows="5" class="form-control" wire:model="contents.{{ $i }}.paragraph" />
            </textarea>
          </div>
        </div>
      </div>
    @endfor
  </div>

  <div class="p-3">
    <button class="btn btn-success" wire:click="store">
      Save
    </button>
  </div>

</div>
