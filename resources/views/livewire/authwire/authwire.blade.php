<div>
    <div class="card">
        <div class="card-header text-center">
            <h5>{{ empty($registerForm) ? 'Login' : 'Cadastrar' }}</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    @if (session()->has('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif
                    @if (session()->has('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                </div>
            </div>

            @if ($registerForm)
                <form>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name">Nome: </label>
                                <input type="text" wire:model="name" class="form-control">
                                @error('name')
                                    <span class="text-danger error">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name">Email: </label>
                                <input type="text" wire:model="email" class="form-control">
                                @error('email')
                                    <span class="text-danger error">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name">Password: </label>
                                <input type="password" wire:model="password" class="form-control">
                                @error('password')
                                    <span class="text-danger error">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12 text-center mt-3">
                            <a class="btn text-white btn-primary float-start" wire:click.prevent="loginPage">
                                Voltar para Login
                            </a>
                            <button class="btn text-white btn-success float-end" wire:click.prevent="register">
                                Cadastrar
                            </button>
                        </div>
                    </div>
                </form>
            @else
                <form>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name">Email: </label>
                                <input type="email" wire:model="email" class="form-control">
                                @error('email')
                                    <span class="text-danger error">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name">Password: </label>
                                <input type="password" wire:model="password" class="form-control">
                                @error('password')
                                    <span class="text-danger error">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12 text-center mt-3">
                            <a class="btn text-white btn-primary float-start" wire:click.prevent="registerPage">
                                Criar Conta
                            </a>
                            <button type="submit" class="btn text-white btn-success float-end"
                                wire:click.prevent="login">
                                Logar
                            </button>
                        </div>
                    </div>
                </form>
                <small>Default pela seed: <br> admin@admin <br> admin</small>
            @endif
        </div>
    </div>
</div>
