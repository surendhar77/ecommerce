<?php

namespace App\Livewire;

use Livewire\Component;

class ProductsComponent extends Component
{
    public $products = [];
    public $loading = true; // initialize loader as true

    public function mount()
    {
        // Simulate loading delay (optional)
        // sleep(2);

        $path = public_path('api/detailedproducts.json');
        $jsonData = json_decode(file_get_contents($path), true);

        if(isset($jsonData['products'])) {
            $this->products = $jsonData['products'];
        } else {
            $this->products = [];
        }

        $this->loading = false; // loader ends after data fetched
    }

    public function render()
    {
        return view('livewire.products-component');
    }
}
