<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Models\Settings::create([
            'site_name' => "Laravel's Blog",
            'contact_email' => 'contact@blog.com',
            'contact_number' => '0900-78601',
            'address' => 'Karachi, Pakistan'
        ]);
    }
}
