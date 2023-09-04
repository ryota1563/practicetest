<?php




use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Product::create([
        'company_id' => '2',
        'product_name' => 'ミネラルウォーター',
        'price' => '100',
        'stock' => '300',
        'comment' => 'TEST',
        'img_path' =>'water.jpg',
        'created_at' => '2023-02-08',
        'updated_at' => '2023-02-08',
      ]);
      Product::create([
        'company_id' => '3',
        'product_name' => 'コーヒー',
        'price' => '200',
        'stock' => '400',
        'comment' => 'TEST',
        'img_path' =>'water.jpg',
        'created_at' => '2023-02-08',
        'updated_at' => '2023-02-08',
      ]);
      Product::create([
        'company_id' => '4',
        'product_name' => 'お酒',
        'price' => '300',
        'stock' => '500',
        'comment' => 'TEST',
        'img_path' =>'water.jpg',
        'created_at' => '2023-02-08',
        'updated_at' => '2023-02-08',
      ]);
        //
    }
}
