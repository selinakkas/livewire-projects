<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Continent;
use App\Models\Country;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $continents = [
        ['id' => 1, 'name' => 'Europe',],
        ['id' => 2, 'name' => 'Asia',],
        ['id' => 3, 'name' => 'Africa',],
        ['id' => 4, 'name' => 'South America',],
        ['id' => 5, 'name' => 'North America',],
        ];

        foreach ($continents as $continent) {
//Continent::factory() yöntemi, Continent modeli için bir fabrika nesnesi oluşturur. Bu fabrika, Continent modeline ait özelliklere uygun rastgele veri oluşturur.
//create($continent) yöntemi, Continent modeli için bir kayıt oluşturur ve bu kaydı veritabanına ekler. $continent değişkeni, fabrika tarafından oluşturulan rastgele verileri üzerine eklemek istediğimiz ekstra özellikleri içerir. Bu durumda, her kıta için özel bir bilgi sağlamak için kullanılabilir, örneğin kıta adı gibi.
//Sonuç olarak, Continent::factory()->create($continent) kodu, Continent modeli için rastgele veri oluşturur ve bu veriyi veritabanına ekler. Bu şekilde, test verileri oluşturmak veya uygulamanın farklı senaryolarını simüle etmek için kullanılabilir.
            Continent::factory()->create($continent)
//->each(function($c){ ... }): Bu, her bir kıta kaydı için belirli bir işlemi gerçekleştirmek üzere bir döngü oluşturur. Her döngü adımında $c değişkeni, o anki kıta kaydını temsil eder.
//$c->country()->saveMany(...): Bu ifade, $c değişkeni ile temsil edilen kıtaya bağlı olan ülkelerin oluşturulmasını sağlar. $c->country() ile, ilişkili olan ülke ilişkisi (relationship) çağrılır ve saveMany(...) metodu ile bu ilişkiye bağlı olarak belirli sayıda ülke oluşturulur.
//CountryFactory::factory(10)->make(): Bu ifade, CountryFactory fabrikasından ülkeler oluşturur. CountryFactory::factory(10) ile 10 adet ülke oluşturulacağı belirtilir. Ardından make() metodu ile bu ülkelerin veritabanına kaydedilmeden, ancak model örnekleri olarak oluşturulmasını sağlar.
//Sonuç olarak, ->each(function($c){ ... }) kod bloğu, her bir kıta için belirli bir işlemi gerçekleştirir ve her bir kıtaya bağlı olarak belirli sayıda ülke oluşturur. Bu, ilişkisel veritabanı yapılarını oluşturmak için sıkça kullanılan bir yöntemdir.
            ->each(function($c){
                $c->country()->saveMany(Country::factory(10)->make());

            });
            
        }

    }
}


