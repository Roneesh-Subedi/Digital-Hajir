<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $groups = ['BCA', 'BSC CSIT', 'BIM','BBA', 'BHM'];
        foreach ($groups as $group) {
            \App\Models\Group::create([
                'company_id'=> Company::first()->id,
                'name' => $group,
            ]);
        }

    }
}
