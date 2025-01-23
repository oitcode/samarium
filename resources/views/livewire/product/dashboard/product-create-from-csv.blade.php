<div class="card">


  <div class="card-body p-3">
    <h1 class="h5 font-weight-bold mb-4">Upload products from file</h1>
  
    <div wire:loading class="text-primary">
      <div class="spinner-border text-primary" role="status">
      </div>
       Processing ...
    </div>
  
    <div class="form-group my-4">
      <label class="h5 mb-2">File *</label>
      <input type="file" class="form-control pl-0 border-0" wire:model.live="products_file">
      @error('products_file') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
  
    @if ($startMode)
      @include ('partials.button-general', ['btnText' => 'Upload', 'clickMethod' => 'preview',])
    @elseif ($previewMode)
      <button type="submit" class="btn btn-primary" wire:click="importFromFile">Import</button>
      @include ('partials.button-general', ['btnText' => 'Import', 'clickMethod' => 'preview',])
    @endif
    @include ('partials.button-cancel', ['clickEmitEventName' => 'exitCreateProductFromCsvMode',])
  
    @if ($previewMode)
  
      Total Lines {{ $totLines }}
      <br />
  
      <table class="table table-sm table-hover table-striped">
        <thead>
          <tr class="bg-light table-info">
            <th>#</th>
            <th>Product name</th>
            <th>Category</th>
            <th>Description</th>
            <th>Selling price</th>
          </tr>
        <thead>
        <tbody>
          @foreach ($lines as $line)
            <tr>
              <td>
                {{ $loop->iteration }}
              </td>
              @foreach ($line as $value)
                <td>{{ $value }}</td>
              @endforeach
            </tr>
          @endforeach
        </tbody>
      </table>
    @endif
  </div>


</div>
