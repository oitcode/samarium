<div>


  <h1 class="h5 my-2 py-2">
    Products

    <i class="fas fa-angle-right mx-2"></i>
    {{ $product->productCategory->name }}

    <i class="fas fa-angle-right mx-2"></i>
    {{ $product->name }}
  </h1>


  <!-- Flash message div -->
  @if (session()->has('message'))
    <div class="p-2">
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="fas fa-check-circle mr-3"></i>
        {{ session('message') }}
        <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close">
          <span class="text-danger" aria-hidden="true">&times;</span>
        </button>
      </div>
    </div>
  @endif


  <div>
    <div>
      <div class="mt-0 p-2 d-flex justify-content-end border" style="background-color: #dadada;">

        <div>
          <button class="btn btn-light" wire:click="$refresh">
            <i class="fas fa-refresh"></i>
            @if (false)
            Refresh
            @endif
          </button>

          <button class="btn btn-light" wire:click="$emit('exitProductDisplayMode')">
            <i class="fas fa-times"></i>
            @if (false)
            Close
            @endif
          </button>
        </div>

      </div>
    </div>
  </div>


  <div class="row border bg-white" style="margin: auto;">


    {{-- Product info --}}
    <div class="col-md-9">
      <div class="py-3">
        <div class="mb-4">
          @if ($modes['updateProductNameMode'])
            @livewire ('product.dashboard.product-edit-name', ['product' => $product,])
          @else
            <div class="bg-white text-secondary font-weight-bold mr-5 pt-3 pb-1-rm">
              Product Name
              <a href="" class="text-primary p-0 m-0" wire:click.prevent="enterMode('updateProductNameMode')">
                @if (false)
                <i class="fas fa-pencil-alt text-muted"></i>
                @endif
                Edit
              </a>
            </div>
            <hr class="m-0 p-0" />
            <div class="d-flex justify-content-between my-0">
              {{-- Product name --}}
              <div class="d-flex">
                @if (false)
                <div class="font-weight-bold mr-5">
                  Product Name
                </div>
                @endif
                <div>
                  <h1 class="h5">
                    {{ $product->name }}
                  </h1>
                </div>
              </div>
            </div>
          @endif
        </div>
        @if (false)
        <hr class="m-0 p-0"/>
        @endif

        <div class="mb-4">
          <div class="bg-white text-secondary font-weight-bold mr-5 pt-3 pb-1-rm">
            Category
            <a class="text-primary">
                @if (false)
                <i class="fas fa-pencil-alt text-muted"></i>
                @endif
                Edit
            </a>
          </div>
          <div class="d-flex justify-content-between" style="">
            <span>
              {{ $product->productCategory->name }}
            </span>
          </div>
        </div>
        @if (false)
        <hr class="m-0 p-0"/>
        @endif

        <div class="mb-4">
          @if ($modes['updateProductDescriptionMode'])
            @livewire ('product.dashboard.product-edit-description', ['product' => $product,])
          @else
            <div class="bg-white text-secondary font-weight-bold mr-5 pt-3 pb-1-rm">
              Description
              <a class="text-primary" wire:click="enterMode('updateProductDescriptionMode')">
                @if (false)
                <i class="fas fa-pencil-alt text-muted"></i>
                @endif
                Edit
              </a>
            </div>
            <div class="d-flex justify-content-between font-weight-bold">
              {{ $product->description }}
            </div>
          @endif
        </div>
        @if (false)
        <hr class="m-0 p-0"/>
        @endif

        <div class="mb-3">
          @if ($modes['updateProductPriceMode'])
            @livewire ('product.dashboard.product-edit-price', ['product' => $product,])
          @else
            <div class="bg-white text-secondary font-weight-bold mr-5 pt-3 pb-1-rm">
              Price
              <a class="text-primary p-0 ml-2" wire:click="enterMode('updateProductPriceMode')">
                @if (false)
                <i class="fas fa-pencil-alt text-muted"></i>
                @endif
                Edit
              </a>
            </div>
            <div class="d-flex justify-content-between font-weight-bold">
              Rs
              @php echo number_format( $product->selling_price ); @endphp
            </div>
          @endif
        </div>
        @if (false)
        <hr class="m-0 p-0"/>
        @endif


        @if ($product->baseProduct)
          <div class="mb-3">
            <h2 class="h6 font-weight-bold">
              Base product
            </h2>
            <div>
            {{ $product->baseProduct->name }}
            </div>
          </div>

          <div class="mb-3">
            <h2 class="h6 font-weight-bold">
              Inventory unit consumption
            </h2>
            <div>
            {{ $product->inventory_unit_consumption }}
            {{ $product->baseProduct->inventory_unit }}
            </div>
          </div>
        @endif

      </div>
    </div>

    {{-- Product image --}}
    <div class="col-md-3 bg-light">
      <div class="d-flex justify-content-center h-100">
        <div class="d-flex flex-column justify-content-center h-100">
          {{-- Product media --}}
          <div>
            @if ($modes['updateProductImageMode'])
              @livewire ('product.dashboard.product-edit-image', ['product' => $product,])
            @else
              <div>
                <div class="my-4">
                  <button class="btn btn-light" wire:click="enterMode('updateProductImageMode')">
                    <i class="fas fa-pencil-alt"></i>
                  </button>
                </div>
              </div>
              @if ($product->image_path)
                <img src="{{ asset('storage/' . $product->image_path) }}" class="mr-3" style="width: 200px; height: 200px;">
              @else
                <i class="fas fa-dice-d6 text-muted fa-8x"></i>
              @endif
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>

  @if (true)
  {{-- Stats --}}
  <div class="bg-white px-3-rm border-rm my-3">
    <div>
      @if (false)
      <div class="mb-3">
        <strong>
          Stats
        </strong>
      </div>
      @endif
      <div class="p-3" style="">
        {{ $product->website_views }} views
        &nbsp;&nbsp;
        @if (false)
        13 likes
        &nbsp;&nbsp;
        2 shares
        &nbsp;&nbsp;
        7 reviews
        &nbsp;&nbsp;
        4 questions
        &nbsp;&nbsp;
        @endif
      </div>
    </div>
  </div>
  @endif

  {{-- Product gallery --}}
  <div class="my-3 bg-white border">
    <h2 class="h5 m-3">
      Product gallery
    </h2>


    @if ($product->gallery)
      <div class="my-3">
        <button class="btn btn-light" wire:click="enterMode('updateProductUpdateProductGalleryMode')">
          <i class="fas fa-pencil-alt mr-1"></i>
          Edit gallery
        </button>
        @livewire ('product.dashboard.product-gallery-display', ['product' => $product,])
      </div>
    @else
      <div class="my-3">
        @if (! $modes['createProductGalleryMode'])
          <span class="px-3 my-3 text-secondary">
            @if (false)
            <i class="fas fa-exclamation-circle mr-1"></i>
            @endif
            No gallery
          </span>
          <div class="mt-4">
            <button class="btn btn-light" wire:click="enterMode('createProductGalleryMode')">
              <i class="fas fa-plus-circle mr-1"></i>
              Add gallery
            </button>
          </div>
        @else
          @livewire ('product.dashboard.product-gallery-create', ['product' => $product,])
        @endif
      </div>
    @endif

  </div>

  {{-- Product video --}}
  <div class="my-3 bg-white border">
    <h2 class="h5 m-3">
      Product video
    </h2>

    @if ($product->video_link)
      <div class="p-3">
        Video set
      </div>
    @else
      @if ($modes['updateProductVideoMode'])
        @livewire ('product.dashboard.product-edit-video-link', ['product' => $product,])
      @else
        <div class="py-3">
          <button class="btn btn-light" wire:click="enterMode('updateProductVideoMode')">
            <i class="fas fa-plus-circle mr-1"></i>
            Add video
          </button>
        </div>
      @endif
    @endif

  </div>

  {{-- Product specifications --}}
  <div class="my-3 bg-white border">
    <h2 class="h5 m-3">
      Product specifications
    </h2>

      {{-- Toolbar --}}
      @if ($modes['updateProductAddProductSpecificationMode'])
      @else
        <div class="p-2 bg-white border">
            <button class="btn btn-light" wire:click="enterMode('updateProductAddProductSpecificationMode')">
              <i class="fas fa-plus-circle mr-1"></i>
              Add specification
            </button>
            <button class="btn btn-light mr-3" wire:click="enterMode('updateProductAddProductSpecificationHeadingMode')">
              <i class="fas fa-plus-circle mr-1"></i>
              Add specification heading
            </button>
            @include ('partials.dashboard.spinner-button')
        </div>
      @endif

    <!-- Flash message div -->
    @if (session()->has('addSpecMessage'))
      <div class="p-2">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <i class="fas fa-check-circle mr-3"></i>
          {{ session('addSpecMessage') }}
          <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close">
            <span class="text-danger" aria-hidden="true">&times;</span>
          </button>
        </div>
      </div>
    @endif

    @if ($modes['updateProductAddProductSpecificationHeadingMode'])
      @livewire ('product.dashboard.product-edit-add-product-specification-heading', ['product' => $product,])
    @endif

    @if ($modes['updateProductAddProductSpecificationMode'])
      @livewire ('product.dashboard.product-edit-add-product-specification', ['product' => $product,])
    @endif

    @if (count($product->productSpecificationHeadings) > 0)
      <div class="mb-5">
        <div class="table-responsive">
          <table class="table table-bordered mb-0">
            @foreach ($product->productSpecificationHeadings as $productSpecificationHeading)
              <tr class="">
                <th class="bg-primary text-white border-dark" colspan="3" style="width: 200px;">
                  {{ $productSpecificationHeading->specification_heading }}
                </th>
              </tr>
              @foreach ($productSpecificationHeading->productSpecifications as $productSpecification)
                <tr class="">
                  <th class="border-dark" style="width: 200px;">
                    @if ($modes['updateProductUpdateProductSpecificationKeyword'])
                      @if ($updatingProductSpecification->product_specification_id == $productSpecification->product_specification_id)
                        @livewire ('product.dashboard.product-specification-keyword-edit', ['productSpecification' => $productSpecification,])
                      @else
                        {{ $productSpecification->spec_heading}}
                        <button class="btn btn-light" wire:click="updateProductSpecificationKeyword({{ $productSpecification }})">
                          <i class="fas fa-pencil-alt"></i>
                        </button>
                      @endif
                    @else
                      {{ $productSpecification->spec_heading}}
                      <button class="btn btn-light" wire:click="updateProductSpecificationKeyword({{ $productSpecification }})">
                        <i class="fas fa-pencil-alt"></i>
                      </button>
                    @endif
                  </th>
                  <td class="border-dark" style="width: 200px;">
                    @if ($modes['updateProductUpdateProductSpecificationValue'])
                      @if ($updatingProductSpecification->product_specification_id == $productSpecification->product_specification_id)
                        @livewire ('product.dashboard.product-specification-value-edit', ['productSpecification' => $productSpecification,])
                      @else
                        {{ $productSpecification->spec_value }}
                        <button class="btn btn-light" wire:click="updateProductSpecificationValue({{ $productSpecification }})">
                          <i class="fas fa-pencil-alt"></i>
                        </button>
                      @endif
                    @else
                      {{ $productSpecification->spec_value }}
                      <button class="btn btn-light" wire:click="updateProductSpecificationValue({{ $productSpecification }})">
                        <i class="fas fa-pencil-alt"></i>
                      </button>
                    @endif
                  </td>
                  <td class="border-dark" style="width: 200px;">
                    @if ($modes['deleteProductSpecificationMode'])
                      @if ($deletingProductSpecification->product_specification_id == $productSpecification->product_specification_id)
                        <button class="btn btn-danger" wire:click="confirmDeleteProductSpecification({{ $productSpecification }})">
                          Confirm delete
                        </button>
                        <button class="btn btn-light" wire:click="cancelDeleteProductSpecification">
                          Cancel
                        </button>
                      @else
                        <button class="btn btn-light" wire:click="deleteProductSpecification({{ $productSpecification }})">
                          <i class="fas fa-trash"></i>
                        </button>
                      @endif
                    @else
                      <button class="btn btn-light" wire:click="deleteProductSpecification({{ $productSpecification }})">
                        <i class="fas fa-trash"></i>
                      </button>
                    @endif
                  </td>
                </tr>
              @endforeach
            @endforeach
          </table>
        </div>
      </div>
    @endif

    @if (count($product->productSpecifications) > 0)
      <div class="mb-5">
        <div class="table-responsive">
          <table class="table table-bordered mb-0">
            @foreach ($product->productSpecifications as $productSpecification)
              @if ($productSpecification->product_specification_heading_id == null)
                <tr class="">
                  <th class="border-dark" style="width: 200px;">
                    @if ($modes['updateProductUpdateProductSpecificationKeyword'])
                      @if ($updatingProductSpecification->product_specification_id == $productSpecification->product_specification_id)
                        @livewire ('product.dashboard.product-specification-keyword-edit', ['productSpecification' => $productSpecification,])
                      @else
                        {{ $productSpecification->spec_heading}}
                        <button class="btn btn-light" wire:click="updateProductSpecificationKeyword({{ $productSpecification }})">
                          <i class="fas fa-pencil-alt"></i>
                        </button>
                      @endif
                    @else
                      {{ $productSpecification->spec_heading}}
                      <button class="btn btn-light" wire:click="updateProductSpecificationKeyword({{ $productSpecification }})">
                        <i class="fas fa-pencil-alt"></i>
                      </button>
                    @endif
                  </th>
                  <td class="border-dark" style="width: 200px;">
                    @if ($modes['updateProductUpdateProductSpecificationValue'])
                      @if ($updatingProductSpecification->product_specification_id == $productSpecification->product_specification_id)
                        @livewire ('product.dashboard.product-specification-value-edit', ['productSpecification' => $productSpecification,])
                      @else
                        {{ $productSpecification->spec_value }}
                        <button class="btn btn-light" wire:click="updateProductSpecificationValue({{ $productSpecification }})">
                          <i class="fas fa-pencil-alt"></i>
                        </button>
                      @endif
                    @else
                      {{ $productSpecification->spec_value }}
                      <button class="btn btn-light" wire:click="updateProductSpecificationValue({{ $productSpecification }})">
                        <i class="fas fa-pencil-alt"></i>
                      </button>
                    @endif
                  </td>
                  <td class="border-dark" style="width: 200px;">
                    @if ($modes['deleteProductSpecificationMode'])
                      @if ($deletingProductSpecification->product_specification_id == $productSpecification->product_specification_id)
                        <button class="btn btn-danger" wire:click="confirmDeleteProductSpecification({{ $productSpecification }})">
                          Confirm delete
                        </button>
                        <button class="btn btn-light" wire:click="cancelDeleteProductSpecification">
                          Cancel
                        </button>
                      @else
                        <button class="btn btn-light" wire:click="deleteProductSpecification({{ $productSpecification }})">
                          <i class="fas fa-trash"></i>
                        </button>
                      @endif
                    @else
                      <button class="btn btn-light" wire:click="deleteProductSpecification({{ $productSpecification }})">
                        <i class="fas fa-trash"></i>
                      </button>
                    @endif
                  </td>
                </tr>
              @endif
            @endforeach
          </table>
        </div>
      </div>
    @endif

  </div>


  {{-- Product feature --}}
  <div class="my-3 bg-white border">
    <h2 class="h5 m-3">
      Product features
    </h2>

      {{-- Toolbar --}}
      @if ($modes['updateProductAddProductFeatureMode'])
      @else
        <div class="p-2 bg-white border">
            <button class="btn btn-light" wire:click="enterMode('updateProductAddProductFeatureMode')">
              <i class="fas fa-plus-circle mr-1"></i>
              Add feature
            </button>

            <button class="btn btn-light" wire:click="enterMode('updateProductAddProductFeatureHeadingMode')">
              <i class="fas fa-plus-circle mr-1"></i>
              Add feature heading
            </button>

            @include ('partials.dashboard.spinner-button')
        </div>
      @endif

    <!-- Flash message div -->
    @if (session()->has('addFeatureMessage'))
      <div class="p-2">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <i class="fas fa-check-circle mr-3"></i>
          {{ session('addFeatureMessage') }}
          <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close">
            <span class="text-danger" aria-hidden="true">&times;</span>
          </button>
        </div>
      </div>
    @endif

    @if ($modes['updateProductAddProductFeatureHeadingMode'])
      @livewire ('product.dashboard.product-edit-add-product-feature-heading', ['product' => $product,])
    @endif

    @if ($modes['updateProductAddProductFeatureMode'])
      @livewire ('product.dashboard.product-edit-add-product-feature', ['product' => $product,])
    @endif

    @if (count($product->productFeatureHeadings) > 0)
      <div class="mb-5">
        <div class="table-responsive">
          <table class="table table-bordered mb-0">
            @foreach ($product->productFeatureHeadings as $productFeatureHeading)
              <tr class="">
                <th colspan="2" class="bg-primary text-white border-dark" style="width: 200px;">
                  {{ $productFeatureHeading->feature_heading }}
                </th>
              </tr>
              @foreach ($productFeatureHeading->productFeatures as $productFeature)
                <tr class="">
                  <th class="border-dark" style="width: 200px;">
                    @if ($modes['updateProductUpdateProductFeature'])
                      @if ($updatingProductFeature->product_feature_id == $productFeature->product_feature_id)
                        @livewire ('product.dashboard.product-feature-edit', ['productFeature' => $productFeature,])
                      @else
                        {{ $productFeature->feature }}
                        <button class="btn btn-light" wire:click="updateProductFeature({{ $productFeature }})">
                          <i class="fas fa-pencil-alt"></i>
                        </button>
                      @endif
                    @else
                      {{ $productFeature->feature }}
                      <button class="btn btn-light" wire:click="updateProductFeature({{ $productFeature }})">
                        <i class="fas fa-pencil-alt"></i>
                      </button>
                    @endif
                  </th>
                  <td class="border-dark" style="width: 200px;">
                    @if ($modes['deleteProductFeatureMode'])
                      @if ($deletingProductFeature->product_feature_id == $productFeature->product_feature_id)
                        <button class="btn btn-danger" wire:click="confirmDeleteProductFeature({{ $productFeature }})">
                          Confirm delete
                        </button>
                        <button class="btn btn-light" wire:click="cancelDeleteProductFeature">
                          Cancel
                        </button>
                      @else
                        <button class="btn btn-light" wire:click="deleteProductFeature({{ $productFeature }})">
                          <i class="fas fa-trash"></i>
                        </button>
                      @endif
                    @else
                      <button class="btn btn-light" wire:click="deleteProductFeature({{ $productFeature }})">
                        <i class="fas fa-trash"></i>
                      </button>
                    @endif
                  </td>
                </tr>
              @endforeach
            @endforeach
          </table>
        </div>
      </div>
    @endif

    @if (count($product->productFeatures) > 0)
      <div class="mb-5">
        <div class="table-responsive">
          <table class="table table-bordered mb-0">
            @foreach ($product->productFeatures as $productFeature)
              @if ($productFeature->product_feature_heading_id == null)
                <tr class="">
                  <th class="border-dark" style="width: 200px;">
                    @if ($modes['updateProductUpdateProductFeature'])
                      @if ($updatingProductFeature->product_feature_id == $productFeature->product_feature_id)
                        @livewire ('product.dashboard.product-feature-edit', ['productFeature' => $productFeature,])
                      @else
                        {{ $productFeature->feature }}
                        <button class="btn btn-light" wire:click="updateProductFeature({{ $productFeature }})">
                          <i class="fas fa-pencil-alt"></i>
                        </button>
                      @endif
                    @else
                      {{ $productFeature->feature }}
                      <button class="btn btn-light" wire:click="updateProductFeature({{ $productFeature }})">
                        <i class="fas fa-pencil-alt"></i>
                      </button>
                    @endif
                  </th>
                  <td class="border-dark" style="width: 200px;">
                    @if ($modes['deleteProductFeatureMode'])
                      @if ($deletingProductFeature->product_feature_id == $productFeature->product_feature_id)
                        <button class="btn btn-danger" wire:click="confirmDeleteProductFeature({{ $productFeature }})">
                          Confirm delete
                        </button>
                        <button class="btn btn-light" wire:click="cancelDeleteProductFeature">
                          Cancel
                        </button>
                      @else
                        <button class="btn btn-light" wire:click="deleteProductFeature({{ $productFeature }})">
                          <i class="fas fa-trash"></i>
                        </button>
                      @endif
                    @else
                      <button class="btn btn-light" wire:click="deleteProductFeature({{ $productFeature }})">
                        <i class="fas fa-trash"></i>
                      </button>
                    @endif
                  </td>
                </tr>
              @endif
            @endforeach
          </table>
        </div>
      </div>
    @endif

  </div>


  {{-- Questions and answers --}}
  <div class="bg-white p-3 mb-3">
    <div class="mb-4">
      <h3 class="h5">
        Questions & Answers
      </h3>
    </div>
    @if (count($product->productQuestions) > 0)
      {{-- Show product reviews --}}
      @foreach ($product->productQuestions as $productQuestion)
        <div class="py-2 border-rm my-3 mb-4 bg-white-rm shadow-sm-rm" style="{{-- border-top: 2px solid red !important; --}} background-color: #fafafa;">
          <div>
            Q:
            {{ $productQuestion->question_text }}
          </div>
          <hr class="m-0 p-0"/>
          <div class="text-secondary">
            <span class="mr-3">
              {{ count($productQuestion->productAnswers) }} answers
            </span>
            <span class="text-primary" wire:click="answerQuestion({{ $productQuestion }})">
              Add answer
            </span>
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

        @if ($modes['createProductAnswerMode'])
          @if ($answeringProductQuestion->product_question_id == $productQuestion->product_question_id )
            <div class="p-3 border">
              @livewire ('product.dashboard.product-answer-create', ['productQuestion' => $productQuestion,])
            </div>
          @endif
        @endif
      @endforeach
    @else
      No questions
    @endif
  </div>


  {{-- Active/Inactive, Show/Hide in website. --}} 
  <div class="my-4 bg-white">
    <h2 class="h5 m-3 pt-3">
      Additional settings
    </h2>
    <div>
      <div class="mt-0 p-2 d-flex justify-content-between border"
          style="{{-- background-color: #dadada; --}}">
        <div>
          @if ($product->is_active == 0)
            <button class="btn btn-light mr-1" wire:click="makeProductActive">
              <i class="fas fa-eye mr-2"></i>
              @if (true)
              <span>
                Make active </span>
              @endif
            </button>
          @elseif ($product->is_active == 1)
            <button class="btn btn-light mr-1" wire:click="makeProductInactive">
              <i class="fas fa-eye-slash mr-2"></i>
              @if (true)
              <span>
                Make inactive
              </span>
              @endif
            </button>

            @if ($product->show_in_front_end == 'yes')
              <button class="btn btn-light mr-1" wire:click="makeProductNotVisibleInFrontEnd">
                <i class="fas fa-eye-slash mr-2"></i>
                @if (true)
                <span class="">
                  Hide in website
                </span>
                @endif
              </button>
            @else
              <button class="btn btn-light mr-1" wire:click="makeProductVisibleInFrontEnd">
                <i class="fas fa-eye-slash mr-2"></i>
                @if (true)
                <span class="">
                  Show in website
                </span>
                @endif
              </button>
            @endif
          @else
          @endif

          @if ($product->featured_product == 'yes')
            <button class="btn btn-light mr-1" wire:click="makeProductFeaturedProductUndo">
              <i class="fas fa-lock mr-2"></i>
              @if (true)
              <span class="">
                Remove from featured product
              </span>
              @endif
            </button>
          @else
            <button class="btn btn-light mr-1" wire:click="makeProductFeaturedProduct">
              <i class="fas fa-star mr-2"></i>
              @if (true)
              <span class="">
                Mark as featured product
              </span>
              @endif
            </button>
          @endif
        </div>

      </div>
    </div>
  </div>



  {{-- Inventory info --}}
  <div class="bg-white p-3 mb-3">
    <div class="mb-4">
      <h3 class="h5">
        Stock info
      </h3>
    </div>
    <div class="row">
      <div class="col-6">
        Stock applicable
      </div>
      <div class="col-6" style="font-size: 0.8rem;">
        {{ $product->stock_applicable }}
      </div>
    </div>

    @if ($product->stock_applicable == 'yes')
      <div class="row">
        <div class="col-6">
          Inventory unit
        </div>
        <div class="col-6" style="font-size: 0.8rem;">
          {{ $product->inventory_unit }}
        </div>
      </div>

      <div class="row">
        <div class="col-6">
          Stock count
        </div>
        <div class="col-6" style="font-size: 0.8rem;">
          {{ $product->stock_count }}
          {{ $product->inventory_unit }}
        </div>
      </div>

      {{-- Base product --}}
      <div class="mb-3">
        <div class="row">
          <div class="col-6">
            Base product
          </div>
          <div class="col-6" style="font-size: 0.8rem;">
            @if ($product->is_base_product)
              Yes
            @else
              No
            @endif
          </div>
        </div>
      </div>
    @endif

  </div>

  {{-- Creation and update info --}} 
  <div class="border bg-white p-3 my-3">
    <div class="mb-4">
      <h3 class="h5"> Product history </h3>
    </div>
    @if (false)
    <div class="row">
      <div class="col-3">
        Created by
      </div>
      <div class="col-6">
        xx
      </div>
    </div>
    @endif
    <div class="row">
      <div class="col-1">
        Created at
      </div>
      <div class="col-6" style="font-size: 0.8rem;">
        {{ $product->created_at }}
      </div>
    </div>
    <div class="row">
      <div class="col-1">
        Updated at
      </div>
      <div class="col-6" style="font-size: 0.8rem;">
        {{ $product->updated_at }}
      </div>
    </div>
  </div>


</div>
