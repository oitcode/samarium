<div>
  <div class="form-group">
    <select class="form-control" wire:model="webpage_category_id">
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
    @include ('partials.button-store')
    @include ('partials.button-cancel', ['clickEmitEventName' => 'webpageEditWebpageCategoryCancel',])
    @include ('partials.dashboard.spinner-button')
  </div>
</div>
