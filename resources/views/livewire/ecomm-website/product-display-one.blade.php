<div>

  <div class="container-fluid mb-3 p-3 border-bottom table-primary">
    <div class="container">
      <a class=""
          href="{{ route('website-home') }}">
        <i class="fas fa-home mr-1"></i>
        Home
      </a>
      <i class="fas fa-angle-right mx-1"></i>
      <a class=""
          href="{{ route('website-product-category-product-list', [$product->productCategory->product_category_id, $product->productCategory->name]) }}">
        {{ $product->productCategory->name }}
      </a>
      <i class="fas fa-angle-right  mx-1"></i>
      {{ $product->name }}
    </div>
  </div>

  <div class="container mb-5">
    <div class="row" style="margin: auto;">
      <div class="col-md-8">
        <div class="d-flex flex-column justify-content-center h-100-rm">
          <div class="d-flex flex-column justify-content-start h-100">
            @if ($product->image_path)
              <img class="img-fluid" src="{{ asset('storage/' . $product->image_path) }}" alt="{{ $product->name }}" style="max-height: 500px;">
            @else
              <i class="fas fa-ellipsis-h fa-10x text-muted m-5"></i>
            @endif
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
      </div>
      <div class="col-md-4">
        <div>
          <h1 class="h1 mb-3 o-heading" style="font-weight: bold;">
            {{ strtoupper($product->name) }}
          </h1>
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
        <div class="mb-4">
          @if ($product->selling_price != 0)
            <div class="p-5 o-border-radius" style="border-left: 5px solid #23a; background-color: #fed;">
              <h2 class="h1 mb-3 o-heading text-danger" style="font-weight: bold;">
                Rs
                @php echo number_format( $product->selling_price ); @endphp

                @if ($product->selling_price_unit != null)
                 <span class="h6 text-secondary">
                   &nbsp; / &nbsp; {{ $product->selling_price_unit }}
                 </span>
                @endif
              </h2>
            </div>
          @endif
        </div>
        <div class="py-3">
          <div class="d-flex">
            <div class="o-heading mr-3 d-flex flex-column justify-content-center">
              Quantity:
            </div>
            <div class="flex-grow-1 bg-warning">
              <input type="text" class="px-3 py-2 o-border-radius-sm w-100" style="border: 2px solid gray;">
            </div>
          </div>
        </div>
        <div class="py-3 d-flex">
          <button class="btn btn-danger o-border-radius w-50 mb-0 p-3 mb-3 mr-2 o-heading text-white" wire:click="addItemToCart({{ $product->product_id }})">
            <i class="fas fa-shopping-cart mr-1"></i>
            ADD TO CART
          </button>
          <button class="btn btn-light o-border-radius flex-grow-1 mb-0 p-3 mb-3 o-heading border" wire:click="addItemToCart({{ $product->product_id }})">
            <i class="fas fa-shopping-cart mr-1"></i>
            Wishlist
          </button>
        </div>
      </div>
    </div>
  </div>

  <div class="container bg-white o-border-radius" style="{{--background-color: #fff;--}}">
    <div class="row mb-3 p-2 pt-3" style="margin: auto;">
      <div class="col-md-8">
        <div class="mb-5">
          <h3 class="h4 o-heading mb-3 pb-2 o-underline-accent-rm">
            Product description
          </h3>
          <div class="bg-white border o-border-radius p-3">
            <p class="h6 mb-3">
              {{ $product->description }}
            </p>
          </div>
        </div>

        {{-- Product vendor --}}
        @if ($product->productVendor)
        <div class="mb-5 border">
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
          <div class="mb-5">
            @if (true)
            <div class="mb-3">
              <h3 class="h4 o-heading mb-0 pb-2 o-underline-accent-rm">
                Specifications
              </h3>
            </div>
            @endif

            @if (count($product->productSpecifications) > 0)
              <div class="mb-5 bg-white">
                <div class="table-responsive o-border-radius border">
                  <table class="table mb-0">
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
              <h3 class="h4 o-heading mb-3 pb-2 o-underline-accent-rm">
                {{ $productSpecificationHeading->specification_heading }}
              </h3>
              <div class="mb-4 bg-white">
                <div class="table-responsive border o-border-radius">
                  <table class="table table-borde mb-0">
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
        <div class="bg-white-rm mb-5">
          <div>
            @if (count($product->productFeatures) > 0)
              <div class="">
                @if (true)
                <div class="mb-4 text-dark">
                  <h3 class="h4 o-heading mb-3 pb-2 o-underline-accent-rm">
                    Features
                  </h3>
                </div>
                @endif

                @if (count($product->productFeatures) > 0)
                  <div class="row" style="margin: auto;">
                    @foreach ($product->productFeatures as $feature)
                      @if ($feature->product_feature_heading_id == null)
                        <div class="col-6 col-md-3 pr-3 pb-3 pt-0 pl-0">
                          <div class="border px-3 py-2 pl-0 text-center h-100 bg-success text-white shadow-sm badge-pill o-heading">
                            @if (false)
                            <i class="fas fa-check-circle text-primary-rm"></i>
                            &nbsp;
                            @endif
                            {{ $feature->feature }}
                          </div>
                        </div>
                      @endif
                    @endforeach
                  </div>
                @endif

                @if (count($product->productFeatureHeadings) > 0)
                  @foreach ($product->productFeatureHeadings as $productFeatureHeading)
                  <div class="my-4">
                    <div class="text-dark p-3-rm mb-3 o-heading">
                      <h3 class="h4 o-heading mb-o pb-2 o-underline-accent-rm">
                        {{ $productFeatureHeading->feature_heading }}
                      </h3>
                    </div>
                    <div class="row p-0" style="margin: auto;">
                      @foreach ($productFeatureHeading->productFeatures as $productFeature)
                        <div class="col-6 col-md-3 p-3-rm pl-0-rm bg-danger-rm pr-3 pb-3 pt-0 pl-0">
                          <div class="border px-3 py-2 pl-0 text-center h-100 pill pill-forest bg-success-rm text-white-rm shadow-sm badge-pill o-heading">
                            @if (false)
                            <i class="fas fa-check-circle text-primary-rm"></i>
                            &nbsp;
                            @endif
                            {{ $feature->feature }}
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
        <div class="mb-5">
          <div>
            <h3 class="h4 o-heading mb-3 pb-2 o-underline-accent-rm">
              Video preview
            </h3>

            @if ($product->video_link)
              <div class="col-md-12">
                 <iframe class="w-100" height="315" src="https://www.youtube.com/embed/{{ $product->video_link}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
              </div>
            @else
              <div class="col-md-12 p-0">
                <div class="d-flex justify-content-center h-100 o-dotted-border o-border-radius">
                  <div class="h-100 d-flex flex-column justify-content-center py-5 px-3">
                    <div class="text-center mb-3">
                      <i class="fas fa-exclamation-circle fa-3x"></i>
                    </div>
                    <div class="o-heading h5 mb-3 text-center">
                      No video
                    </div>
                    <div class="text-secondary text-center">
                      No video for the product available.
                    </div>
                  </div>
                </div>
              </div>
            @endif
          </div>
        </div>

        {{-- Rating and reviews --}}
        <div class="mb-5">
          <div>
            <div class="d-flex justify-content-between">
              <div class="d-flex flex-column justify-content-center">
                <h3 class="h4 o-heading mb-3 pb-2 o-underline-accent-rm">
                  Rating and reviews
                </h3>
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

            @if (false)
            <div class="mb-3">
              {{ count($product->productReviews) }} reviews
            </div>
            @endif

            {{-- Show product reviews --}}
            @if (count($product->productReviews) > 0)
              @foreach ($product->productReviews as $productReview)
                <div class="p-3 border bg-white my-3 mb-4 shadow-sm o-border-radius">
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
                       <i class="fas fa-star" style="color: orange;"></i> 
                      @endfor
                    </div>
                  </div>
                  <br />
                  <i>
                  {{ $productReview->review_text }}
                  </i>
                </div>
              @endforeach
            @else
              <div class="d-flex justify-content-center h-100 o-dotted-border o-border-radius">
                <div class="h-100 d-flex flex-column justify-content-center py-5 px-3">
                  <div class="text-center mb-3">
                    <i class="fas fa-exclamation-circle fa-3x"></i>
                  </div>
                  <div class="o-heading h5 mb-3 text-center">
                    No reviews
                  </div>
                  <div class="text-secondary text-center">
                    No reviews added yet. Be the first to add a review!
                  </div>
                </div>
              </div>
            @endif
          </div>
        </div>

        {{-- Questions and answers --}}
        <div class="my-3">
          <div>
            <div class="d-flex justify-content-between">
              <div class="d-flex flex-column justify-content-center">
                <h3 class="h4 o-heading mb-3 pb-2 o-underline-accent-rm">
                Question and answers
                </h3>
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
              <div class="p-3 bg-white border my-3 mb-4 shadow-sm o-border-radius">
                <div class="o-heading py-3">
                  Q:
                  {{ $productQuestion->question_text }}
                </div>

                @if (count($productQuestion->productAnswers) > 0)
                  @foreach ($productQuestion->productAnswers as $productAnswer)
                    <div class="mb-2">
                      A:
                      {{ $productAnswer->answer_text }}
                    </div>
                  @endforeach
                @endif
              </div>
            @endforeach
          @else
            <div class="d-flex justify-content-center h-100 o-dotted-border o-border-radius">
              <div class="h-100 d-flex flex-column justify-content-center py-5 px-3">
                <div class="text-center mb-3">
                  <i class="fas fa-exclamation-circle fa-3x"></i>
                </div>
                <div class="o-heading h5 mb-3 text-center">
                  No questions
                </div>
                <div class="text-secondary text-center">
                  No question asked yet. Be the first to add a question!
                </div>
              </div>
            </div>
          @endif
        </div>
      </div>

      <div class="col-md-4">
        <div class="sticky-top">
          @livewire ('ecomm-website.website.create-product-enquiry', ['product' => $product,])
          {{-- Share --}}
          <div class="mb-4 p-3 border o-border-radius bg-white">
            <div class="h4 mb-3 o-heading">
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
  </div>

  {{-- You may also like section --}}
  <div class="container-fluid mt-5 px-3 py-5 bg-white border cool-bg">
    <div class="container">
      <h2 class="h5 o-heading mt-2 mb-4" style="font-family: Arial;">
        YOU MAY ALSO LIKE
      </h2>
      @livewire ('ecomm-website.product-category-random-product-list', ['productCategory' => $product->productCategory,])
    </div>
  </div>

</div>
