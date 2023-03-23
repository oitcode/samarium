<div class="p-3 bg-white border shadow-sm">

  <div class="row">
    <div class="col-md-8">
      {{-- Webpage name --}}
      <div class="mb-4">
        <h2>
          {{ $webpage->name }}
        </h2>
      </div>

      @if ($webpage->name == 'Post')
        <div>
          <i class="fas fa-exclamation-circle mr-3" ></i>
          You cannot add content to this page.
          This page will show list of all the posts.
        </div>
      @else
        {{-- Toolbar --}}
        <div class="mb-3 p-2 d-none d-md-block bg-dark-rm">
          @include ('partials.dashboard.tool-bar-button-pill', [
              'btnClickMethod' => "enterMode('createWebpageContent')",
              'btnIconFaClass' => 'fas fa-plus-circle',
              'btnText' => 'Add content',
              'btnCheckMode' => 'createWebpageContent',
          ])

          @include ('partials.dashboard.tool-bar-button-pill', [
              'btnClickMethod' => "clearModes",
              'btnIconFaClass' => 'fas fa-eraser',
              'btnText' => 'Clear modes',
              'btnCheckMode' => '',
          ])

          @include ('partials.dashboard.spinner-button')

          <div class="clearfix">
          </div>
        </div>

        <div class="">
          @if ($modes['createWebpageContent'])
            @livewire ('cms.dashboard.webpage-display-webpage-content-create', [ 'webpage' => $webpage, ])
          @else
            <div class="" style="">
              @foreach ($webpage->webpageContents()->orderBy('position', 'ASC')->get() as $webpageContent)
                @livewire ('cms.dashboard.webpage-content-display', ['webpageContent' => $webpageContent,], key(rand()))
              @endforeach
            </div>
          @endif
        </div>
      @endif
    </div>
    <div class="col-md-4">

      @if ($webpage->name == 'Post')
      @else
      {{-- Basic details --}}
      <div class="border mb-4">
        <div class="table-responsive">
          <table class="table mb-0">
            <tbody>
              <tr>
                <th> Created at </th>
                <th> {{ $webpage->created_at }} </th>
              </tr>
              <tr>
                <th> Updated at </th>
                <th> {{ $webpage->updated_at }} </th>
              </tr>
              <tr>
                <th> Permalink </th>
                <th> {{ $webpage->permalink }} </th>
              </tr>
              <tr>
                <th> Visibility </th>
                <th>
                  @if ($modes['editVisibilityMode'])
                    @livewire ('cms.dashboard.webpage-edit-visibility', ['webpage' => $webpage,])
                  @else
                    <div class="d-flex justify-content-between">
                      <div>
                        @if ($webpage->visibility == null)
                          @if (true)
                          <i class="fas fa-exclamation-circle mr-1"></i>
                          @endif
                          Not set
                        @elseif ($webpage->visibility == 'public')
                          Public
                        @elseif ($webpage->visibility == 'private')
                          Private
                        @else
                          Whoops
                        @endif
                      </div>

                      <div>
                        <button class="btn btn-light border mx-3" wire:click="enterModeSilent('editVisibilityMode')">
                          Edit
                        </button>
                      </div>
                    </div>
                  @endif
                </th>
              </tr>
              <tr>
                <th> Category </th>
                <th>
                  @if ($modes['editWebpageCategoryMode'])
                    @livewire ('cms.dashboard.webpage-edit-webpage-category', ['webpage' => $webpage,])
                  @else
                    <div class="d-flex justify-content-between">
                      <div>
                        @if (count($webpage->webpageCategories) > 0)
                          @foreach ($webpage->webpageCategories as $category)
                            <span class="badge badge-primary mr-3">
                              {{ $category->name }}
                            </span>
                          @endforeach
                        @else
                          None
                        @endif
                      </div>

                      <button class="btn btn-light border mx-3" wire:click="enterModeSilent('editWebpageCategoryMode')">
                        Add
                      </button>
                    </div>
                  @endif
                </th>
              </tr>
            </tbody>
          </table>
        </div>
      </div>


      {{-- Featured Image --}}
      <div class="border">
        <h2 class="p-3 bg-light">
          Featured image
          @if (! $modes['editFeaturedImageMode'])
            @if ($webpage->featured_image_path)
              <button class="btn btn-light" wire:click="removeFeaturedImage">
                Remove
              </button>
            @endif
          @endif
        </h2>

        @if ($modes['editFeaturedImageMode'])
          <div class="p-2">
            @livewire ('cms.dashboard.webpage-edit-featured-image', ['webpage' => $webpage,])
          </div>
        @else
          @if ($webpage->featured_image_path)
            <div>
              <img src="{{ asset('storage/' . $webpage->featured_image_path) }}"
                  class="img-fluid rounded-circle-rm"
                  style=""
              >
            </div>
          @else
            <div class="p-2 form-group">
                <label for="">Featured Image</label>
                <input type="file" class="form-control" wire:model="featured_image">
                @error('featured_image') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="p-2 my-2">
              <button class="btn btn-success" wire:click="addFeaturedImage">
                Save
              </button>
            </div>
          @endif
        @endif

      </div>
      @endif

    </div>
  </div>

</div>
