<div>


    <div class="row">
      @foreach ($webpages as $webpage)
        <div class="col-md-6 p-3 mb-0 pt-0">

          <div class="bg-white border p-3">

            <h2 class="h4 font-weight-bold mb-1">
              {{ \Illuminate\Support\Str::limit($webpage->name, 25, $end=' ...') }}
            </h2>

            <div class="text-secondary">
              Published on:
              {{ \App\Traits\NepaliDateTrait::convertEnglishToNepaliDate($webpage->created_at->toDateString(), 'english')  }}
              2081
            </div>

            @if (false)
            <div class="my-3">
              Lorem ipsum dolor emit enum enit orum vinis omer ipsum lorem dolor. 
              Lorem ipsum dolor emit enum enit orum vinis omer ipsum lorem dolor. 
              Lorem ipsum dolor emit enum enit orum vinis omer ipsum lorem dolor. 
            </div>
            @endif

            <div class="d-flex justify-content-end">
              <a href="{{ route('website-webpage-' . $webpage->permalink) }}" class="btn btn-danger">
                Read more 
              </a>
            </div>

          </div>


        </div>
      @endforeach
    </div>


</div>
