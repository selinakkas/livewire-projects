<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;

class ImageUpload extends Component
{
    //dosya yükleme işlemlerini kolaylaştıran bir Livewire özelliğidir. Bu özellik, dosyaları bileşenlere yüklemek için kullanılabilen bazı yardımcı metotlar sağlar.
    use WithFileUploads;

  //  @var \Livewire\TemporaryUploadedFile

    public $image;

    public function save(){
        $this->validate([
            "image.*"=> "image|max:1024",
        ]);
//foreach döngüsü: Bu döngü, yüklenen her dosya için işlem yapmamızı sağlar. Her dosya için, store() yöntemi kullanılarak dosya, "public" diskine kaydedilir. "public" argümanı, dosyanın hangi depolama alanına kaydedileceğini belirtir.
        foreach($this->image as $image){
            $image->store('public');
        }
//          $this->image->storeAs('public',$this->image->getClientOriginalName());
    }

  
    #[Layout('layouts.app')]  
    public function render()
    {
        return view('livewire.image-upload', [
            'images' => collect(Storage::files('public'))
                ->filter(function($file){
                    return in_array(strtolower(pathinfo($file, PATHINFO_EXTENSION)), ['png','jpg','jpeg','webp','gif']);
                })
                ->map(function($file){
                    return Storage::url($file);
                })
        ]);
    }
}
