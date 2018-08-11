<?php

use Illuminate\Database\Seeder;

use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'WLI',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin'),
            'created_at' => Carbon::now(),
        ]);
    }
}
