<?php

namespace App\Http\Livewire;

use App\Models\Section;
use App\Models\Service;
use Livewire\Component;
use Illuminate\Support\Facades\App;

class CreateServiceOffer extends Component
{
    public $en_name;
    public $ar_name;
    public $en_desc;
    public $ar_desc;
    public $discount_value = 0;
    public $tax_value = 0;
    public function create()
    {
        
    }
    public function render()
    {
        $services = Service::select('id', App::getLocale() . '_name As name', 'price')->get();
        return view('livewire.service-offer.create-service-offer', compact('services'));
    }
}