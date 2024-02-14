<?php

namespace App\Livewire;

use Livewire\Component;

class Counter extends Component
{
    public $count1 = 0;
    public $count2 = 0;
    public $count3 = 0;
    public function render()
    {
        return view('livewire.counter');
    }

    public function increment1(){
        $this->count1++;
    }

    public function decrement1(){
        $this->count1--;
    }

    public function increment2(){
        $this->count2++;
    }

    public function decrement2(){
        if ($this->count2 > 0) { 
            $this->count2--;
        }
    }

    public function increment3(){
        if ($this->count3 < 0) { 
            $this->count3++;
        }
    }

    public function decrement3(){
            $this->count3--;
    }

    
    
}
