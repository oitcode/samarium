
@if ($company->companyInfos()->where('info_key', 'Associated with')->first())
    <div class="container-fluid py-5 border-top bg-light">
        <div class="container">
            <h2 class="h4 font-weight-bold text-center mb-5 text-dark">
                {{ $company->companyInfos()->where('info_key', 'Associated with')->first()->info_key }}
            </h2>
            <div class="row justify-content-center">
                @foreach ($company->companyInfos()->where('info_key', 'Associated with')->get() as $companyInfo)
                    <div class="col-6 col-md-3 mb-4 px-3 px-lg-4">
                        <div class="card bg-white shadow-sm p-4">
                            <div class="mb-3 font-weight-bold" style="font-family: 'Courier New', Courier, monospace; color: #112332;">
                                {{ $companyInfo->info_value }}
                            </div>
                            @if ($companyInfo->image_path)
                                <img src="{{ asset('storage/' . $companyInfo->image_path) }}"
                                     class="img-fluid"
                                     style="max-height: 60px; object-fit: contain; aspect-ratio: 1/1; object-position: center;"
                                     alt="{{ $companyInfo->info_value }} logo">
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endif
<div class="container-fluid py-5" style="background-color: #112332; color: white;">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-4 col-md-6 mb-5 px-3 px-lg-4">
                <div class="card bg-transparent border-0 text-center text-md-left">
                    <div class="d-flex justify-content-center justify-content-md-start">
                        <img src="{{ asset('storage/' . $company->logo_image_path) }}"
                             class="img-fluid mb-4 rounded"
                             style="max-height: 100px; max-width: 100px; object-fit: contain; aspect-ratio: 1/1; object-position: center;"
                             alt="{{ $company->name }} logo">
                    </div>
                    <div class="card-body p-0">
                        <div class="mb-3">
                            <strong>Address:</strong> {{ $company->address }}
                        </div>
                        <div class="mb-3">
                            <strong>Phone:</strong> {{ $company->phone }}
                        </div>
                        <div>
                            <strong>Email:</strong> {{ $company->email }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-5 px-3 px-lg-4">
                <div class="row">
                    <div class="col-6 px-2">
                        <h3 class="h5 font-weight-bold mb-4 text-white">About Us</h3>
                        <p class="text-white">{{ $company->brief_description }}</p>
                    </div>
                    <div class="col-6 px-2">
                        <h3 class="h5 font-weight-bold mb-4 text-white">Quick Links</h3>
                        <ul class="list-unstyled">
                            <li class="mb-3">
                                <a href="/contact-us" class="text-white text-decoration-none">Contact Us</a>
                            </li>
                            <li class="mb-3">
                                <a href="/post" class="text-white text-decoration-none">Blogs</a>
                            </li>
                            <li class="mb-3">
                                <a href="/write-testimonial" class="text-white text-decoration-none">Feedback</a>
                            </li>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 mb-5 px-3 px-lg-4">
                <div class="card bg-transparent border-0">
                    <div class="card-body p-0">
                        <h3 class="h5 font-weight-bold mb-4 text-center text-md-left text-white">Follow Us</h3>
                        <div class="d-flex justify-content-center justify-content-md-start mb-4">
                            @if ($company->fb_link)
                                <a href="{{ $company->fb_link }}" class="text-white mx-2" target="_blank">
                                    <i class="fab fa-facebook fa-2x"></i>
                                </a>
                            @endif
                            @if ($company->twitter_link)
                                <a href="{{ $company->twitter_link }}" class="text-white mx-2" target="_blank">
                                    <i class="fab fa-twitter fa-2x"></i>
                                </a>
                            @endif
                            @if ($company->insta_link)
                                <a href="{{ $company->insta_link }}" class="text-white mx-2" target="_blank">
                                    <i class="fab fa-instagram fa-2x"></i>
                                </a>
                            @endif
                            @if ($company->youtube_link)
                                <a href="{{ $company->youtube_link }}" class="text-white mx-2" target="_blank">
                                    <i class="fab fa-youtube fa-2x"></i>
                                </a>
                            @endif
                            @if ($company->tiktok_link)
                                <a href="{{ $company->tiktok_link }}" class="text-white mx-2" target="_blank">
                                    <i class="fab fa-tiktok fa-2x"></i>
                                </a>
                            @endif
                        </div>
                        <h3 class="h5 font-weight-bold mb-4 text-center text-md-left text-white">Subscribe</h3>
                        @livewire('ecomm-website.subscribe-us', ['introMessage' => 'Please enter your email address to get latest updates on our activities.'])
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--
    | Copyright notice and package developer branding
    --}}
    <hr class="border-light">
    <div class="container-fluid text-center py-4">
        <div class="mb-2 text-white">
            © {{ date('Y') }} | {{ $company->name }} | All rights reserved
        </div>
        <div class="text-white">
            Powered by
            <a href="https://github.com/oitcode/samarium" class="text-white text-decoration-none" target="_blank"><u>Samarium</u></a>
            <i class="fas fa-check-circle ml-2"></i>
        </div>
    </div>
</div>