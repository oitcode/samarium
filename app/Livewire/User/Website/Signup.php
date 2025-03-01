<?php

namespace App\Livewire\User\Website;

use Livewire\Component;
use Illuminate\View\View;
use Illuminate\Support\Facades\Hash;
use App\User;

class Signup extends Component
{
    public string | null $name;
    public string | null $email;
    public string | null $password;
    public string | null $password_confirm;

    public function render(): View
    {
        return view('livewire.user.website.signup');
    }

    public function store() // TODO: Type hinting of return type
    {
        $validatedData = $this->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'password_confirm' => 'required|same:password',
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);
        $validatedData['role'] = 'standard';

        User::create($validatedData);

        // $this->dispatch('userCreated');

        return redirect('/login');
    }
}
