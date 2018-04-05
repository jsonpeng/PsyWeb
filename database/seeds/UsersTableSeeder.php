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
            'name' => '管理员',
            'email' => 'admin@foxmail.com',
            'password'=>Hash::make('zcjyadmin'),
        ]);
    }
}
