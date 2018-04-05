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
        DB::table('users')->delete();

        $user = User::create([
            'name' => '小小白',
            'email' => 'xiaoxiaobai@foxmail.com',
            'password'=>Hash::make('xiaoxiaobai'),
        ]);
    }
}
