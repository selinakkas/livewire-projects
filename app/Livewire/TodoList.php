<?php

namespace App\Livewire;

use App\Models\TodoItem;
use Livewire\Attributes\Layout;
use Livewire\Component;

class TodoList extends Component
{

    //Bu değişken, bileşende tutulan todo öğelerini temsil eder. Genellikle bir dizidir ve her bir öğe bir todo'nun bilgilerini içerir.
    public $todos;
    //Bu değişken, kullanıcı tarafından girilen yeni bir todo'nun metin değerini temsil eder.
    public string $todoText = '';
    //Bu metod, bileşenin başlatılmasından önce çalışır. selectTodos metodunu çağırarak, başlangıç ​​olarak gösterilecek todo öğelerini seçer.
    public function mount(){
        $this->selectTodos();
    }
 
    public function addTodo(){
        //Yeni bir TodoItem model örneği oluşturulur.
        $todo = new TodoItem();
        //'todo' özelliği, kullanıcının girdiği todo metniyle ($this->todoText) doldurulur.
        $todo->todo = $this->todoText;
        //completed özelliği başlangıçta false olarak ayarlanır, yani yeni todo öğesi tamamlanmamış olarak işaretlenir.
        $todo->completed = false;
        //Yeni todo öğesi veritabanına kaydedilir.
        $todo->save();
        //$this->todoText değişkeni boş bir dizeye sıfırlanır, böylece kullanıcı bir sonraki todo metnini girebilir.
        $this->todoText = '';
        //selectTodos metodu çağrılarak, todo listesinin güncel bir listesini almak için veritabanından todo öğeleri seçilir.
        $this->selectTodos();
    }

    //Fonksiyon ismi yanında $id yazma işlemi, fonksiyonun parametre aldığını belirtir. Yani, bu durumda toggleTodo fonksiyonunun bir parametre beklediğini ifade eder. Fonksiyon çağrıldığında, bu parametre fonksiyona geçirilir ve fonksiyon içinde kullanılır. Bu sayede, fonksiyonun çalışması için gerekli olan bilgi sağlanmış olur.
    //Örneğin, toggleTodo fonksiyonu bir todo öğesinin durumunu değiştirmek için kullanılır. Bu durumun hangi todo öğesine ait olduğunu belirtmek için bir id parametresine ihtiyaç vardır. Dolayısıyla, fonksiyonun çağrıldığı yerde bir todo öğesinin id değeri bu parametre olarak iletilir. Bu parametre sayesinde, fonksiyon ilgili todo öğesinin durumunu değiştirebilir.
    public function toggleTodo($id){
        //Veritabanından belirli bir $id değerine sahip todo öğesi alınır.
        $todo = TodoItem::where('id', $id)->first();
        //'Todo' öğesi bulunamazsa (null olarak dönerse), metot sonlandırılır ve herhangi bir işlem yapılmaz.
        //Eğer todo öğesi bulunursa, completed özelliği terslenir (true ise false, false ise true yapılır), yani todo öğesinin tamamlanma durumu değiştirilir.
        $todo->completed = !$todo->completed;
        //Değiştirilen todo öğesi veritabanına kaydedilir.
        $todo->save();
        //selectTodos metodu çağrılarak, todo listesinin güncel bir listesini almak için veritabanından todo öğeleri seçilir.
        $this->selectTodos();
    }

    public function deleteTodo($id){
        
        $todo = TodoItem::where('id', $id)->first();
        $todo->delete();
        $this->selectTodos();
    }

    public function selectTodos(){
        $this->todos = TodoItem::orderBy('created_at', 'desc')->get();
    }

    
    //Bu metod, bileşenin görünümünü oluşturur ve livewire.todo-list isimli bir Blade şablonunu döndürür. Bu Blade şablonu, todo listesinin HTML yapısını ve kullanıcı arayüzünü tanımlar.
    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.todo-list');
    }
}
