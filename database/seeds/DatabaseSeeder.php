<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(UsersSeeder::class);
         $this->call(NewsSeeder::class);
         $this->call(RolesSeeder::class);
         $this->call(GroupsSeeder::class);
         $this->call(GroupUserSeeder::class);
         $this->call(RoleUserSeeder::class);
    }
}
