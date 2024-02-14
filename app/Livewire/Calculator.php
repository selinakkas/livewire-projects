<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Component;

class Calculator extends Component
{
    public $number1 = 0;
    public $number2 = 0;

    //yapılacak olan işlemi belirtir
    public string $action = "+";

    //işlem sonucunu depolamak için kullanılan değişken.
    public float $result = 0;

    //bu değişken işlem yap butonlarının etkin olup olmadığını kontrol eder. Başlangıçta etkin durumda (false) olarak ayarlanmıştır.
    public bool $disabled = false;
     
    public function calculate(){
        $num1 = (float) $this->number1;
        $num2 = (float) $this->number2;
        if($this->action == '-'){
            $this->result = $num1 - $num2;
        }
        elseif($this->action == '+'){
            $this->result = $num1 + $num2;
        }
        elseif($this->action == '*'){
            $this->result = $num1 * $num2;
        }
        elseif($this->action == '/'){
            $this->result = $num1 / $num2;
        }
        elseif($this->action == '%'){
            $this->result = $num1 / 100 * $num2;
        }
    }

    public function updated($property){
        if($this->number1 == '' || $this->number2 == ''){
            $this->disabled = true;
        }else {
            $this->disabled = false;
        }   
    }

    #[Layout('layouts.app')] 
    public function render()
    {
        return view('livewire.calculator');
    }
} 
