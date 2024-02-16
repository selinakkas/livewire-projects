<?php

namespace App\Livewire;

use App\Models\Continent;
use App\Models\Country;
use Livewire\Attributes\Layout;
use Livewire\Component;

class CascadingDropdown extends Component
{
    public $continents =[];
    public $countries =[];

    public $selectedContinent;
    public $selectedCountry;

    public function mount(){
        $this->continents = Continent::all();
    }

    public function changeContinent(){
        sleep(1);
        if($this->selectedContinent !== -1){
            $this->countries = Country::where('continent_id', $this->selectedContinent)->get();
        }
    }

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.cascading-dropdown');
    }
}
