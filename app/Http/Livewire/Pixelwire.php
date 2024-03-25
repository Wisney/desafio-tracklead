<?php

namespace App\Http\Livewire;

use App\Models\Pixel;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class Pixelwire extends Component {
    public $store_id, $platform, $code, $pixel_id;
    public $isNewPixel = false;
    public function render() {

        return view('livewire.storewire.pixelwire');
    }

    public function rules() {
        return ['code' => 'required', 'platform' => 'required', 'store_id' => 'required'];
    }

    public function create() {
        $this->validate();
        try {
            Pixel::create(['platform' => $this->platform, 'code' => $this->code, 'store_id' => $this->store_id]);
            session()->flash('success', 'Pixel criado com sucesso!');
            $this->emit('refreshStore');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            session()->flash('error', 'Erro ao criar pixel.');
        }
    }

    public function update() {
        $this->validate();
        try {
            Pixel::where(['id' => $this->pixel_id])->update(['platform' => $this->platform, 'code' => $this->code, 'store_id' => $this->store_id]);
            session()->flash('success', 'Pixel atualizado com sucesso!');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            session()->flash('error', 'Erro ao atualizar pixel.');
        }
    }
}
