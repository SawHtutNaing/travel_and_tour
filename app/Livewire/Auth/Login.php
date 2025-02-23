<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public $email;

    public $password;

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required',
    ];

    public function mount()
    {

        if (Auth::check()) {
            return redirect()->route('dashboard'); // Redirect after login

        }
    }

    public function login()
    {

        $this->validate();

        if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
            return redirect()->route('dashboard'); // Redirect after login
        }

        session()->flash('error', 'Invalid credentials');
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}
