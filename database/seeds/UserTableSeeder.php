<?php

use App\User;
use Illuminate\Database\Seeder;

/**
 * Class UserTableSeeder
 */
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class)
            ->make([
                'name' => 'Igors Krasjukovs',
                'email' => 'tahq69@gmail.com',
                'password' => '123321'
            ])
            ->save();
    }
}