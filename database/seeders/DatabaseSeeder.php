<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            AdminUserSeeder::class,
            PermissionSeeder::class,

            CountrySeeder::class,
            CitySeeder::class,
            GeoobjectSeeder::class,

            ApartmentSeeder::class,
        ]);
    }
}
