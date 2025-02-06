<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Livewire\Component;

class Profile extends Component
{
    public $name;
    public $email;
    public $password;
    public User $user;

    public function update()
    {
        $valid = $this->validate([
            'email' => 'required|email',
            'name' => 'required',
            'password' => ''
        ],[
            'email.required' => 'Entrer email',
            'email.email' => 'Email est invalide',
            'name.required' => 'Entrer votre nom'
        ]);

        if (!isset($this->password)) {
            unset($valid['password']);
        }

        $this->user->update($valid);

        $this->password = '';

        // Dispatch d'un événement personnalisé pour SweetAlert2
        $this->dispatch('show-swal',
            type: 'success',
            title: 'Succès',
            text: 'Profile modifié avec succès.',
        );
    
        
    }

    public function mount()
    {
        $user = auth()->user();

        $this->user = User::find(auth()->id());
        $this->name = $user->name;
        $this->email = $user->email;
        
    }

    public function render()
    {
        return view('livewire.auth.profile');
    }
}
