<?php

namespace App\Http\Livewire;

use App\Models\Service;
use Livewire\Component;
use Illuminate\Support\Facades\App;

class CreateServiceOffer extends Component
{
    public $count = 0;


    public function increment()
    {
        $this->count++;
    }

    public function render()

    {
        return view('livewire.service-offer.create-service-offer');
    }
}
