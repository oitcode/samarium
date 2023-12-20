<div>


  <div class="bg-white border p-3">
    <div class="mt-3-rm mb-3 h5 font-weight-bold border-rm bg-light-rm py-3" {{-- style="border-left: 5px solid #05a;" --}}>
      <i class="fas fa-cogs mr-3 text-secondary"></i>
      {{ \Illuminate\Support\Str::limit($testimonial->body, 100, $end=' ...') }}
    </div>

    <div class="">
      <div class="row" style="margin: auto;">
        <div class="col-md-3 border p-3 bg-light font-weight-bold">
          Testimonial
        </div>
        <div class="col-md-9 border p-3">
          {{ $testimonial->body }}
        </div>
      </div>
    </div>

    <div class="">
      <div class="row" style="margin: auto;">
        <div class="col-md-3 border p-3 bg-light font-weight-bold">
          Testimonial ID
        </div>
        <div class="col-md-9 border p-3">
          {{ $testimonial->testimonial_id }}
        </div>
      </div>
    </div>

    <div class="">
      <div class="row" style="margin: auto;">
        <div class="col-md-3 border p-3 bg-light font-weight-bold">
          Posted Date
        </div>
        <div class="col-md-9 border p-3">
          {{ $testimonial->created_at->toDateString() }}
        </div>
      </div>
    </div>

    <div class="">
      <div class="row" style="margin: auto;">
        <div class="col-md-3 border p-3 bg-light font-weight-bold">
          Writer name
        </div>
        <div class="col-md-9 border p-3">
          {{ $testimonial->writer_name }}
        </div>
      </div>
    </div>

    <div class="">
      <div class="row" style="margin: auto;">
        <div class="col-md-3 border p-3 bg-light font-weight-bold">
          Writer info
        </div>
        <div class="col-md-9 border p-3">
          {{ $testimonial->writer_info }}
        </div>
      </div>
    </div>

    <div class="">
      <div class="row" style="margin: auto;">
        <div class="col-md-3 border p-3 bg-light font-weight-bold">
          Status
        </div>
        <div class="col-md-9 border p-3 flex-grow-1-rm">
          Active
        </div>
      </div>
    </div>

  </div>


  <div class="bg-white border p-3 my-3">
    @if (false)
    {{-- Danger zone --}}
    <div class="mb-3">
      <strong>
        Danger zone
      </strong>
    </div>
    @endif

    <div class="col-md-6 p-0 border border-secondary-rm rounded">

      {{-- Delete event --}}
      <div class="">
        <div class="d-flex justify-content-between p-3">
          <div>
            <div class="">
              <strong>
                Delete this testimonial
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
