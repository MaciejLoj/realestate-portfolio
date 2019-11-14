<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Roles;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_user = Roles::where('name', 'User')->first();
        $role_admin = Roles::where('name', 'Admin')->first();

        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 3 ; $i++){
        $user = new User();
        $user->name = $faker->name;
        $user->email = $faker->email;
        $user->password = bcrypt('user');
        $user->save();
        $user->roles()->attach($role_user);
        }
        $admin = new User();
        $admin->name = 'maciej';
        $admin->email = 'maciej.loj@gmail.com';
        $admin->password = bcrypt('admin');
        $admin->save();
        $admin->roles()->attach($role_admin);

    }


}
