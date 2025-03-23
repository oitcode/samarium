<div>

  <div class="mb-3 p-3 bg-white border">
    <a class="text-reset"
        href="{{ route('website-home') }}">
      <i class="fas fa-home mr-1"></i>
      Home
    </a>
    <i class="fas fa-angle-right mx-1"></i>
    <a class="text-reset"
        href="{{ route('website-product-category-product-list', [$product->productCategory->product_category_id, $product->productCategory->name]) }}">
      {{ $product->productCategory->name }}
    </a>
    <i class="fas fa-angle-right  mx-1"></i>
    {{ $product->name }}
  </div>

  <div class="row mb-3 border p-2 pt-3 bg-white-rm" style="margin: auto; background-color: #fff;">
    <div class="col-md-8">
      <div class="d-flex flex-column justify-content-between-rm">
        <div>
          <h1 class="h5 mb-3 o-heading" style="font-weight: bold;">
            {{ strtoupper($product->name) }}
          </h1>
        </div>
        <div>
          @if ($product->selling_price != 0)
            <h1 class="h5 mb-3 o-heading text-danger" style="font-weight: bold;">
              Rs
              @php echo number_format( $product->selling_price ); @endphp
            </h1>
          @endif
        </div>
      </div>
      {{-- Stats --}}
      <div class="mb-3 border-rm bg-white">
        <div>
          <div class="py-1-rm">
            <span class="o-heading">
              Posted on:
            </span>
            {{ $product->created_at->toDateString() }}
            &nbsp;&nbsp;&nbsp;&nbsp;
            <span class="o-heading">
              Views:
            </span>
            {{ $product->website_views }} views
          </div>
        </div>
      </div>
      <div class="row" style="margin: auto;">
        <div class="col-md-12 mb-4 p-0 border shadow">
          <div class="d-flex justify-content-center h-100-rm">
            <div class="d-flex flex-column justify-content-start h-100">
              @if ($product->image_path)
                <img class="img-fluid" src="{{ asset('storage/' . $product->image_path) }}" alt="{{ $product->name }}" style="max-height: 500px;">
              @else
                <i class="fas fa-ellipsis-h fa-10x text-muted m-5"></i>
              @endif
            </div>
          </div>
      @if ($product->gallery)
        {{-- Product gallery --}}
        <div class="mb-4-rm p-3 border bg-white">
          <div>
            <div class="mb-3 o-heading">
                Gallery
            </div>
            <div class="px-3">
              <div class="row">
              @foreach ($product->gallery->galleryImages as $galleryImage)
                <div class="col-3 mb-3 p-3">
                  <img src="{{ asset('storage/' . $galleryImage->image_path) }}" class="img-fluid">
                </div>
              @endforeach
              </div>
            </div>
          </div>
        </div>
      @endif
        </div>
        <div class="col-md-12 py-3 pl-3 border bg-white">
          <div>
            <h2 class="h6 o-heading">
              Product description
            </h2>
            <p class="h6 mb-3">
              {{ $product->description }}
            </p>
          </div>
        </div>
      </div>

      <div class="my-3">
        <button class="btn btn-danger badge-pill w-100 mb-0 p-3 mb-3 o-heading text-white" wire:click="addItemToCart({{ $product->product_id }})">
          <i class="fas fa-shopping-cart mr-1"></i>
          ADD TO CART
        </button>
        @include ('partials.dashboard.spinner-button')
      </div>

      {{-- Product vendor --}}
      @if ($product->productVendor)
      <div class="my-3 border">
        <div class="p-3">
          <h2 class="h6 o-heading">
            Product Vendor
          </h2>
          {{ $product->productVendor->name }}
        </div>
      </div>
      @endif



      {{-- Product specification --}}
      @if (count($product->productSpecifications) > 0)
        <div class="border-rm px-3-rm pb-3-rm">
          @if (false)
          <div class="mt-4-rm bg-light-rm text-white-rm p-3">
            <h3 class="h6 o-heading mb-0" style="font-weight: bold;">
              SPECIFICATIONS
            </h3>
          </div>
          @endif

          @if (count($product->productSpecifications) > 0)
            <div class="my-4 bg-white">
              <div class="table-responsive">
                <table class="table table-bordered mb-0">
                  @foreach ($product->productSpecifications as $productSpecification)
                    @if ($productSpecification->product_specification_heading_id == null)
                      @if (false && $loop->first)
                        <tr>
                          <th class="p-3 o-heading" style="width: 200px; background-color: #eee;" colspan="2">
                            General specifications
                          </th>
                        </tr>
                      @endif
                      <tr>
                        <th class="o-heading" style="width: 200px;">
                          {{ $productSpecification->spec_heading }}
                        </th>
                        <td style="width: 200px;">
                          {{ $productSpecification->spec_value }}
                        </td>
                      </tr>
                    @endif
                  @endforeach
                </table>
              </div>
            </div>
          @endif

          @if (count($product->productSpecificationHeadings) > 0)
            @foreach ($product->productSpecificationHeadings as $productSpecificationHeading)
            <div class="mb-4 bg-white">
              <div class="table-responsive">
                <table class="table table-bordered mb-0">
                  <tr>
                    <th class="p-3 o-heading text-primary-rm" style="width: 200px;" colspan="2">
                      {{ $productSpecificationHeading->specification_heading }}
                    </th>
                  </tr>
                  @foreach ($productSpecificationHeading->productSpecifications as $productSpecification)
                    <tr>
                      <th class="o-heading" style="width: 200px;">
                        {{ $productSpecification->spec_heading}}
                      </th>
                      <td style="width: 200px;">
                        {{ $productSpecification->spec_value}}
                      </td>
                    </tr>
                  @endforeach
                </table>
              </div>
            </div>
            @endforeach
          @endif
        </div>
      @endif

      {{-- Product features --}}
      @if (count($product->productFeatures) > 0)
      <div class="bg-white-rm mb-3">
        <div>
          @if (count($product->productFeatures) > 0)
            <div class="">
              @if (false)
              <div class="mt-4-rm text-dark p-3">
                <h3 class="h6 o-heading mb-0" style="font-weight: bold;">
                  FEATURES
                </h3>
              </div>
              @endif

              @if (count($product->productFeatures) > 0)
                <div class="my-4 bg-white">
                  @if (false)
                  <div class="table-responsive">
                    <table class="table mb-0 border">
                      <tr>
                        <th class="text-dark o-heading p-3" style="width: 200px;">
                          General features
                        </th>
                      </tr>
                      @foreach ($product->productFeatures as $feature)
                        @if ($feature->product_feature_heading_id == null)
                          <tr>
                            <td style="width: 200px;">
                              <i class="fas fas fa-arrow-circle-right text-success mr-1"></i>
                              {{ $feature->feature }}
                            </td>
                          </tr>
                        @endif
                      @endforeach
                    </table>
                  </div>
                  @endif
                </div>
                <div class="row bg-white p-3 border" style="margin: auto;">
                  @foreach ($product->productFeatures as $feature)
                    @if ($feature->product_feature_heading_id == null)
                      <div class="col-6 col-md-3 p-3-rm pl-0-rm bg-danger-rm pr-3 pb-3 pt-0 pl-0">
                        <div class="border p-3 pl-0 text-center h-100 bg-success-rm text-white-rm shadow" style="border-left: 5px solid #eee !important;">
                          <i class="fas fa-check-circle text-primary-rm"></i>
                          &nbsp;
                          {{ $feature->feature }}
                        </div>
                      </div>
                    @endif
                  @endforeach
                </div>
              @endif

              @if (count($product->productFeatureHeadings) > 0)
                @foreach ($product->productFeatureHeadings as $productFeatureHeading)
                @if (false)
                <div class="mb-4">
                  <div class="table-responsive">
                    <table class="table mb-0 border">
                      <tr>
                        <th class="text-dark p-3 o-heading" style="width: 200px;">
                          {{ $productFeatureHeading->feature_heading }}
                        </th>
                      </tr>
                      @foreach ($productFeatureHeading->productFeatures as $productFeature)
                        <tr>
                          <td>
                            @if ($productFeatureHeading->feature_heading == 'Package Includes')
                              <i class="fas fa-check-circle text-success mr-1"></i>
                            @elseif (strtolower($productFeatureHeading->feature_heading) == 'package excludes')
                              <i class="fas fa-times-circle text-danger mr-1"></i>
                            @else
                              <i class="fas fas fa-arrow-circle-right text-success mr-1"></i>
                            @endif
                            {{ $productFeature->feature}}
                          </td>
                        </tr>
                      @endforeach
                    </table>
                  </div>
                </div>
                @endif

                <div class="my-4 p-3 bg-white border">
                  <div class="text-dark p-3-rm mb-3 o-heading">
                    {{ $productFeatureHeading->feature_heading }}
                  </div>
                  <div class="row p-0" style="margin: auto;">
                    @foreach ($productFeatureHeading->productFeatures as $productFeature)
                      <div class="col-6 col-md-3 p-3-rm pl-0-rm bg-danger-rm pr-3 pb-3 pt-0 pl-0">
                        <div class="border p-3 pl-0 text-center bg-primary-rm text-white-rm h-100 shadow" style="border-left: 5px solid #eee !important;">
                          <i class="fas fa-check-circle text-primary-rm"></i>
                          &nbsp;
                          {{ $productFeature->feature}}
                        </div>
                      </div>
                    @endforeach
                  </div>
                </div>
                @endforeach
              @endif
            </div>
          @endif
        </div>
      </div>
      @endif

      {{-- Product Options --}}
      @if (count($product->productOptions) > 0)
      <div class="bg-white border my-3">
        <div>
          @if (count($product->productOptions) > 0)
            <div>
              <div class="mt-4 text-dark p-3">
                <h3 class="h6 o-heading mb-0" style="font-weight: bold;">
                  Options
                </h3>
              </div>

              @if (count($product->productOptionHeadings) > 0)
                @foreach ($product->productOptionHeadings as $productOptionHeading)
                <div class="px-3">
                  <span class="o-heading">
                    {{ $productOptionHeading->product_option_heading_name }}
                    :
                  </span>
                      @foreach ($productOptionHeading->productOptions as $productOption)
                        <span>
                          {{ $productOption->product_option_name}}
                          @if ($loop->last)
                          @else
                          ,
                          @endif
                        </span>
                      @endforeach
                </div>
                @endforeach
              @endif
            </div>
          @endif
        </div>
      </div>
      @endif

      {{-- Youtube video --}}
      <div class="my-3 p-3 bg-white border">
        <div>
          <div class="d-flex justify-content-between">
            <div class="o-heading">
              Video preview
            </div>
            <div>
            </div>
          </div>

          @if ($product->video_link)
            <div class="col-md-12">
               <iframe class="w-100" height="315" src="https://www.youtube.com/embed/{{ $product->video_link}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            </div>
          @else
            <div class="col-md-12 p-0">
              No video
            </div>
          @endif
        </div>
      </div>

      {{-- Rating and reviews --}}
      <div class="my-3 p-3 bg-white border">
        <div>
          <div class="d-flex justify-content-between">
            <div class="o-heading">
              Rating and reviews
            </div>
            <div>
              @if ($modes['createProductReviewMode'])
              @else
                <div class="mb-3">
                  <button class="btn btn-outline-primary badge-pill bg-white-rm pl-0-rm pt-0-rm text-primary-rm" wire:click="enterMode('createProductReviewMode')">
                    Add your review
                  </button>
                </div>
              @endif
            </div>
          </div>

          @if ($modes['createProductReviewMode'])
            <div>
              @livewire ('product.website.product-review-create', ['product' => $product,])
            </div>
          @endif

          <div class="mb-3">
            {{ count($product->productReviews) }} reviews
          </div>

          {{-- Show product reviews --}}
          @foreach ($product->productReviews as $productReview)
            <div class="p-3 border my-3 mb-4 shadow-sm">
              <div class="d-flex justify-content-between">
                <div>
                  <span class="o-heading">
                    {{ $productReview->writer_name }}
                  </span>
                  <br />
                  <span class="text-muted">
                    {{ $productReview->writer_info }}
                  </span>
                </div>
                <div>
                  @for ($i=0; $i<$productReview->rating; $i++)
                   <i class="fas fa-star" style="color: #fdd;"></i> 
                  @endfor
                </div>
              </div>
              <br />
              {{ $productReview->review_text }}
            </div>
          @endforeach
        </div>
      </div>

      {{-- Questions and answers --}}
      <div class="my-3 p-3 bg-white border">
        <div>
          <div class="d-flex justify-content-between">
            <div class="o-heading">
              Question and answers
            </div>
            <div>
              <div class="mb-3">
                <button class="btn btn-outline-primary badge-pill bg-white-rm pl-0-rm pt-0-rm text-primary-rm" wire:click="enterMode('createProductQuestionMode')">
                  Ask a question
                </button>
              </div>
            </div>
          </div>
        </div>

        @if ($modes['createProductQuestionMode'])
          <div>
            @livewire ('product.website.product-question-create', ['product' => $product,])
          </div>
        @endif

        @if (count($product->productQuestions) > 0)
          {{-- Show product reviews --}}
          @foreach ($product->productQuestions as $productQuestion)
            <div class="p-3 border my-3 mb-4 shadow-sm">
              <div class="o-heading">
                Q:
                {{ $productQuestion->question_text }}
              </div>

              <div class="text-secondary">
                {{ count($productQuestion->productAnswers) }} answers
              </div>

              @if (count($productQuestion->productAnswers) > 0)
                @foreach ($productQuestion->productAnswers as $productAnswer)
                  <div class="my-1 border-top">
                    A:
                    {{ $productAnswer->answer_text }}
                  </div>
                @endforeach
              @endif
            </div>
          @endforeach
        @else
          No questions
        @endif
      </div>
    </div>

    <div class="col-md-4">
      <div class="sticky-top">
        @livewire ('ecomm-website.website.create-product-enquiry', ['product' => $product,])
        {{-- Share --}}
        <div class="mb-4 p-3 border">
          <div class="mb-3 o-heading">
              Share
          </div>
          <div>
            <a href="http://www.facebook.com/sharer.php?u={{ url()->current() }}" target="_blank" class="text-decoration-none text-primary">
              <i class="fab fa-facebook fa-2x mr-4"></i>
            </a>
            <a href="https://api.whatsapp.com/send?text={{ url()->current() }}" data-action="share/whatsapp/share">
              <i class="fab fa-whatsapp fa-2x mr-4 text-success"></i>
            </a>
            <a href="viber://forward?text={{ url()->current() }}">
              <i class="fab fa-viber fa-2x mr-4" style="color: purple;"></i>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>

  {{-- You may also like section --}}
  <div class="my-5 px-3 pt-3 bg-white border shadow">
    <h2 class="h5 o-heading mt-2 mb-4" style="font-family: Arial;">
      YOU MAY ALSO LIKE
    </h2>
    @livewire ('ecomm-website.product-category-random-product-list', ['productCategory' => $product->productCategory,])
  </div>

</div>
