<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        $users = User::all();

        return view('livewire.dashboard', compact('users'));
    }
}
