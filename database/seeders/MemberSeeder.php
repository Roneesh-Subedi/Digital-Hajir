<?php

namespace Database\Seeders;

use App\Models\Member;
use App\Models\Subgroup;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subgroups = Subgroup::all()->pluck('id')->toArray();
        Member::factory()->count(100)->make()->each(function ($member) use ($subgroups) {
            $member->subgroup_id = $subgroups[array_rand($subgroups)];
            $member->save();
        });
    }
}
