<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Hash;
use App\Models\User;

class Authwire extends Component {
    public $users, $email, $password, $name;
    public $registerForm = false;
    public function render() {
        return view('livewire.authwire.authwire');
    }
    private function resetInputFields() {
        $this->name = '';
        $this->email = '';
        $this->password = '';
    }
    public function login() {
        $validateDate = $this->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if (\Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
            //redirect
            session()->flash('message', 'Logado com sucesso!');
            return redirect()->to('/stores');
        } else {
            session()->flash('error', 'Email ou senha inválidos');
        }
    }
    public function register() {
        $validateDate = $this->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required'
        ]);
        $hashPass = Hash::make($this->password);

        try {
            $user = User::create(['name' => $this->name, 'email' => $this->email, 'password' => $hashPass]);
            \Auth::login($user);
        } catch (\Exception $e) {
            session()->flash('error', 'Erro ao cadastrar!');
            return;
        }

        session()->flash('message', 'Registrado com sucesso!');
        return redirect()->to('/stores');
    }
    public function loginPage() {
        $this->registerForm = false;
    }
    public function registerPage() {
        $this->registerForm = true;
    }
}
