<div class="p-3-rm">

  <div class="py-1 text-secondary-rm mb-3 h5" style="">
    <a class="text-primary-rm text-reset"
        href="{{ route('website-home') }}">
      Home
    </a>

    <i class="fas fa-angle-right mx-1"></i>
    <a class="text-primary-rm text-reset"
        href="{{ route('website-product-category-product-list', [$product->productCategory->product_category_id, $product->productCategory->name]) }}">
      {{ $product->productCategory->name }}
    </a>

    <i class="fas fa-angle-right  mx-1"></i>
    {{ $product->name }}
  </div>

  <div class="row mb-3 border p-2 py-5-rm shadow-rm pt-3 bg-white" style="margin: auto;">
    <div class="col-md-8 bg-white-rm border-rm">
      <div class="row bg-warning-rm">
        <div class="col-md-6 mb-4">
          <div class="d-flex justify-content-center h-100">
            <div class="d-flex flex-column justify-content-start h-100">
              @if ($product->image_path)
                <img class="img-fluid h-25-rm w-100-rm" src="{{ asset('storage/' . $product->image_path) }}" alt="{{ $product->name }}" style="max-height: 500px;">
              @else
                <i class="fas fa-ellipsis-h fa-10x text-muted m-5"></i>
              @endif
            </div>
          </div>
        </div>
        <div class="col-md-6 py-3 pl-3" style="background-color: #eee;">
          <h1 class="h5 ml-2-rm mb-3 font-weight-bold" style="font-weight: bold;">
            {{ strtoupper($product->name) }}
          </h1>

          @if (true)
          <div class="mb-3">
            <i class="far fa-star" style="color: orange;"></i>
            <i class="far fa-star" style="color: orange;"></i>
            <i class="far fa-star" style="color: orange;"></i>
            <i class="far fa-star" style="color: orange;"></i>
            <i class="far fa-star" style="color: orange;"></i>
            <span class="mx-1 text-muted">
              (0) reviews
            </span>
          </div>
          @endif

          @if ($product->selling_price != 0)
            <h3 class="h5 ml-2-rm mb-3 text-danger font-weight-bold" style="font-weight: bold;">
              Rs
              @php echo number_format( $product->selling_price ); @endphp
            </h3>
          @endif
          <div class="">
            <h2 class="h6 font-weight-bold text-secondary">
              Product description
            </h2>
            <p class="h6 ml-2-rm mb-3 text-secondary-rm border-top-rm border-bottom-rm">
              {{ $product->description }}
            </p>
          </div>


          <div>
            <button class="btn btn-danger btn-block-rm badge-pill-rm py-3-rm h2-rm h-100-rm w-100 mb-0 p-3 mb-3"
                style="font-family: Arial;"
                wire:click="addItemToCart({{ $product->product_id }})">
              <span class="h5">
                <i class="fas fa-shopping-cart mr-1"></i>
                @if (true)
                ADD TO
                @endif
                CART
              </span>
            </button>

            {{-- Loading spinner --}}
            <span wire:loading class="spinner-border text-info mr-3"
                role="status">
            </span>
          </div>

        </div>
      </div>

      {{-- Product vendor --}}
      @if ($product->productVendor)
      <div class="bg-white-rm px-3-rm border-rm my-3 border" style="background-color: #eee;">
        <div class="p-3" style="">
          <h2 class="h6 font-weight-bold">
            Product Vendor
          </h2>
          {{ $product->productVendor->name }}
        </div>
      </div>
      @endif

      {{-- Stats --}}
      <div class="bg-white-rm px-3-rm border-rm my-3 border" style="background-color: #eee;">
        <div>
          <div class="p-3" style="">
            {{ $product->website_views }} views
          </div>
        </div>
      </div>

      @if ($product->gallery)
      {{-- Product gallery --}}
      <div class="bg-white-rm p-3 border-rm mb-3-rm" style="background-color: #eee;">
        <div>
          <div class="mb-3">
            <strong>
              Gallery
            </strong>
          </div>
          <div class="px-3" style="">
            <div class="row">
            @foreach ($product->gallery->galleryImages as $galleryImage)
              <div class="col-md-3 mb-3 p-3 border-rm">
                <img src="{{ asset('storage/' . $galleryImage->image_path) }}" class="img-fluid">
              </div>
            @endforeach
            </div>
          </div>
        </div>
      </div>

      <hr />
      @endif


      {{-- Product specification --}}
      @if (count($product->productSpecifications) > 0)
        <div class="mb-5-rm">
          <div class="mt-4 bg-light text-dark p-3">
            <h3 class="h6 font-weight-bold mb-0" style="font-weight: bold;">
              SPECIFICATIONS
            </h3>
          </div>

          @if (count($product->productSpecificationHeadings) > 0)
            @foreach ($product->productSpecificationHeadings as $productSpecificationHeading)
            <div class="my-4">
              <div class="table-responsive">
                <table class="table table-bordered mb-0" style="background-color: #eee;">
                  <tr class="">
                    <th class="border-primary-rm bg-light-rm text-primary-rm p-3" style="width: 200px;" colspan="2">
                      {{ $productSpecificationHeading->specification_heading }}
                    </th>
                  </tr>
                  @foreach ($productSpecificationHeading->productSpecifications as $productSpecification)
                    <tr class="">
                      <th class="border-primary-rm font-weight-bold" style="width: 200px;">
                        {{ $productSpecification->spec_heading}}
                      </th>
                      <td class="border-primary-rm font-weight-bold-rm" style="width: 200px;">
                        {{ $productSpecification->spec_value}}
                      </td>
                    </tr>
                  @endforeach
                </table>
              </div>
            </div>
            @endforeach
          @endif

          @if (count($product->productSpecifications) > 0)
            <div class="my-4">
              <div class="table-responsive">
                <table class="table table-bordered mb-0" style="background-color: #eee;">
                  @foreach ($product->productSpecifications as $productSpecification)
                    @if ($productSpecification->product_specification_heading_id == null)
                      @if ($loop->first)
                        <tr class="">
                          <th class="border-primary-rm bg-light-rm text-primary-rm p-3" style="width: 200px;" colspan="2">
                            General specifications
                          </th>
                        </tr>
                      @endif
                      <tr class="">
                        <th class="border-dark-rm" style="width: 200px;">
                          {{ $productSpecification->spec_heading }}
                        </th>
                        <td class="border-dark-rm" style="width: 200px;">
                          {{ $productSpecification->spec_value }}
                        </td>
                      </tr>
                    @endif
                  @endforeach
                </table>
              </div>
            </div>
          @endif


        </div>
      @endif


        <hr />
        {{-- Product features --}}
        @if (count($product->productFeatures) > 0)
        <div class="bg-white p-3-rm border-rm mb-3">
          <div>

            @if (count($product->productFeatures) > 0)
              <div class="mb-5-rm">
                <div class="mt-4 bg-light text-dark p-3">
                  <h3 class="h6 font-weight-bold mb-0" style="font-weight: bold;">
                    FEATURES
                  </h3>
                </div>

                @if (count($product->productFeatureHeadings) > 0)
                  @foreach ($product->productFeatureHeadings as $productFeatureHeading)
                  <div class="my-4">
                    <div class="table-responsive">
                      <table class="table table-bordered-rm mb-0 border" style="background-color: #eee;">
                        <tr class="">
                          <th class="border-primary-rm bg-light-rm text-dark p-3" style="width: 200px;">
                            {{ $productFeatureHeading->feature_heading }}
                          </th>
                        </tr>
                        @foreach ($productFeatureHeading->productFeatures as $productFeature)
                          <tr class="">
                            <td class="border-primary-rm font-weight-bold-rm" style="">
                              @if ($productFeatureHeading->feature_heading == 'Package Includes')
                                <i class="fas fa-check-circle text-success mr-1"></i>
                              @elseif (strtolower($productFeatureHeading->feature_heading) == 'package excludes')
                                <i class="fas fa-times-circle text-danger mr-1"></i>
                              @else
                                <i class="fas fas fa-angle-double-right mr-1"></i>
                              @endif
                              {{ $productFeature->feature}}
                            </td>
                          </tr>
                        @endforeach
                      </table>
                    </div>
                  </div>
                  @endforeach
                @endif

                @if (count($product->productFeatures) > 0)
                  <div class="my-4">
                    <div class="table-responsive">
                      <table class="table table-bordered-rm mb-0" style="background-color: #eee;">
                        <tr class="">
                          <th class="border-primary-rm bg-light-rm text-dark p-3" style="width: 200px;">
                            General features
                          </th>
                        </tr>
                        @foreach ($product->productFeatures as $feature)
                          @if ($feature->product_feature_heading_id == null)
                            <tr class="">
                              <td class="border-primary-rm" style="width: 200px;">
                                <i class="fas fas fa-angle-double-right mr-1"></i>
                                {{ $feature->feature }}
                              </td>
                            </tr>
                          @endif
                        @endforeach
                      </table>
                    </div>
                  </div>
                @endif


              </div>
            @endif
          </div>
        </div>
        <hr />
        @endif

        {{-- Product Options --}}
        @if (count($product->productOptions) > 0)
        <div class="bg-white p-3-rm border-rm mb-3">
          <div>

            @if (count($product->productOptions) > 0)
              <div class="mb-5-rm" style="background-color: #eee;">
                <div class="mt-4 bg-light-rm text-dark p-3">
                  <h3 class="h6 font-weight-bold mb-0" style="font-weight: bold;">
                    Options
                  </h3>
                </div>

                @if (count($product->productOptionHeadings) > 0)
                  @foreach ($product->productOptionHeadings as $productOptionHeading)
                  <div class="px-3">
                    <span class="font-weight-bold">
                      {{ $productOptionHeading->product_option_heading_name }}
                      :
                    </span>
                        @foreach ($productOptionHeading->productOptions as $productOption)
                          <span class="">
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
        <hr />
        @endif

        @if (true)
        {{-- Youtube video --}}
        <div class="bg-white-rm p-3-rm border-rm mb-3 p-3" style="background-color: #eee;">
          <div>
            <div class="d-flex justify-content-between">
              <div>
                <strong>
                  Video preview
                </strong>
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
        @endif

        <hr />


        {{-- Rating and reviews --}}
        <div class="bg-white-rm p-3-rm border-rm mb-3 p-3" style="background-color: #eee;">
          <div>
            <div class="d-flex justify-content-between">
              <div>
                <strong>
                  Rating and reviews
                </strong>
              </div>
              <div>
                @if ($modes['createProductReviewMode'])
                @else
                  <div class="mb-3">
                    <button class="btn btn-light pl-0 pt-0 text-primary" wire:click="enterMode('createProductReviewMode')">
                      Add your review
                    </button>
                  </div>
                @endif
              </div>
            </div>

            @if ($modes['createProductReviewMode'])
              <div class="p-3-rm bg-warning-rm">
                @livewire ('product.website.product-review-create', ['product' => $product,])
              </div>
            @endif

            <div class="mb-3">
              {{ count($product->productReviews) }} reviews
            </div>

            {{-- Show product reviews --}}
            @foreach ($product->productReviews as $productReview)
              <div class="p-3 border my-3 mb-4 bg-white-rm shadow-sm" style="background-color: #fafafa;">
                <div class="d-flex justify-content-between">
                  <div>
                    <span class="font-weight-bold">
                      {{ $productReview->writer_name }}
                    </span>
                    <br />
                    <span class="text-muted">
                      {{ $productReview->writer_info }}
                    </span>
                  </div>
                  <div>
                    @for ($i=0; $i<$productReview->rating; $i++)
                     <i class="fas fa-star" style="color: orange;"></i> 
                    @endfor
                  </div>
                </div>
                <br />
                {{ $productReview->review_text }}
              </div>
            @endforeach

          </div>
        </div>

        <hr />

        {{-- Questions and answers --}}
        <div class="bg-white-rm p-3-rm border-rm mb-3 p-3" style="background-color: #eee;">
          <div>
            <div class="d-flex justify-content-between">
              <div>
                <strong>
                  Question and answers
                </strong>
              </div>
              <div>
                <div class="mb-3">
                  <a href="" wire:click.prevent="enterMode('createProductQuestionMode')">
                    Ask a question
                  </a>
                </div>
              </div>
            </div>
          </div>

          @if ($modes['createProductQuestionMode'])
            <div class="p-3-rm bg-warning-rm">
              @livewire ('product.website.product-question-create', ['product' => $product,])
            </div>
          @endif

          @if (count($product->productQuestions) > 0)
            {{-- Show product reviews --}}
            @foreach ($product->productQuestions as $productQuestion)
              <div class="p-3 border my-3 mb-4 bg-white-rm shadow-sm" style="background-color: #fafafa;">
                <div class="font-weight-bold">
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
        <div class="mb-4 p-3" style="background-color: #eee;">
          <div class="mb-3">
            <strong>
              Share
            </strong>
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
    <h2 class="h5 font-weight-bold text-center-rm mt-2 mb-4" style="font-family: Arial;">
      YOU MAY ALSO LIKE
    </h2>

    @livewire ('ecomm-website.product-category-random-product-list', ['productCategory' => $product->productCategory,])

  </div>

</div>
