<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // ->first, wez pierwszego napotkanego user o name = User
        // ->get, wez wszystkich 
        $role_user = Role::where('name', 'User')->first();

        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 5 ; $i++){
        $user = new User();
        $user->name = $faker->name;
        $user->email = $faker->email;
        $user->password = bcrypt('user');
        $user->save();
        $user->roles()->attach($role_user);

        $admin = new User();
        $admin->name = 'Administrator';
        $admin->email = $faker->email;
        $admin->password = bcrypt('admin');

        }
    }
}
