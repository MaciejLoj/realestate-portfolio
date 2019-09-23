<?php

use Illuminate\Database\Seeder;
use App\Roles;

// Tworze nowa tabele w bazie danych - Tabela Roles - beda tam role:
// Admin, moderator i user

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        $role_admin = new Roles();
        $role_admin->name = 'Admin';
        $role_admin->description = 'An admin';
        $role_admin->save();

        $role_moderator = new Roles();
        $role_moderator->name = 'Moderator';
        $role_moderator->description = 'A moderator';
        $role_moderator->save();

        $role_user = new Roles();
        $role_user->name = 'User';
        $role_user->description = 'A normal user';
        $role_user->save();

    }
}
