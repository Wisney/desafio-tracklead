<div>
    <div class="col-md-6 offset-md-3 mb-2">
        <div class="card">
            <div class="card-title text-center mt-3 mb-0">
                <h3 class="mb-0">
                    @if ($isIndexStorePage)
                        Stores
                    @else
                        @if ($updateStore)
                            Editar Store
                        @else
                            Criar Store
                        @endif
                    @endif
                </h3>
            </div>
            <div class="card-body">
                @if (session()->has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session()->get('success') }}
                    </div>
                @endif
                @if (session()->has('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ session()->get('error') }}
                    </div>
                @endif
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        @if ($isIndexStorePage)
            <div class="w-100">
                <button class="float-end btn btn-success" wire:click="new()">Novo</button>
            </div>
        @else
            <div class="w-100">
                <a class="float-end btn btn-primary" href="/stores">Voltar</a>
            </div>
        @endif
        @if ($isIndexStorePage)
            @include('livewire.storewire.listStores')
        @else
            @include('livewire.storewire.store')
        @endif
    </div>
    <script>
        function deleteStore(id) {
            if (confirm("Tem certeza que deseja deletar a Store com seus pixels?"))
                window.livewire.emit('deleteStore', id);
        }
    </script>
</div>
