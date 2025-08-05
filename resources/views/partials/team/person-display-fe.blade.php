<div class="card team-card-rm o-border-radius">
    <div class="blog-post-image mb-0 bg-light @if (! $person->image_path) bg-primary @endif o-border-radius">
      @if ($person->image_path)
        {{-- Circular person image --}}
        <img src="{{ asset('storage/' . $person->image_path) }}" 
             class="profile-img rounded-circle" 
             alt="{{ $person->name }}">
      @else
        <i class="fas fa-user-circle fa-6x text-muted"></i>
      @endif
    </div>

    <div class="card-body text-center p-4">
        @if (false)
        <div class="avatar-container mb-3">
            <div class="avatar">N</div>
        </div>
        @endif

        <h3 class="member-name mb-2">{{ $person->name }}</h3>
        <p class="member-role mb-4 o-ascent-text-color-bg">{{ $person->comment }}</p>
        <div class="contact-info">
            <a href="tel:+9779845128355" class="contact-item">
                <i class="fas fa-phone mr-1 o-ascent-text-color-bg"></i>
                <span class="contact-text">{{ $person->phone }}</span>
            </a>
            <a href="mailto:niruta.thapa@company.com" class="contact-item">
                <i class="fas fa-envelope mr-1 o-ascent-text-color-bg"></i>
                <span class="contact-text">{{ $person->email }}</span>
            </a>
        </div>
    </div>
</div>
