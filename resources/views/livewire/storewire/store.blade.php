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
    <div class="w-100 row mb-2">
        <div class="border col-12 col-md-6 offset-md-3">
            <h5 class="text-center">Pixels</h5>
        </div>
        <div class="col-12 col-md-2">
            <button class="float-end btn btn-success" wire:click="newPixel()">Novo</button>
        </div>
    </div>
    <div class="row">
        @if ($isNewPixel)
            <div class="col-12 col-md-4 offset-md-4 mb-2 border">
                <livewire:pixelwire :store_id="$store_id" :isNewPixel="$isNewPixel"></livewire:pixelwire>
                <button wire:click.prevent="cancelLastPixel()" class="btn btn-danger w-100">
                    Cancelar
                </button>
            </div>
        @else
            @if (!empty($pixels))
                @foreach ($pixels as $pixel)
                    <div class="col-12 col-md-4 mb-2 border">
                        <livewire:pixelwire :wire:key="$pixel->id" :store_id="$store_id" :platform="$pixel->platform" :code="$pixel->code"
                            :pixel_id="$pixel->id">
                        </livewire:pixelwire>
                        <button
                            x-on:click="confirm('Tem certeza que deseja deletar o pixel?') ? window.livewire.emit('deletePixel', {{ $pixel->id }}) : false"
                            class="btn btn-danger w-100">
                            Deletar Pixel
                        </button>
                    </div>
                @endforeach
            @endif
        @endif
    </div>
@else
    <form class="col-12 col-md-6 border">
        <div class="form-group mb-3">
            <label for="storeName">Nome: *</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="storeName"
                placeholder="Nome" wire:model="name">
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
            <button wire:click.prevent="create()" class="btn btn-success btn-block">Salvar</button>
            <button wire:click.prevent="cancel()" class="btn btn-danger">Cancelar</button>
        </div>
    </form>
@endif
