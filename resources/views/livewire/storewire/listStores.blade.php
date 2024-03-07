@if (empty($stories))
    <h3 class="p-3">Nenhum Store encontrado</h3>
@else
    @foreach ($stories as $store)
        <div class="card text-center col-12 col-md-3 m-3">
            <div class="card-title">
                <h1>{{ $store->name }}</h1>
            </div>
            <div class="card-body pt-1 text-start">
                <p class="text-truncate">Localização: {{ $store->location }}</p>
                <p class="text-truncate">Descrição: {{ $store->description }}</p>
                <hr class="mb-0">
                <div class="text-center fw-normal">
                    <h5>Pixels</h5>
                    @if (!empty($store->pixels))
                        @foreach ($store->pixels as $pixel)
                            <span class="badge bg-light text-dark">{{ $pixel->platform }}</span>
                        @endforeach
                    @endif
                </div>
                <hr>
                <div class="text-end">
                    <button wire:click="edit({{ $store->id }})" class="btn btn-primary btn-sm">Ver/Editar</button>
                    <button onclick="deleteStore({{ $store->id }})" class="btn btn-danger btn-sm">Deletar</button>
                </div>
            </div>
        </div>
    @endforeach
@endif
