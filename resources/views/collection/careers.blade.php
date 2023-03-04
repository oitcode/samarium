@extends ('website.base')

@section ('pageTitleTag')
  <title>
    Careers
  </title>
@endsection

@section ('googleAnalyticsTag')
@endsection


@section ('fbOgMetaTags')
<meta property="og:url"                content="{{ Request::url() }}" />
<meta property="og:type"               content="article" />
<meta property="og:title"              content="{{ $company->name }}" />
<meta property="og:description"        content="{{ $company->tagline }}" />
<meta property="og:image"              content="{{ asset('storage/' . $company->logo_image_path) }}" />
@endsection

@section ('content')
  <div class="container py-4">
    <h1>
      Careers
    </h1>
  </div>
  <div class="container py-4">
    <div class="row">
      <div class="col-md-6">
        <p>
          Thank you for your interest in having a career in our company. 
          Please send an email to
          <span class="text-primary">{{ $company->email }}</span>
          along with your resume.
          If there is a vacancy suitable for your resume, then one of our staff member
          will contact you for further recruitment process.
        </p>
      </div>
      <div class="col-md-6">
      </div>
    </div>
  </div>
@endsection

