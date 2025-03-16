<div>

<div class="container-fluid p-0"
    style="
          background-image: @if ($cmsTheme)
            url({{ asset('storage/' . $cmsTheme->hero_image_path) }})
          @else
            url({{ asset('img/school-5.jpg') }})
          @endif
          ;
          background-size: cover;
          background-repeat: no-repeat;
          background-position: center;
        "
>
  <div class="o-darker">
  <div class="container py-5">
    <div class="text-white h2 o-heading text-center mb-4">
      Find you dream <u id="someElement"></u> property
    </div>
    <div class="bg-light py-5">
    <form action="{{ route('website-product-search') }}" method="GET">
        <div class="row mb-4" style="margin: auto;">
          <div class="col-md-4">
            <div class="form-group">
              <div class="mb-2">
                Property type
              </div>
              <div>
                <select class="form-control" name="product_category_id">
                  <option value="---">---</option>
                  @foreach ($productCategories as $productCategory)
                    <option value="{{ $productCategory->product_category_id}}">{{ $productCategory->name }}</option>
                  @endforeach
                </select>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <div class="mb-2">
                City
              </div>
              <div>
                <select class="form-control" name="city_product_specification_value">
                  <option value="---">---</option>
                  @if ($cityProductSpecifications != null && count($cityProductSpecifications) > 0)
                    @foreach ($cityProductSpecifications as $cityProductSpecification)
                      <option value="{{ $cityProductSpecification->spec_value }}">{{ $cityProductSpecification->spec_value }}</option>
                    @endforeach
                  @endif
                </select>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <div class="mb-2">
                Sell type
              </div>
              <div>
                <select class="form-control" name="buy_type_product_specification_value">
                  <option value="---">---</option>
                  @if ($buyTypeProductSpecifications != null && count($buyTypeProductSpecifications) > 0)
                    @foreach ($buyTypeProductSpecifications as $buyTypeProductSpecification)
                      <option value="{{ $buyTypeProductSpecification->spec_value }}">{{ $buyTypeProductSpecification->spec_value }}</option>
                    @endforeach
                  @endif
                </select>
              </div>
            </div>
          </div>
        </div>
        <div class="row mb-4" style="margin: auto;">
          <div class="col-md-4">
            <div class="form-group">
              <div class="mb-2">
                Featured product
              </div>
              <div>
                <select class="form-control" name="featured_product">
                  <option value="---">---</option>
                  <option value="yes">Yes</option>
                  <option value="no">No</option>
                </select>
              </div>
            </div>
          </div>
        </div>
        <div class="d-flex justify-content-center mt-4">
          <button class="btn btn-lg btn-success mr-4" type="submit">
            Search
          </button>
          <button class="btn btn-lg btn-dark">
            Clear
          </button>
        </div>
      </form>
    </div>
  </div>
  </div>
</div>

<script>
  function printLetterByLetter(destination, words, speed){
      var i = 0;
      var j = 0;
      var interval = setInterval(function(){
          // document.getElementById(destination).innerHTML += message.charAt(i);
          document.getElementById(destination).innerHTML += words[j].charAt(i);
          i++;
          if (i > words[j].length){
              // clearInterval(interval);
              document.getElementById(destination).innerHTML = " ";
              i = 0;
              j = j + 1;
          }
          if (j > 2) {
              j = 0;
          }
      }, speed);
  }
  var words = ['Land', 'Flat', 'Shop'];
  printLetterByLetter("someElement", words, 500);
  
</script>

</div>
