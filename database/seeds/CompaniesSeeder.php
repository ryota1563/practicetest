<?php




use Illuminate\Database\Seeder;
use App\Models\Company;

class CompaniesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Company::create([
          'company_name' => 'TEST',
          'street_address' => 'fake',
          'representative_name' => 'TEST',
          'created_at' => '2023-02-08',
          'updated_at' => '2023-02-08',
        ]);
        //
    }
}
