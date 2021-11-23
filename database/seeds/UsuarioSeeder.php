<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Jhosel',
            'email' => 'jhosel.badillo.cortes@gmail.com',
            'password' => Hash::make('12345678'),
            'url' => 'https://kichokhrizzz.com',
        ]);

        //$user->perfil()->create();

    }
}
