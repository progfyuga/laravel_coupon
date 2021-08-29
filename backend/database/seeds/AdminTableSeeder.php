<?php

use App\Admin;
use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'email' => 'admin@admin.com',
            'password' => Hash::make('adminlogin'),
            'remember_token'    => Str::random(10),
        ]);

    }
}
