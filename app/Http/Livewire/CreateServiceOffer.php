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
    public $offerId;
    public $flag = false;
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
            $this->flag = false;
            $this->total_before_descount = 0;
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollback();
        }
    }
    public function selectServices($serviceId, $isChecked)
    {

        if ($isChecked) {
            $service = Service::find($serviceId);
            $this->total_before_descount += $service->price;
            $this->service[] = $serviceId;
        } else {
            $service = Service::find($serviceId);
            $this->total_before_descount -= $service->price;
            $this->service = array_diff($this->service, [$serviceId]);
        }
    }
    public function render()
    {
        $services = Service::select('id', App::getLocale() . '_name As name', 'price')->get();
        $offers = Offer::select('id', App::getLocale() . '_name As name', 'total', App::getLocale() . '_desc As desc', 'discount_value', 'tax_rate', 'created_at')->get();
        return view('livewire.service-offer.create-service-offer', compact('services', 'offers'));
    }
    public function deleteOffer($id)
    {
        Offer::where('id', $id)->delete();
    }
    public function setValues($id)
    {
        $offer = Offer::find($id);
        if ($offer) {
            $this->en_name = $offer->en_name;
            $this->ar_name = $offer->ar_name;
            $this->en_desc = $offer->en_desc;
            $this->ar_desc = $offer->ar_desc;
            $this->tax_value = $offer->tax_rate;
            $this->discount_value = $offer->discount_value;
            $this->offerId = $offer->id;
            $this->service = [];
            $this->total_before_descount = 0;
            $this->flag = true;
            foreach ($offer->services->pluck('id') as $serviceid) {
                $this->service[] = $serviceid;
                $price = Service::find($serviceid);
                $this->total_before_descount += $price->price;
            }
        }
    }
    public function updateOffer($id)
    {
        try {
            $offer = Offer::where('id', $id)->update([
                'en_name' => $this->en_name,
                'ar_name' => $this->ar_name,
                'en_desc' => $this->en_desc,
                'ar_desc' => $this->ar_desc,
                'tax_rate' => $this->tax_value,
                'discount_value' => $this->discount_value,
                'total_before_discount' => $this->total_before_descount,
                'total_after_discount' => $this->total_before_descount - $this->discount_value,
                'total' => $this->total_before_descount - $this->discount_value + $this->tax_value,
            ]);;
            DB::table('offer_service')->where('offer_id', $id)->delete();
            foreach ($this->service as $key) {
                DB::table('offer_service')->insert([
                    'offer_id' => $id,
                    'service_id' => $key
                ]);
            }


            DB::commit();
            // reset inputs
            $this->offerId = null;
            $this->en_name = '';
            $this->ar_name = '';
            $this->en_desc = '';
            $this->ar_desc = '';
            $this->service = [];
            $this->discount_value = 0;
            $this->tax_value = 0;
            $this->total_before_descount = 0;
            $this->flag = false;
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollback();
        }
    }
    public function createOrUpdate()
    {
        if ($this->flag == true) {
            $this->offerId = null;
            $this->en_name = '';
            $this->ar_name = '';
            $this->en_desc = '';
            $this->ar_desc = '';
            $this->service = [];
            $this->discount_value = 0;
            $this->tax_value = 0;
            $this->total_before_descount = 0;
            $this->flag = false;
        } else
            $this->flag = true;
    }
}
