<div>

  <div class="my-3">
    <div class="">
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
            <i class="fas fa-image"></i>
            @if (false)
            <input type="file" class="form-control" />
            @endif
          </div>

          <div class="form-group">
            <input type="text" class="form-control" />
          </div>

          <div class="form-group">
            <textarea rows="5" class="form-control">
            </textarea>
          </div>
        </div>
      </div>
    @endfor

  </div>

  <div class="p-3">
    <button class="btn btn-success"> 
      Save
    </button>
  </div>

</div>
