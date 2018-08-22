<?php

use Illuminate\Database\Seeder;

use App\Users\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User([
            'username' => 'admin',
            'email' => 'admin@example.org',
            'password' => Hash::make('password'),
            'active' => true
        ]);
        $user->save();
    }
}
