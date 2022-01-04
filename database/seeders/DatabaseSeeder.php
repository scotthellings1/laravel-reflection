<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        if (!File::exists(storage_path('app/public/logos'))) {
            File::makeDirectory(storage_path('app/public/logos'));
        }
        $this->call(UserSeeder::class);
        $this->call(CompanySeeder::class);
    }
}
