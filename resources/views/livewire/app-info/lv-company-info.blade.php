<div class="border bg-white p-3 shadow">
    <div>
      <h2 class="h6 font-weight-bold mb-1">
        <div class="mb-3">
          <img src="{{ asset('storage/' . $company->logo_image_path) }}" class="img-fluid" style="height: 75px;">
        </div>
        {{ $company->name }}
      </h2>
    </div>
</div>
