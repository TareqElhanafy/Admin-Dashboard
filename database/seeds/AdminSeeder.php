<?php

use App\Admin;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin=Admin::where('email','admin@test.com')->first();
        if (!$admin) {
            Admin::create([
                'name'=>'admin',
                'email'=>'admin@test.com',
                'password'=>bcrypt('password')

            ]);
        }
    }
}
