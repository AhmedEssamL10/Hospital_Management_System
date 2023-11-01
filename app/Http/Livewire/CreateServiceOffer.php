<?php

namespace App\Http\Livewire;

use App\Models\Section;
use App\Models\Service;
use Livewire\Component;
use Illuminate\Support\Facades\App;

class CreateServiceOffer extends Component
{
    public $en_name;
    public $count = 0;

    public $ar_name;
    public $en_desc;
    public $ar_desc;
    public function increment()
    {
        $this->count++;
    }

    public function save()
    {
        Section::create([
            'en_name' => $this->en_name,
            'ar_name' => $this->ar_name,
            'en_desc' => $this->en_desc,
            'ar_desc' => $this->ar_desc
        ]);
        // dd($this->en_name);
    }

    public function render()

    {
        $sections = Section::select('id', App::getLocale() . '_name As name')->get();
        return view('livewire.service-offer.create-service-offer', compact('sections'));
    }
}