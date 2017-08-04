<?php

use Illuminate\Database\Seeder;
use App\GroupUser;

class GroupUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        GroupUser::create(['user_id' => 1, 'group_id' => 1]);
        GroupUser::create(['user_id' => 4, 'group_id' => 1]);
        GroupUser::create(['user_id' => 3, 'group_id' => 2]);
        GroupUser::create(['user_id' => 3, 'group_id' => 2]);
    }
}
