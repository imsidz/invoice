<?php

use Illuminate\Database\Seeder;

use Carbon\Carbon;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('companies')->insert([
            'companyname' => 'WLI',
            'active' => true,
            'created_at' => Carbon::now(),
        ]);
    }
}
