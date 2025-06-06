<?php

namespace App\Livewire\Auth;

use App\Livewire\Forms\LoginForm;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Login extends Component
{

  public LoginForm $form;

  #[Layout('livewire.layouts.guest')]
  public function render()
  {
    return view('livewire.auth.login');
  }

  public function login(): void
  {
    $this->validate();

    $this->form->authenticate();

    Session::regenerate();

    $this->redirectIntended(default: route('catalog', absolute: false), navigate: true);
  }
};
