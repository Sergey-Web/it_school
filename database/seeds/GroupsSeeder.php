<?php

use Illuminate\Database\Seeder;
use App\Group;

class GroupsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Group::create(['group'=>'group1']);
        Group::create(['group'=>'group2']);
        Group::create(['group'=>'group3']);
    }
}
