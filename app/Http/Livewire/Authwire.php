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
        $old_pass = $this->password;
        $this->password = Hash::make($this->password);

        try {
            User::create(['name' => $this->name, 'email' => $this->email, 'password' => $this->password]);
        } catch (\Exception $e) {
            $this->password = $old_pass;
            session()->flash('error', 'Erro ao cadastrar!');
            return;
        }

        //error or redirect
        session()->flash('message', 'Registrado com sucesso!');
    }
    public function loginPage() {
        $this->registerForm = false;
    }
    public function registerPage() {
        $this->registerForm = true;
    }
}
