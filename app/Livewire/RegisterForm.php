<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Component;

class RegisterForm extends Component
{
    public string $email = "";
    public string $password = "";
    public string $first_name = "";
    public string $last_name = "";
    public string $role = "";
    public string $company_name = "";
    public string $vat_number = "";

    protected $rules = [
        "first_name"=> ['required', 'min:2'],
        "last_name"=> ['required', 'min:2'],
        "email"=> ['required', 'email'],
        "password"=> ['required', 'min:8'],
        "company_name"=> ['required_if:role,vendor'],
        "vat_number"=> ['required_if:role,vendor'],
    ];

    public function submit(){
        $this->validate();

        //register customer
        session()->flash('message', $this->role.' was created');

        $this->reset('email','password','first_name','last_name','role','company_name','vat_number');
        // $this->email="";
        // $this->password="";
        // $this->first_name="";
        // $this->last_name="";
        // $this->role="costumer";
        // $this->company_name="";
        // $this->vat_number="";
    }

    //herhangi bir özellik güncellendiğinde tetiklenen bir metodu tanımlar. $property parametresi, güncellenen özelliğin adını temsil eder. updated özelliği, bir bileşenin herhangi bir özelliği güncellendiğinde otomatik olarak çağrılır.
    public function updated($property){
    //validateOnly yöntemi, yalnızca belirtilen özelliği doğrulamak için kullanılır. Yani, bu metot, yalnızca güncellenen belirli bir özelliği doğrular ve diğer tüm doğrulama kurallarını atlar. Bu şekilde, kullanıcı yalnızca güncellenen özelliği etkilediğinde doğrulama gerçekleştirilir, böylece performans artırılır ve kullanıcı deneyimi iyileştirilir.
        $this->validateOnly($property);
    }

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.register-form');
    }
}
