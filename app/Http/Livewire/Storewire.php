<?php

namespace App\Http\Livewire;

use App\Models\Pixel;
use App\Models\Store;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class Storewire extends Component {
    public $stories, $name, $location, $description, $store_id;
    public $pixels;
    public $updateStore = false;
    public $isIndexStorePage = true;
    protected $rules = [
        'name' => 'required',
        'location' => 'required',
        'description' => 'required'
    ];
    protected $listeners = [
        'deleteStore' => 'destroy',
        'deletePixel' => 'destroyPixel',
        'refreshParent' => '$refresh'
    ];
    public function render() {
        if ($this->isIndexStorePage) {
            $this->stories = Store::select('id', 'name', 'location', 'description')->with('pixels')->orderBy('id', 'desc')->get();
        }
        return view('livewire.storewire.storewire');
    }

    public function resetFields() {
        $this->name = '';
        $this->description = '';
        $this->location = '';
        $this->store_id = '';
    }
    public function cancel() {
        $store = Store::findOrFail($this->store_id);
        $this->store_id = $store->id;
        $this->name = $store->name;
        $this->location = $store->location;
        $this->description = $store->description;
        $this->pixels = $store->pixels;
        $this->updateCategory = false;
        $this->isIndexStorePage = true;
        $this->resetFields();
    }

    public function new() {
        $this->resetFields();
        $this->updateStore = false;
        $this->isIndexStorePage = false;
    }

    public function create() {
        $this->validate();
        try {
            Store::create(['name' => $this->name, 'location' => $this->location, 'description' => $this->description]);
            session()->flash('success', 'Store criada com sucesso!');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            session()->flash('error', 'Erro ao criar store.');
        }
        $this->resetFields();
        $this->isIndexStorePage = true;
    }

    public function edit($id) {
        try {
            $store = Store::findOrFail($id);
            $this->store_id = $store->id;
            $this->name = $store->name;
            $this->location = $store->location;
            $this->description = $store->description;
            $this->pixels = $store->pixels;
            $this->updateStore = true;
            $this->isIndexStorePage = false;
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            session()->flash('error', 'Store não encontrada.');
        }
    }

    public function update() {
        $this->validate();
        try {
            Store::find($this->store_id)->fill([
                'name' => $this->name,
                'location' => $this->location,
                'description' => $this->description
            ])->save();
            session()->flash('success', 'Store atualizada com sucesso!');

            $this->cancel();
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            session()->flash('error', 'Erro ao atualizar store.');
            $this->cancel();
        }
    }
    public function destroy($id) {
        try {
            Store::find($id)->delete();
            session()->flash('success', "Store deletada com sucesso!");
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            session()->flash('error', "Erro ao deletar store.");
        }
    }
    public function cancelLastPixel() {
        $store = Store::findOrFail($this->store_id);
        $this->pixels = $store->pixels;
    }
    public function newPixel() {
        if (!empty($this->store_id)) {
            $store = Store::findOrFail($this->store_id);
            $this->pixels = $store->pixels;
            $this->pixels->push(Pixel::make(['store_id' => $this->store_id]));
        }
    }
    public function destroyPixel($id) {
        try {
            Pixel::find($id)->delete();
            $store = Store::findOrFail($this->store_id);
            $this->pixels = $store->pixels;
            $this->updateStore = true;
            $this->isIndexStorePage = false;

            session()->flash('success', "Pixel deletado com sucesso!");
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            session()->flash('error', "Erro ao deletar pixel.");
        }
    }
}
