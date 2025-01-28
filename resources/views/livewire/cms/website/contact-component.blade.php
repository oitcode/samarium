<div>


  <div class="container p-0">
    <div class="row" style="margin: auto;">
      @if ($onlyForm != 'yes')
      <div class="col-md-6 p-4">
        <div class="d-flex">
          <div class="d-flex flex-column justify-content-center">
            <div>
              <h2 class="h1 font-weight-bold">
                {{ $company->name }}
              </h2>
            </div>
          </div>
        </div>
  
        <div class="table-resposive">
          <table class="table table-sm table-borderless">
            <tbody>
              <tr>
                <th>
                  Address
                </th>
                <td>
                  {{ $company->address }}
                </td>
              </tr>
              <tr>
                <th>
                  Phone
                </th>
                <td>
                  {{ $company->phone }}
                </td>
              </tr>
              <tr>
                <th>
                  Email
                </th>
                <td>
                  {{ $company->email }}
                </td>
              </tr>
            </tbody>
          </table>
        </div>

        <div class="my-5">
          <h2 class="h5 font-weight-bold my-3">
            Our social media pages
          </h2>
          <div>
            @if ($company->fb_link)
              <a href="{{ $company->fb_link }}" target="_blank">
                <div class="float-left text-primary" style="">
                  <i class="fab fa-facebook mr-3 fa-2x"></i>
                </div>
              </a>
            @endif
            @if ($company->twitter_link)
              <a href="{{ $company->twitter_link }}" target="_blank">
                <div class="float-left text-info" style="">
                  <i class="fab fa-twitter mr-3 fa-2x"></i>
                </div>
              </a>
            @endif
            @if ($company->insta_link)
              <a href="{{ $company->insta_link }}" target="_blank">
                <div class="float-left text-danger" style="">
                  <i class="fab fa-instagram mr-3 fa-2x"></i>
                </div>
              </a>
            @endif
            @if ($company->youtube_link)
              <a href="{{ $company->youtube_link }}" target="_blank">
                <div class="float-left text-danger" style="">
                  <i class="fab fa-youtube mr-3 fa-2x"></i>
                </div>
              </a>
            @endif
            @if ($company->tiktok_link)
              <a href="{{ $company->tiktok_link }}" target="_blank">
                <div class="float-left text-danger" style="">
                  <i class="fab fa-tiktok mr-3 fa-2x"></i>
                </div>
              </a>
            @endif
            <div class="clearfix">
            </div>
          </div>
        </div>
      </div>
      @endif
      <div class="@if ($onlyForm == 'yes') col-md-12 @else col-md-6 @endif bg-white border p-0">
        <div>
        <h2 class="h5 o-heading text-md-center pl-3 py-3">
          Send us a message
          </h2>
        </div>
        <div class="p-3">
        
          @if (session()->has('message'))
            <div class="alert alert-success">
              {{ session('message') }}
            </div>
          @endif
        
          <div class="form-group">
            <input type="text" class="form-control" wire:model="sender_name" placeholder="Name">
            @error('sender_name') <span class="text-danger">{{ $message }}</span> @enderror
          </div>
        
          <div class="form-group">
            <input type="email" class="form-control" wire:model="sender_email" placeholder="Email">
            @error('sender_email') <span class="text-danger">{{ $message }}</span> @enderror
          </div>
        
          <div class="form-group">
            <input type="text" class="form-control" wire:model="sender_phone" placeholder="Phone">
            @error('sender_phone') <span class="text-danger">{{ $message }}</span> @enderror
          </div>
        
          <div class="form-group">
            <textarea class="form-control" rows="3" wire:model="message" placeholder="Message"></textarea>
            @error('message') <span class="text-danger">{{ $message }}</span> @enderror
          </div>
        
          <button type="submit"
              class="btn btn-block badge-pill py-3"
              wire:click="store"
              style="
                background-color:
                  @if (\App\CmsTheme::first())
                    {{ \App\CmsTheme::first()->ascent_bg_color }}
                  @else
                    orange
                  @endif
                  ;
                color:
                  @if (\App\CmsTheme::first())
                    {{ \App\CmsTheme::first()->ascent_text_color }}
                  @else
                    white
                  @endif
                  ;
              ">
            SEND MESSAGE
          </button>
        </div>
      </div>
    </div>
  </div>


</div>
