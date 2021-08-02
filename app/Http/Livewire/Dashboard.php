<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class Dashboard extends Component
{
    public $selectedUserIds = [];
    public $selectAll = false;

    protected $listeners = ['deleteUsers', 'blockUsers', 'toggleUser'];

    public function updatedSelectAll($value)
    {
        if ($value) {
            $this->selectedUserIds = User::query()->pluck('id', 'id')->toArray();
        }
    }

    public function toggleUser($id)
    {
        $id = intval($id);
        $this->selectAll = false;

        if (isset($this->selectedUserIds[$id]))
            unset($this->selectedUserIds[$id]);
        else
            $this->selectedUserIds[$id] = $id;
    }

    public function deleteUsers()
    {
        User::query()->whereIn('id', $this->selectedUserIds)->delete();
    }

    public function blockUsers($block = true)
    {
        $value = $block ? now() : null;

        User::query()->whereIn('id', $this->selectedUserIds)->update(['blocked_at' => $value]);

        if ($block && isset($this->selectedUserIds[auth()->id()])) {
            auth('web')->logout();
            session()->flush('blocked', true);

            return redirect()->route('login');
        }
    }

    public function render()
    {
        $users = User::all();

        return view('livewire.dashboard', compact('users'));
    }
}
