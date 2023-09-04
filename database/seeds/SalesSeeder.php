<?php




use Illuminate\Database\Seeder;
use App\Models\Sale;

class SalesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Sale::create([
        'product_id' => 'TEST',
        'created_at' => '2023-02-08',
        'updated_at' => '2023-02-08',
      ]);
        //
    }
}
