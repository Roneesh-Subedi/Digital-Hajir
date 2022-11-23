<?php

namespace Database\Seeders;

use App\Models\Group;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubgroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $groups = Group::all();
        foreach ($groups as $group) {
            $group->subgroups()->createMany([
                [
                    'name' => 'First Semester',
                ],
                [
                    'name' => 'Second Semester',
                ],
                [
                    'name' => 'Third Semester',
                ],
                [
                    'name' => 'Fourth Semester',
                ],
            ]);
        }
    }
}
