<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'           => 'Ivan Ivanovich Ivanov',
            'login'          => 'ivan',
            'email'          => 'ivan@gmail.com',
            'happy_birthday' => '2000-08-09',
            'phone'          => serialize('0503333666'),
            'password'       => bcrypt('ivan')
        ]);

        User::create([
            'name'           => 'Sergey Sergeev Sergeevich',
            'login'          => 'admin',
            'email'          => 'admin@gmail.com',
            'happy_birthday' => '2000-08-09',
            'phone'          => serialize('0670001010, 0679988456'),
            'password'       => bcrypt('admin')
        ]);

        User::create([
            'name'           => 'Maxsim Maxsimum Maxsimovich',
            'login'          => 'maxsim',
            'email'          => 'maxsim@gmail.com',
            'happy_birthday' => '2000-08-09',
            'phone'          => serialize('0670001010, 0679988456, 0503333666'),
            'password'       => bcrypt('maxsim')
        ]);

        User::create([
            'name'           => 'Evgeniy Evgenius Evgenievich',
            'login'          => 'evgeniy',
            'email'          => 'evgeniy@gmail.com',
            'happy_birthday' => '2000-08-09',
            'phone'          => serialize('0670001010, 0679988456, 0503333666'),
            'password'       => bcrypt('evgeniy')
        ]);
    }
}
