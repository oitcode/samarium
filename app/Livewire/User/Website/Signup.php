<?php

namespace App\Livewire\User\Website;

use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use App\User;

class Signup extends Component
{
    public function render()
    {
        return view('livewire.user.website.signup');
    }

    public function store()
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
