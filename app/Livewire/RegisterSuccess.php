<?php

namespace App\Livewire;

use Livewire\Component;

class RegisterSuccess extends Component
{

  public $emailSession;
  
    public function redirectLogin(){            
        session()->flash('message', $this->emailSession);        
        return redirect()->route('login');
    }


    public function render()
    {
        return view('livewire.register-success');
    }
}
