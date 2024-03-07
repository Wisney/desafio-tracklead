<?php

namespace App\Http\Livewire;

use App\Models\Pixel;
use App\Models\Store;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class Pixelwire extends Component {
    public $pixel;
    public function render() {

        return view('livewire.storewire.pixelwire');
    }

    public function rules() {
        return ['pixel.code' => 'required', 'pixel.platform' => 'required', 'pixel.store_id' => 'required'];
    }

    public function create() {
        $this->validate();
        try {
            $this->pixel = Pixel::create(['platform' => $this->pixel->platform, 'code' => $this->pixel->code, 'store_id' => $this->pixel->store_id]);
            session()->flash('success', 'Pixel criado com sucesso!');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            session()->flash('error', 'Erro ao criar pixel.');
        }
    }

    public function update() {
        $this->validate();
        try {
            $this->pixel->save();
            session()->flash('success', 'Pixel atualizado com sucesso!');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            session()->flash('error', 'Erro ao atualizar pixel.');
        }
    }
}
