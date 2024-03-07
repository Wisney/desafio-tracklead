@if ($updateStore)
    <form class="col-12 col-md-6 border">
        <input type="hidden" wire:model="store_id">
        <div class="form-group mb-3">
            <label for="storeName">Nome: *</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="storeName" placeholder="Nome"
                wire:model="name">
            @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group mb-3">
            <label for="storeLocation">Localização: *</label>
            <input class="form-control @error('location') is-invalid @enderror" id="storeLocation" wire:model="location"
                placeholder="Localização">
            @error('location')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group mb-3">
            <label for="storeDescription">Descrição: *</label>
            <textarea class="form-control @error('description') is-invalid @enderror" id="storeDescription" wire:model="description"
                placeholder="Descrição"></textarea>
            @error('description')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="d-grid gap-2">
            <button wire:click.prevent="update()" class="btn btn-success btn-block">Salvar Alteração</button>
            <button wire:click.prevent="cancel()" class="btn btn-danger">Cancelar</button>
        </div>
    </form>
    <hr>
    <div class="border col-12 col-md-6">
        <h5 class="text-center">Pixels</h5>
    </div>
    <div class="row">
        @if (!empty($pixels))
            @foreach ($pixels as $key => $pixel)
                <form class="col-12 col-md-4 border">
                    <input type="hidden" value="{{ $pixel->id }}">
                    <div class="form-group mb-3">
                        <label for="pixelPlatform{{ $key }}">Plataforma: *</label>
                        <input type="text" class="form-control @error('platform') is-invalid @enderror"
                            id="pixelPlatform{{ $key }}" placeholder="Plataforma"
                            value="{{ $pixel->platform }}">
                        @error('platform')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="pixelCode{{ $key }}">Code: *</label>
                        <textarea class="form-control @error('location') is-invalid @enderror" id="pixelcode{{ $key }}"
                            placeholder="Code">{{ $pixel->code }}</textarea>
                        @error('location')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="d-grid gap-2">
                        <button wire:click.prevent="update_pixel()" class="btn btn-success btn-block">
                            Salvar Alteração
                        </button>
                        <button wire:click.prevent="delete_pixel()" class="btn btn-danger">
                            Deletar Pixel
                        </button>
                    </div>
                </form>
            @endforeach
        @endif
    </div>
@else
    //create
@endif
