<div>
    <div class="form-group">
      <select class="form-control" wire:model.defer="webpage_category_id">
        <option value="---">---</option>
        @foreach ($webpageCategories as $category)
          <option value="{{ $category->webpage_category_id }}">{{ $category->name }}</option>
        @endforeach
      </select>
      @error ('webpage_category_id')
        <div class="text-danger">
          {{ $message }}
        </div>
      @enderror
    </div>

    <div class="my-3">
      <button class="btn btn-sm btn-success" wire:click="store">
        Save
      </button>
      <button class="btn btn-sm btn-danger" wire:click="$emit('webpageEditWebpageCategoryPostpageCancel')">
        Cancel
      </button>
    </div>
</div>
