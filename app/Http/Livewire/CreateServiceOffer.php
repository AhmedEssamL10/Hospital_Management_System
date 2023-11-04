<?php

namespace App\Http\Livewire;

use App\Models\Offer;
use App\Models\Section;
use App\Models\Service;
use Illuminate\Http\Request;
use Livewire\Component;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class CreateServiceOffer extends Component
{
    public $en_name;
    public $ar_name;
    public $en_desc;
    public $ar_desc;
    public $total_before_descount = 0;
    public $discount_value = 0;
    public $tax_value = 0;
    public $total = 0;
    public $service = [];
    public function create()
    {

        try {
            $offer = Offer::create([
                'en_name' => $this->en_name,
                'ar_name' => $this->ar_name,
                'en_desc' => $this->en_desc,
                'ar_desc' => $this->ar_desc,
                'tax_rate' => $this->tax_value,
                'discount_value' => $this->discount_value,
                'total_before_discount' => $this->total_before_descount,
                'total_after_discount' => $this->total_before_descount - $this->discount_value,
                'total' => $this->total_before_descount - $this->discount_value + $this->tax_value,
            ]);
            $services_id = $this->service;
            $offer->services()->sync($services_id);
            DB::commit();
            // reset inputs
            $this->en_name = '';
            $this->ar_name = '';
            $this->en_desc = '';
            $this->ar_desc = '';
            $this->service = [];
            $this->discount_value = 0;
            $this->tax_value = 0;
            $this->total_before_descount = 0;
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollback();
        }
    }
    public function selectServices()
    {
        $services_id = $this->service;
        foreach ($services_id as $id) {
            $price = Service::find($id);
            $this->total_before_descount += $price->price;
        }
    }
    public function render()
    {
        $services = Service::select('id', App::getLocale() . '_name As name', 'price')->get();
        return view('livewire.service-offer.create-service-offer', compact('services'));
    }
}
