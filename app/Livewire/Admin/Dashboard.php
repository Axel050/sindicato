<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Component;

class Dashboard extends Component
{
    public $miembros =0;
    public $revision =0;

    public function mount(){
      $this->miembros = User::where("idRol", 3)->count();
      $this->revision = User::where("idRol", 2)->count();
    }

    public function render()
    {
        return view('livewire.admin.dashboard');
    }

}
