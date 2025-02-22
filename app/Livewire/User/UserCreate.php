<?php

namespace App\Livewire\User;

use Illuminate\View\View;
use Livewire\Component;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use App\User;

class UserCreate extends Component
{
    public string | null $name;
    public string | null $email;
    public string | null $role;
    public string | null $password;
    public string | null $password_confirm;

    public function render(): View
    {
        return view('livewire.user.user-create');
    }

    public function store(): void
    {
        $validatedData = $this->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'role' => 'required',
            'password' => 'required',
            'password_confirm' => 'required|same:password',
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);
        $validatedData['last_login_at'] = Carbon::now();

        User::create($validatedData);

        $this->dispatch('userCreated');
    }
}
