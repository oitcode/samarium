<div class="d-flex justify-content-center">
  <div class="card card-outline card-primary col-md-4 p-0 shadow">
    <div class="card-header text-center">
      Change Password
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
            <input type="password" class="form-control" placeholder="Current Password" wire:model.defer="currentPassword">
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
            <input type="password" class="form-control" placeholder="New Password" wire:model.defer="newPassword">
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
            <input type="password" class="form-control" placeholder="New Password Confirm" wire:model.defer="newPasswordConfirm">
          </div>
        </div>
  
        <button type="submit" class="btn btn-success form-control rounded-0" wire:click="change">
          <i class="fas fa-sign-in-alt"></i>
          Submit
        </button>
    </div>

  </div>
</div>

