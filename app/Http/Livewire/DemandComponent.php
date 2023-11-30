<?php

namespace App\Http\Livewire;

use App\Models\Demand;
use Livewire\Component;

class DemandComponent extends Component
{
    public function render()
    {
        $demands = Demand::all();
        return view('livewire.demand-component', compact('demands'));
    }
}
