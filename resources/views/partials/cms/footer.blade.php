<div>
  <div class="row">
  
    <div class="col-md-6" style="font-size: 1.3rem;">
      @if (false)
      <div class="mb-3" style="font-size: 1.3rem; font-weight: bold;">
        Address
      </div>
      @endif
      <div class="mb-3">
        <div class="d-flex">
          @if (false)
          <i class="fas fa-map-marker-alt mr-3"></i>
          @endif
          {{ $company->name }}
        </div>
      </div>
      <div class="mb-1" style="font-size: 1rem;">
        <div class="d-flex">
          <i class="fas fa-phone mr-3"></i>
          {{ $company->phone }}
        </div>
      </div>
      <div class="mb-1" style="font-size: 1rem;">
        <div class="d-flex">
          <i class="fas fa-envelope mr-3"></i>
          {{ $company->email }}
        </div>
      </div>
      <div class="mb-4" style="font-size: 1rem;">
        <div class="d-flex">
          <i class="fas fa-map-marker-alt mr-3"></i>
          {{ $company->address }}
        </div>
      </div>

      @if (false)
      <div class="d-flex my-1" style="font-size: 1rem;">
        <div class="mr-3">
          <i class="fas fa-angle-right mr-3"></i>
          PAN No
        </div>
        <div>
          {{ $company->pan_number }}
        </div>
      </div>
      @endif

      {{-- Show additional company info if any --}}
      @if (count($company->companyInfos) > 0)
        <div class="mb-4" style="font-size: 1rem;">
          @foreach ($company->companyInfos as $companyInfo)
            <div class="d-flex">
              <div class="mr-3">
                <i class="fas fa-angle-right mr-3"></i>
                {{ $companyInfo->info_key }}
              </div>
              <div>
                {{ $companyInfo->info_value }}
              </div>
            </div>
          @endforeach
        </div>
      @endif

    </div>
  
    @if (true)
    <div class="col-md-3">
      @if (true)
      <h2 class="h5 text-dark-rm font-weight-bold mb-3">
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
    @endif

    @if (true)
    <div class="col-md-3">
      <div class="mb-3" style="font-size: 1.3rem; font-weight: bold;">
        Follow us
      </div>
      <div>
        @if ($company->fb_link)
          <a href="{{ $company->fb_link }}" target="_blank">
            <i class="fab fa-facebook fa-2x mr-2 "
                style="
                  color:
                      @if (\App\CmsTheme::first())
                        {{ \App\CmsTheme::first()->footer_text_color }}
                      @else
                        white
                      @endif
                      ;
                "></i>
          </a>
        @endif
        @if ($company->twitter_link)
          <a href="{{ $company->twitter_link }}" class="text-reset" target="_blank">
            <i class="fab fa-twitter fa-2x mr-2 "></i>
          </a>
        @endif
        @if ($company->insta_link)
          <a href="{{ $company->insta_link }}" class="text-reset" target="_blank">
            <i class="fab fa-instagram fa-2x mr-2 "></i>
          </a>
        @endif
        @if ($company->youtube_link)
          <a href="{{ $company->youtube_link }}" class="text-reset" target="_blank">
            <i class="fab fa-youtube fa-2x mr-2 "></i>
          </a>
        @endif
        @if ($company->tiktok_link)
          <a href="{{ $company->tiktok_link }}" class="text-reset" target="_blank">
            <i class="fab fa-tiktok fa-2x mr-2 "></i>
          </a>
        @endif
      </div>
    </div>

    @endif
  </div>

  <hr />
  @if (true)
  <div class="text-center">
    <div>
      &copy; 2023 | {{ $company->name }} | All rights reserved
    </div>
    <div>
      Website developed by <a href="https://oit.com.np" target="_blank">OIT</a>
      <i class="fas fa-check-circle ml-2"></i>
    </div>
  </div>
  @endif

</div>
