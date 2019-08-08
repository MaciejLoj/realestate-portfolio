<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        for(i == 1; i<5 ;i++){
        $user = new User();
        $user->name = $faker->name;
        $user->email = $faker->email;
        $user->password = bcrypt('user');
        $user->save();
        }
    }
}
