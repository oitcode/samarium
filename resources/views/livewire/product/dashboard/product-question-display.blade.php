<div>


  {{--
  |
  | Toolbar.
  |
  --}}

  <x-toolbar-component>
    <x-slot name="toolbarInfo">
      Product question
      <i class="fas fa-angle-right mx-2"></i>
      {{ $productQuestion->product_question_id }}
    </x-slot>
    <x-slot name="toolbarButtons">
      <x-toolbar-button-component btnBsClass="btn-light" btnClickMethod="$refresh">
        <i class="fas fa-refresh"></i>
      </x-toolbar-button-component>
      <x-toolbar-button-component btnBsClass="btn-danger" btnClickMethod="$dispatch('exitProductQuestionDisplay')">
        <i class="fas fa-times"></i>
        Close
      </x-toolbar-button-component>
    </x-slot>
  </x-toolbar-component>

  <div class="bg-white border p-3">
    <div class="mb-3 h5 font-weight-bold py-3">
      {{ \Illuminate\Support\Str::limit($productQuestion->question_text, 100, $end=' ...') }}
    </div>

    <div>
      <div class="row" style="margin: auto;">
        <div class="col-md-3 border p-3 bg-light font-weight-bold">
          Product
        </div>
        <div class="col-md-9 border p-3">
          {{ $productQuestion->product->name }}
        </div>
      </div>
    </div>

    <div>
      <div class="row" style="margin: auto;">
        <div class="col-md-3 border p-3 bg-light font-weight-bold">
          Product question
        </div>
        <div class="col-md-9 border p-3">
          {{ $productQuestion->question_text }}
        </div>
      </div>
    </div>

    <div>
      <div class="row" style="margin: auto;">
        <div class="col-md-3 border p-3 bg-light font-weight-bold">
          Product question ID
        </div>
        <div class="col-md-9 border p-3">
          {{ $productQuestion->product_question_id }}
        </div>
      </div>
    </div>

    <div>
      <div class="row" style="margin: auto;">
        <div class="col-md-3 border p-3 bg-light font-weight-bold">
          Posted Date
        </div>
        <div class="col-md-9 border p-3">
          {{ $productQuestion->created_at->toDateString() }}
        </div>
      </div>
    </div>

    <div>
      <div class="row" style="margin: auto;">
        <div class="col-md-3 border p-3 bg-light font-weight-bold">
          Writer name
        </div>
        <div class="col-md-9 border p-3">
          {{ $productQuestion->writer_name }}
        </div>
      </div>
    </div>

    <div>
      <div class="row" style="margin: auto;">
        <div class="col-md-3 border p-3 bg-light font-weight-bold">
          Writer info
        </div>
        <div class="col-md-9 border p-3">
          {{ $productQuestion->writer_info }}
        </div>
      </div>
    </div>

  </div>


  {{-- Delete product question --}}
  <div class="bg-white border p-3 my-3">
    <div class="col-md-6 p-0 border rounded">
      <div>
        <div class="d-flex justify-content-between p-3">
          <div>
            <div class="">
              <strong>
                Delete this product question
              </strong>
            </div>
            <div>
              Once you delete, it cannot be undone. Please be sure.
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


</div>
