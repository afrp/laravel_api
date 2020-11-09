<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $passnew = Hash::make('halo123');
        DB::table('users')->insert([
            'name' => 'Anwar anwiya',
            'username' => 'Anwar',
            'email' => 'anwar@gmail.com',
            'password' => $passnew,
            'roles' => json_encode(['CUSTOMER']),
            'status' => 'ACTIVE',
        ]);
    }
}
