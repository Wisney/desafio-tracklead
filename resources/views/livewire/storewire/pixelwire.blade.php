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
    @if ($isNewPixel)
        <form>
            <input type="hidden" wire:model="$store_id">
            <div class="form-group mb-3">
                <label for="pixelPlatform">Plataforma: *</label>
                <input type="text" class="form-control @error('platform') is-invalid @enderror" id="pixelPlatform"
                    placeholder="Plataforma" wire:model="platform">
                @error('platform')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="pixelCode">Code: *</label>
                <textarea class="form-control @error('code') is-invalid @enderror" id="pixelcode" placeholder="Code" wire:model="code"></textarea>
                @error('code')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="d-grid gap-2">
                <button wire:click.prevent="create()" class="btn btn-success btn-block">
                    Cadastrar Pixel
                </button>
            </div>
        </form>
    @else
        <form>
            <input type="hidden" wire:model="pixel_id">
            <input type="hidden" wire:model="store_id">
            <div class="form-group mb-3">
                <label for="pixelPlatform">Plataforma: *</label>
                <input type="text" class="form-control @error('platform') is-invalid @enderror" id="pixelPlatform"
                    placeholder="Plataforma" wire:model="platform">
                @error('platform')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="pixelCode">Code: *</label>
                <textarea class="form-control @error('code') is-invalid @enderror" id="pixelcode" placeholder="Code" wire:model="code"></textarea>
                @error('code')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="d-grid gap-2">
                <button wire:click.prevent="update()" class="btn btn-success btn-block">
                    Salvar Alteração
                </button>
            </div>
        </form>
    @endif
</div>
