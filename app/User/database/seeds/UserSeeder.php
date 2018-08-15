<?php

use Illuminate\Database\Seeder;

use App\User\User;

class UserSeeder extends Seeder
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
            'password' => Hash::make('password')
        ]);
        $user->active = true;
        $user->save();
    }
}
