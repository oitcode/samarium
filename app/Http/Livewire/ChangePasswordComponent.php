<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangePasswordComponent extends Component
{
    public $currentPassword;
    public $newPassword;
    public $newPasswordConfirm;

    public function render()
    {
        return view('livewire.change-password-component');
    }

    public function change()
    {
        $validatedData = $this->validate([
            'currentPassword' => [
                'required',
                function ($attribute, $value, $fail) {
                    if (!Hash::check($value, Auth::user()->password)) {
                        $fail('Current Password is invalid');
                    }
                },
            ],
            'newPassword' => 'required',
            'newPasswordConfirm' => 'required|same:newPassword',
        ]);

        $user = Auth::user();

        $user->password = Hash::make($this->newPassword);
        $user->save();

        $this->resetInput();
        session()->flash('passwordChangeMessage', 'Password Changed');
    }

    public function resetInput()
    {
        $this->currentPassword = '';
        $this->newPassword = '';
        $this->newPasswordConfirm = '';
        $this->currentPassword = '';
    }
}
