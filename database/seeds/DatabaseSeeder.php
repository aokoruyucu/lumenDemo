<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\Auth\User;
use App\Program;
use App\Tag;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();



        // $this->call('UserTableSeeder');

        $this->call('OAuthSeeder');
        $this->call('UserSeeder');

        Model::reguard();
    }
}
