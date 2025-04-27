<?php
namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class Profile extends Component
{
    use WithFileUploads;

    public $name;
    public $email;
    public $image; // This will store the path from DB
    public $newImage; // This will be used for temporary uploads

    public $current_password;
    public $new_password;
    public $confirm_password;

    public $profileUpdated = false;
    public $passwordUpdated = false;

    public function mount()
    {
        $user = Auth::user();
        $this->name = $user->name;
        $this->email = $user->email;
        $this->image = $user->image; // saved image path
    }

    public function saveProfile()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . Auth::id(),
            'newImage' => 'nullable|image|max:2048', // new image upload
        ]);

        $user = Auth::user();
        $user->name = $this->name;
        $user->email = $this->email;

        if ($this->newImage) {
            $imagePath = $this->newImage->store('images', 'public');
            $user->image = $imagePath;
            $this->image = $imagePath; // update for display
        }

        $user->save();

        $this->profileUpdated = true;
    }

    public function updatePassword()
    {
        $this->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8',
            'confirm_password' =>'required_with:new_password|same:new_password|min:8' 
        ]);

        
        if (!Hash::check($this->current_password, Auth::user()->password)) {
            $this->addError('current_password', 'The current password is incorrect.');
            return;
        }

        $user = Auth::user();
        $user->password = Hash::make($this->new_password);
        $user->save();

        $this->reset(['current_password', 'new_password', 'confirm_password']);
        $this->passwordUpdated = true;
    }

    public function render()
    {
        return view('livewire.profile')
            ->extends('layouts.master')
            ->section('content');
    }
}
