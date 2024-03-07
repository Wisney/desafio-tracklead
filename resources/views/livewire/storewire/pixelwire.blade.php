<div>
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
    <form>
        <input type="hidden" wire:model="pixel.id">
        <input type="hidden" wire:model="pixel.store_id">
        <div class="form-group mb-3">
            <label for="pixelPlatform">Plataforma: *</label>
            <input type="text" class="form-control @error('pixel.platform') is-invalid @enderror" id="pixelPlatform"
                placeholder="Plataforma" wire:model="pixel.platform">
            @error('pixel.platform')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group mb-3">
            <label for="pixelCode">Code: *</label>
            <textarea class="form-control @error('pixel.code') is-invalid @enderror" id="pixelcode" placeholder="Code"
                wire:model="pixel.code"></textarea>
            @error('pixel.code')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="d-grid gap-2">
            @if (empty($pixel->id))
                <button wire:click.prevent="create()" class="btn btn-success btn-block">
                    Cadastrar Pixel
                </button>
            @else
                <button wire:click.prevent="update()" class="btn btn-success btn-block">
                    Salvar Alteração
                </button>
            @endif
        </div>
    </form>
</div>
