@if ($company->companyInfos()->where('info_key', 'Associated with')->first())
    <div class="container-fluid my-5 border-top">
      <div class="container">
        <h2 class="h6 font-weight-bold my-4 text-center">
          {{ $company->companyInfos()->where('info_key', 'Associated with')->first()->info_key }}
        </h2>
        <div class="row" style="margin: auto;">
          @foreach ($company->companyInfos()->where('info_key', 'Associated with')->get() as $companyInfo)
            <div class="col-6 col-md-3 font-weight-bold border-rm p-3 mb-0" style="font-family: Mono;">
              <div class="d-flex flex-column justify-content-center h-100">
                <div class="text-center mb-4">
                  {{ $companyInfo->info_value }}
                </div>
                @if ($companyInfo->image_path)
                  <img src="{{ asset('storage/' . $companyInfo->image_path) }}" class="img-fluid" style="{{--height: 75px;--}}">
                @else
                @endif
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </div>
@endif

<div class="border-top bg-white">


  {{-- Brand Info --}}
  @if (false)
  <div class="container-fluid py-3" style="{{-- background-color: #dcdcdc; --}}">
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <div class="">
            @if (true)
            <img src="{{ asset('storage/' . $company->logo_image_path) }}"
                class="img-fluid-rm"
                alt="{{ $company->name }} logo"
                style="height: 75px !important;">
            @endif
          </div>
        </div>
        <div class="col-md-4">
        </div>
        <div class="col-md-4">
        </div>
      </div>
      <div class="d-flex justify-content-center">
      </div>
    </div>
  </div>
  @endif

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
              @if (false)
              <i class="fas fa-phone mr-2"></i>
              @else
              <strong>
                <span class="text-muted">
                  PHONE
                </span>
              </strong>
              @endif
              </br>
              <strong>
                {{ $company->phone }}
              </strong>
            </div>


            <div class="mr-3 mb-2">
              @if (false)
              <i class="fas fa-envelope mr-2"></i>
              @else
              <strong>
                <span class="text-muted">
                  EMAIL
                </span>
              </strong>
              @endif
              </br>
              <strong>
                {{ $company->email }}
              </strong>
            </div>

            <div class="mr-3 mb-2">
              @if (false)
              <i class="fas fa-map-marker-alt mr-2"></i>
              @else
              <strong>
                <span class="text-muted">
              ADDRESS
                </span>
              </strong>
              @endif
              <br/>
              <strong>
              {{ $company->address }}
              </strong>
            </div>

            @if ($company->companyInfos()->where('info_key', 'Whatsapp')->first())
            <div class="mr-3 my-2">
              @if (false)
              <i class="fas fa-phone mr-2"></i>
              @else
              <strong>
                <span class="text-muted">
                    WHATSAPP
                </span>
              </strong>
              @endif
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

            @if (false)
            @if ($company->companyInfos()->where('info_key', 'Viber')->first())
            <div class="mr-3 mb-2">
              @if (false)
              <i class="fas fa-phone mr-2"></i>
              @else
              <strong>
                <span class="text-muted">
                    VIBER
                </span>
              </strong>
              @endif
              </br>
              <a aria-label="Chat on Viber" href="viber://contact?number=%2B{{ preg_replace('/[^0-9]/', '', $company->companyInfos()->where('info_key', 'Viber')->first()->info_value ) }}">
                <i class="fab fa-viber fa-2x mr-1" style="color: purple;"></i>
                <strong>
                  {{ $company->companyInfos()->where('info_key', 'Viber')->first()->info_value }}
                </strong>
              </a> 
            </div>
            @endif
            @endif
          </div>

        </div>

        <div class="col-md-4 py-4">
          @if (true)
          <h2 class="h5 text-dark font-weight-bold mb-3">
            About us
          </h2>
          <div class="mb-2">
            {{ $company->brief_description }}
          </div>
          @endif

          <div class="my-4">
            <a href="/contact-us" class="text-reset-rm text-decoration-none">Contact us</a>
            <br/>
            <a href="/post" class="text-reset-rm text-decoration-none">Blog</a>
            <br/>
            <a href="/write-testimonial" class="text-reset-rm text-decoration-none">Feedback</a>
          </div>
        </div>


        <div class="col-md-4 py-4">
          {{-- Subscribe us --}}
          @livewire ('ecomm-website.subscribe-us')

          @if (true)
          <h2 class="h5 my-3 font-weight-bold">
            Follow us
          </h2>
          @endif
          <div class="d-flex justify-content-center-rm mt-0">
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

          <hr />
          <div class="">
            @if (false)
            <img src="{{ asset('storage/' . $company->logo_image_path) }}"
                class="img-fluid-rm"
                alt="{{ $company->name }} logo"
                style="height: 75px !important;">
            @endif
          </div>

        </div>

      </div>
    </div>
  </div>

  <div class="container py-3">
    @if (true)
    <h2 class="h5 text-dark font-weight-bold mb-3">
      Product categories
    </h2>
    <div class="d-sm-flex-rm justify-content-center-rm" style="">
      @foreach (\App\ProductCategory::where('does_sell', 'yes')->get() as $productCategory)
        <a href="{{ route('website-product-category-product-list', [$productCategory->product_category_id, $productCategory->name]) }}"
            class="text-secondary text-decoration-none text-reset h5-rm mr-3">
          {{ $productCategory->name }}
        </a>
      @endforeach
    </div>
    @endif
  </div>

  <div class="container-fluid bg-info-rm border py-2 pb-2 text-white-rm" style="{{--background-color: #101530;--}}">
    <div class="container">
      <div class="d-flex justify-content-center">
        <div class="" style="color: #aaa;">
          <div>
            &copy; 2024
            {{ $company->name }}
            @if (false)
            |
            All rights reserved
            @endif
          </div>
          <div class="d-flex justify-content-center">
            Powered by
            <a href="https://oit.com.np" class="ml-1">
              OIT
            </a>
            <i class="fas fa-check-circle ml-2"></i> 
          </div>
        </div>
      </div>
    </div>
  </div>

</div>
