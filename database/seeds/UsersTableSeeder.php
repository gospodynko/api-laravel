<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {

    public function run()
    {
        $this->call('UserTableSeeder');

        $this->command->info('Таблица пользователей загружена данными!');
    }

}
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     *
     *
     */


    public function run()
    {
        factory(App\User::class, 100)->create()->each(function($u) {
            $u->posts()->save(factory(App\Post::class)->make());
        });
    }
}

