<div class="p-0">


{{--
*
* Livewire component: Webpage display in dashboard.
*
* This is the livewire component to display webpage in dashboard.
*
--}}


  {{--
  |
  | Toolbar.
  |
  --}}

  <x-toolbar-component>
    <x-slot name="toolbarInfo">
      @if ($webpage->is_post == 'yes')
        Post
      @else
        Webpage
      @endif
      <i class="fas fa-angle-right mx-2"></i>
      {{ $webpage->name }}
    </x-slot>
    <x-slot name="toolbarButtons">
      @include ('partials.dashboard.spinner-button')

      <button class="btn btn-light p-3 mr-2" wire:click="$refresh">
        <i class="fas fa-refresh"></i>
      </button>

      <button class="btn btn-danger p-3" wire:click="closeThisComponent">
        <i class="fas fa-times"></i>
        <span class="d-none d-md-inline">
          Close
        </span>
      </button>
    </x-slot>
  </x-toolbar-component>

  <div class="row" style="margin: auto;">
    <div class="col-md-8 p-0">
      <div class="bg-white border mb-4 p-2">
        {{--
        | Webpage name
        --}}
        <div class="mt-3">
          <h2 class="h5 font-weight-bold">
            {{ $webpage->name }}
          </h2>
        </div>

        @if ($webpage->name == 'Post')
          <div>
            <i class="fas fa-exclamation-circle mr-3" ></i>
            You cannot add content to this page.
            This page will show list of all the posts.
          </div>
        @elseif ($webpage->name == 'Gallery')
          <div>
            <i class="fas fa-exclamation-circle mr-3" ></i>
            You cannot add content to this page.
            This page will show all the galleries.
          </div>
        @else

          {{--
          | Toolbar
          --}}
          <x-toolbar-classic toolbarTitle="" toolbarAlign="left">
            @include ('partials.dashboard.tool-bar-button-pill', [
                'btnClickMethod' => "enterMode('createWebpageContent')",
                'btnIconFaClass' => 'fas fa-plus-circle',
                'btnText' => 'Add content',
                'btnCheckMode' => 'createWebpageContent',
                'borderLess' => 'yes',
            ])

            @include ('partials.dashboard.spinner-button')
          </x-toolbar-classic>

          <div>
            @if ($modes['createWebpageContent'])
              @livewire ('cms.dashboard.webpage-display-webpage-content-create', [ 'webpage' => $webpage, ])
            @else
              <div>
                @foreach ($webpage->webpageContents()->orderBy('position', 'ASC')->get() as $webpageContent)
                  @livewire ('cms.dashboard.webpage-content-display', ['webpageContent' => $webpageContent,], key(rand()))
                @endforeach
              </div>
            @endif
          </div>
        @endif
      </div>

      {{-- Webpage question --}}
      <div class="my-4 bg-white border">
        <h2 class="h6 font-weight-bold py-3 px-3 bg-light">
          @if ($webpage->is_post == 'yes')
            Post questions
          @else
            Webpage questions
          @endif
        </h2>

        @if (! $webpage->webpageQuestions)
          <div class="text-secondary my-2 px-3">
            No questions
          </div>
        @else
          @foreach ($webpage->webpageQuestions as $webpageQuestion)
            <div class="px-3 mb-3 border-bottom">
              <div class="mb-2">
                {{ $webpageQuestion->question_text }}
              </div>
              <div class="d-flex text-secondary">
                <div class="mr-3">
                  <small>
                  Asked by:
                  {{ $webpageQuestion->writer_name }}
                  </small>
                </div>
                <div class="mr-3">
                  <small>
                  Asked on:
                  {{ $webpageQuestion->created_at->toDateString() }}
                  </small>
                </div>
                <div class="mr-3">
                  <small>
                  Email:
                  {{ $webpageQuestion->writer_email }}
                  </small>
                </div>
                <div class="mr-3">
                  <small>
                  Phone:
                  {{ $webpageQuestion->writer_phone }}
                  </small>
                </div>
              </div>
            </div>
          @endforeach
        @endif

      </div>
    </div>

    <div class="col-md-4 pr-0">
      {{--
      |
      | Webpage informations
      |
      --}}
      <div class="p-0 pt-3 pt-md-0">

        <div>
          @if (true)
          {{-- Basic details --}}
          <div class="mb-4 bg-white border">
            <div class="table-responsive">
              <table class="table mb-0">
                <tbody>
                  @if (true)
                  <tr class="border-0">
                    <th class="border-0"> Created at </th>
                    <td class="border-0"> {{ $webpage->created_at }} </td>
                  </tr>
                  <tr>
                    <th class="border-0"> Updated at </th>
                    <td class="border-0"> {{ $webpage->updated_at }} </td>
                  </tr>
                  @endif
                  <tr>
                    <th class="border-0"> Permalink </th>
                    <td class="border-0"> {{ $webpage->permalink }} </td>
                  </tr>
                  <tr>
                    <th class="border-0"> Visibility </th>
                    <td class="border-0">
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
                            <button class="btn btn-light mx-3" wire:click="enterModeSilent('editVisibilityMode')">
                              <i class="fas fa-pencil-alt"></i>
                            </button>
                          </div>
                        </div>
                      @endif
                    </td>
                  </tr>
                  <tr>
                    <th class="border-0"> Category </th>
                    <td class="border-0">
                      @if ($modes['editWebpageCategoryMode'])
                        @livewire ('cms.dashboard.webpage-edit-webpage-category', ['webpage' => $webpage,])
                      @else
                        <div class="d-flex justify-content-between">
                          <div>
                            @if (count($webpage->webpageCategories) > 0)
                              @foreach ($webpage->webpageCategories as $category)
                                <span class="badge badge-primary">
                                  {{ $category->name }}
                                </span>
                                <i class="fas fa-times-circle text-danger mr-3" wire:click="removePostCategory({{ $category }}, {{ $webpage}})"
                                role="button"></i>
                              @endforeach
                            @else
                              None
                            @endif
                          </div>

                          <button class="btn btn-light mx-3" wire:click="enterModeSilent('editWebpageCategoryMode')">
                            <i class="fas fa-plus-circle"></i>
                          </button>
                        </div>
                      @endif
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          @endif


          {{-- Featured Image --}}
          <div class="mb-4 bg-white border">
            <div class="d-flex justify-content-between">
              <h2 class="h6 font-weight-bold py-3 px-3 bg-light">
                Featured image
              </h2>
              @if (! $modes['editFeaturedImageMode'])
                @if ($webpage->featured_image_path)
                  <button class="btn btn-light mr-4" wire:click="removeFeaturedImage">
                    <i class="fas fa-times-circle text-danger"></i>
                  </button>
                @endif
              @endif
            </div>

            @if ($modes['editFeaturedImageMode'])
              <div class="p-2">
                @livewire ('cms.dashboard.webpage-edit-featured-image', ['webpage' => $webpage,])
              </div>
            @else
              @if ($webpage->featured_image_path)
                <div>
                  <img src="{{ asset('storage/' . $webpage->featured_image_path) }}"
                      class="img-fluid"
                      style=""
                  >
                </div>
              @else
                <div class="p-3 form-group mb-0">
                    <label for="">Featured Image</label>
                    <input type="file" class="form-control" wire:model.live="featured_image">
                    @error('featured_image') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="p-3">
                  <button class="btn btn-success" wire:click="addFeaturedImage">
                    Save
                  </button>
                  <button wire:loading class="btn">
                    <span class="spinner-border text-info mr-3" role="status">
                    </span>
                  </button>
                </div>
              @endif
            @endif

          </div>

          @if ($webpage->is_post != 'yes')
          {{-- Post page part --}}
          <div class="mb-4 bg-white border">
            <h2 class="h6 font-weight-bold py-3 px-3 bg-light">
              Post page
            </h2>
            <div class="px-3">
              @if ($modes['editWebpageCategoryPostpageMode'])
                @livewire ('cms.dashboard.webpage-edit-webpage-category-postpage', ['webpage' => $webpage,])
              @else
                <div class="d-flex justify-content-between">
                  <div>
                    @if (count($webpage->webpageCategoriesPostpage) > 0)
                      @foreach ($webpage->webpageCategoriesPostpage as $category)
                        <span class="badge badge-primary mr-3">
                          {{ $category->name }}
                        </span>
                      @endforeach
                    @else
                      None
                    @endif
                  </div>

                  <button class="btn btn-light mx-3" wire:click="enterModeSilent('editWebpageCategoryPostpageMode')">
                    <i class="fas fa-plus-circle"></i>
                  </button>
                </div>
              @endif
            </div>
          </div>

          {{-- Team page part --}}
          <div class="p-2-rm mb-4 bg-white border">
            <h2 class="h6 font-weight-bold py-3 px-3 bg-light">
              Team page
            </h2>
            <div class="px-3">
              @if ($modes['editTeamTeampageMode'])
                @livewire ('cms.dashboard.webpage-edit-team-teampage', ['webpage' => $webpage,])
              @else
                <div class="d-flex justify-content-between">
                  <div>
                    @if (count($webpage->webpageTeams) > 0)
                      @foreach ($webpage->webpageTeams as $team)
                        <span class="badge badge-primary mr-3">
                          {{ $team->name }}
                        </span>
                      @endforeach
                    @else
                      None
                    @endif
                  </div>

                  <button class="btn btn-light mx-3" wire:click="enterModeSilent('editTeamTeampageMode')">
                    <i class="fas fa-plus-circle"></i>
                  </button>
                </div>
              @endif
            </div>
          </div>
          @endif


        </div>

      </div>
    </div>
  </div>



</div>
