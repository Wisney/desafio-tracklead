<?php

namespace Database\Seeders;

use App\Models\Pixel;
use App\Models\Store;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class StoreSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        Store::factory()->count(10)->has(Pixel::factory()->count(3))->create();
    }
}
