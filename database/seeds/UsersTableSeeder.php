<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
            'name' => 'nepalyatra',
            'email' => 'nepalyatra@gmail.com',
            'password' => bcrypt('nepalyatra123'),
            'image'   =>'balram.jpg',
        ]);
    }
}
