<div class="border-top bg-white">

  {{--
  |
  | Brand Info
  |
  --}}
  <div class="container-fluid" style="background-color: #ececec;">
    <div class="container">
      <div class="row">
        <div class="col-md-4 py-4">
          <div class="">
            <div class="">
              <div class="d-flex flex-column mb-3">
                <div class="" style="">
                  <h2 class="h1 text-dark font-weight-bold">
                    {{ $company->name }}
                  </h2>
                </div>
              </div>
            </div>
          </div>

          <div class="d-flex flex-column justify-content-center">
            <div class="mr-3 mb-2">
              <strong>
                <span class="text-muted">
                  PHONE
                </span>
              </strong>
              </br>
              <strong>
                {{ $company->phone }}
              </strong>
            </div>

            <div class="mr-3 mb-2">
              <strong>
                <span class="text-muted">
                  EMAIL
                </span>
              </strong>
              </br>
              <strong>
                {{ $company->email }}
              </strong>
            </div>

            <div class="mr-3 mb-2">
              <strong>
                <span class="text-muted">
              ADDRESS
                </span>
              </strong>
              <br/>
              <strong>
              {{ $company->address }}
              </strong>
            </div>

            @if ($company->companyInfos()->where('info_key', 'Whatsapp')->first())
            <div class="mr-3 my-2">
              <strong>
                <span class="text-muted">
                    WHATSAPP
                </span>
              </strong>
              </br>
              <a aria-label="Chat on WhatsApp"
                  href="https://wa.me/{{ preg_replace("/[^0-9]/", "", $company->companyInfos()->where('info_key', 'Whatsapp')->first()->info_value ) }}"
                  class="text-reset">

                <i class="fab fa-whatsapp fa-2x mr-1 text-success"></i>
                <strong>
                  Send whatsapp message
                </strong>
              </a> 
            </div>
            @endif
          </div>
        </div>

        <div class="col-md-4 py-4">
          <h2 class="h5 text-dark font-weight-bold mb-3">
            About us
          </h2>
          <div class="mb-2">
            {{ $company->brief_description }}
          </div>

          <div class="my-4">
            <a href="/contact-us" class="text-decoration-none">Contact us</a>
            <br/>
            <a href="/post" class="text-decoration-none">Blog</a>
            <br/>
            <a href="/write-testimonial" class="text-decoration-none">Feedback</a>
          </div>
        </div>

        <div class="col-md-4 py-4">
          {{-- Subscribe us --}}
          @livewire ('ecomm-website.subscribe-us')

          <h2 class="h5 my-3 font-weight-bold">
            Follow us
          </h2>
          <div class="d-flex mt-0">
            @if ($company->fb_link)
              <div class="mr-3">
                <a href="{{ $company->fb_link }}" target="_blank">
                  <i class="fab fa-facebook fa-2x text-primary"></i>
                </a>
              </div>
            @endif
            @if ($company->twitter_link)
              <div class="mr-3">
                <a href="{{ $company->twitter_link }}" target="_blank">
                  <i class="fab fa-twitter fa-2x text-info"></i>
                </a>
              </div>
            @endif
            @if ($company->insta_link)
              <div class="mr-3">
                <a href="{{ $company->insta_link }}" target="_blank">
                  <i class="fab fa-instagram fa-2x text-danger"></i>
                </a>
              </div>
            @endif
            @if ($company->youtube_link)
              <div class="mr-3">
                <a href="{{ $company->youtube_link }}" target="_blank">
                  <i class="fab fa-youtube fa-2x text-danger"></i>
                </a>
              </div>
            @endif
            @if ($company->tiktok_link)
              <div class="mr-3">
                <a href="{{ $company->tiktok_link }}" target="_blank">
                  <i class="fab fa-tiktok fa-2x text-danger"></i>
                </a>
              </div>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>

  @if ($company->companyInfos()->where('info_key', 'Associated with')->first())
      <div class="container-fluid border-top border-bottom">
        <div class="container">
          <h2 class="h5 font-weight-bold my-4">
            {{ $company->companyInfos()->where('info_key', 'Associated with')->first()->info_key }}
          </h2>
          <div class="row" style="margin: auto;">
            @foreach ($company->companyInfos()->where('info_key', 'Associated with')->get() as $companyInfo)
              <div class="col-6 col-md-3 font-weight-bold p-3 mb-0" style="font-family: Mono;">
                <div class="d-flex flex-column justify-content-between">
                  <div class="flex-grow-1">
                    <div class="d-flex flex-column justify-content-center h-100">
                      <div class="d-flex justify-content-center">
                        @if ($companyInfo->image_path)
                          <img src="{{ asset('storage/' . $companyInfo->image_path) }}" class="img-fluid" style="max-height: 150px; max-width: 150px;">
                        @else
                        @endif
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            @endforeach
          </div>
        </div>
      </div>
  @endif

  <div class="container py-3">
    <h2 class="h5 text-dark font-weight-bold mb-3">
      Product categories
    </h2>
    <div>
      @foreach (\App\ProductCategory::where('does_sell', 'yes')->get() as $productCategory)
        <a href="{{ route('website-product-category-product-list', [$productCategory->product_category_id, $productCategory->name]) }}"
            class="text-secondary text-decoration-none text-reset mr-3">
          {{ $productCategory->name }}
        </a>
      @endforeach
    </div>
  </div>


  {{--
  |
  | Copyright information
  |
  --}}
  <div class="container-fluid border py-2 pb-2" style="{{--background-color: #101530;--}}">
    <div class="container">
      <div class="d-flex justify-content-center">
        <div class="" style="color: #aaa;">
          <div>
            &copy; 2025
            {{ $company->name }}
          </div>
          <div class="d-flex justify-content-center">
            Powered by
            <a href="https://github.com/oitcode/samarium" class="ml-1">
              Samarium
            </a>
            <i class="fas fa-check-circle ml-2"></i> 
          </div>
        </div>
      </div>
    </div>
  </div>

</div>
