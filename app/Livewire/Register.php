<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Register extends Component
{


    public $email;
public $name ;
    public $password;

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required',
        'name'     => 'required|string|max:255',


    ];



    public function mount()
    {
        if (Auth::check()) {
            return redirect()->route('dashboard'); // Redirect after login
        }
    }




    public function register()
    {

        $this->validate();

        $user = User::create([
            'name'     => $this->name,
            'email'    => $this->email,
            'password' => Hash::make($this->password),
            'role' => 2
        ]);
        Auth::login($user);

          if (Auth::check()) {
            return redirect()->route('dashboard'); // Redirect after login
        }
    }



    public function render()
    {
        return view('livewire.register');
    }
}
