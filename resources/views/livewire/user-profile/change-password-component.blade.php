<div class="d-flex justify-content-center">
    <div class="card card-outline card-primary col-md-4 p-0 shadow mt-4">
      <div class="card-header text-center">
        <h1 class="h5 font-weight-bold pt-2 o-heading">
          Change Password
        </h1>
      </div>

      <div class="card-body">

          @if (session()->has('passwordChangeMessage'))
            <div class="text-success text-center mb-3">
              {{ session('passwordChangeMessage') }}
            </div>
          @endif

          @error('currentPassword')
            <div class="text-danger">
              <small>
                {{ $message }}
              </small>
            </div>
          @enderror
          <div class="form-group">
            <div class="input-group mb-2">
              <div class="input-group-prepend">
                <div class="input-group-text">
                  <i class="fas fa-lock"></i>
                </div>
              </div>
              <input type="password" class="form-control" placeholder="Current Password" wire:model="currentPassword">
            </div>
          </div>

          @error('newPassword')
            <div class="text-danger">
              <small>
                {{ $message }}
              </small>
            </div>
          @enderror
          <div class="form-group">
            <div class="input-group mb-2">
              <div class="input-group-prepend">
                <div class="input-group-text">
                  <i class="fas fa-lock"></i>
                </div>
              </div>
              <input type="password" class="form-control" placeholder="New Password" wire:model="newPassword">
            </div>
          </div>
    
          @error('newPasswordConfirm')
            <div class="text-danger">
              <small>
                {{ $message }}
              </small>
            </div>
          @enderror
          <div class="form-group">
            <div class="input-group mb-2">
              <div class="input-group-prepend">
                <div class="input-group-text">
                  <i class="fas fa-lock"></i>
                </div>
              </div>
              <input type="password" class="form-control" placeholder="New Password Confirm" wire:model="newPasswordConfirm">
            </div>
          </div>
    
          @include ('partials.button-general-block', ['clickMethod' => 'change', 'btnText' => 'Submit',])
      </div>

    </div>
</div>

