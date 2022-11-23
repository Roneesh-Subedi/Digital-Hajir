<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $admin = User::create([
            'name'=>'admin',
            'email'=>'admin@admin.com',
            'password'=>bcrypt('admin'),
            'group'=>'admin',
        ]);

        $company = Company::create([
            'name'=>"First Company",
            'address'=>'Kathmandu Nepal',
        ]);
        $company->members()->createMany([
            [
                'name'=>'Narayan Gajurel',
                'email'=>'nrngajurel@gmail.com',
                'password'=>bcrypt('nrngajurel'),
                'group'=>'company',
            ],
        ]);


        $this->call([
            CompanySeeder::class,
            GroupSeeder::class,
            SubgroupSeeder::class,
            MemberSeeder::class
        ]);

    }
}
