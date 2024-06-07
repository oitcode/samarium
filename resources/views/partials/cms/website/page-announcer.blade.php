{{--
|
| Page announcer blade file.
|
| This is the page announcer blade file for webpages.
|
--}}

<div class="">
@if ($webpage->featured_image_path != null)
  @include ('partials.cms.website.featured-image-page-announcer')
@else
  @include ('partials.cms.website.no-featured-image-page-announcer')
@endif
</div>
