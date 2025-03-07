<div>

  {{--
  |--------------------------------------------------------------------------
  | Website Webpage display
  |--------------------------------------------------------------------------
  |
  | This is the blade file of webpage display in website. For special pages
  | like Contact us page, Calendar page, Notice page, etc we show
  | special content. For other pages we show the webpage
  | content.
  |
  --}}
  
  @if ($isSpecialWebpage == true)

    {{--
    |--------------------------------------------------------------------------
    | Special webpages
    |--------------------------------------------------------------------------
    |
    --}}

    @include ('partials.cms.website.webpage-display-special-pages')
  @else
  
    {{--
    |--------------------------------------------------------------------------
    | Display webpage contents
    |--------------------------------------------------------------------------
    |
    --}}

    @if (!is_null($webpage->webpageContents) && count($webpage->webpageContents) > 0)
      <div class="row" style="margin: auto;">
        <div class="col-md-8">
          @foreach ($webpage->webpageContents()->orderBy('position', 'ASC')->get() as $webpageContent)
            <div class="mb-3" 
                style="
                    @foreach ($webpageContent->cmsWebpageContentCssOptions as $cssOption)
                        {{ $cssOption->option_name }}: {{ $cssOption->option_value }};
                    @endforeach
                ">
               <div>
                 @if ($webpageContent->image_path && (! $webpageContent->video_link && ! $webpageContent->title && ! $webpageContent->body))
                   <div>
                     @if ($webpageContent->image_path)
                       <img src="{{ asset('storage/' . $webpageContent->image_path) }}" class="img-fluid">
                     @endif
                   </div>
                 @else
                   <div class=" p-0 m-0">
                     @if ($webpageContent->title)
                       <h2 class="h1 mb-0" style="color: #000; font-family: Arial; font-weight: bold;">
                         {{ $webpageContent->title}}
                       </h2>
                     @endif
                     @if ($webpageContent->body)
                       <div class="px-3">
                         {!! $webpageContent->body !!}
                       </div>
                     @endif
                   </div>
                   @if ($webpageContent->image_path)
                     <div>
                       <img src="{{ asset('storage/' . $webpageContent->image_path) }}" class="img-fluid">
                     </div>
                   @endif
                   @if ($webpageContent->video_link)
                     <div>
                        <iframe class="w-100" {{-- width="560" --}} height="315" src="https://www.youtube.com/embed/{{ $webpageContent->video_link}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                     </div>
                   @endif
                 @endif
               </div>
            </div>
          @endforeach
        </div>
        <div class="col-md-4 p-4">

          {{--
          |
          | Display Webpage question form
          |
          --}}

          <div>
            @livewire ('cms.website.create-webpage-question', ['webpage' => $webpage,])
          </div>
        </div>
      </div>
    @else

      {{--
      |
      | If there is no content in the webpage, show content is coming soon message.
      |
      --}}

      @if ($webpage->is_post == 'no')
        <div class="container py-4 d-flex border shadow-sm bg-light">
          <h2 class="h5 o-heading mt-3">
            <i class="fas fa-exclamation-circle mr-2 text-danger"></i>
            Content is coming soon.
          </h2>
        </div>
      @endif
    @endif
    
    {{--
    |
    | Previous, next posts section.
    |
    --}}

    @if ($webpage->is_post == 'yes')
      <div class="container-fluid border pt-4" style="background-color: #eee;">
        <div class="container p-3">
          <h2 class="h4 font-weight-bold">
            Related posts
          </h2>
          @livewire ('cms.website.related-posts', ['webpage' => $webpage, 'relation' => 'previous',])
        </div>
      </div>
    @endif
  @endif

</div>
