<?php

namespace Database\Seeders;

use App\Models\infoUser;
use App\Models\User;
use App\Models\userFotos;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Factory::create();

        for ($i = 0; $i < 50; $i++) {

            $user = User::create([
                'email' => $faker->unique()->email,
                'password' => Hash::make('password'),
                'cadastrado' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            infoUser::create([
                'user_id' => $user->id,
                'nome' => $faker->name,
                'data_nascimento' => $faker->dateTimeThisCentury()->format('Y-m-d'),
                'biografia' => $faker->sentence(10),
                'estado' => $faker->country,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            userFotos::create([
                'user_id' => $user->id,
                'foto_caminho' => 'https://picsum.photos/300/300/?random=' . $faker->unique()->randomNumber(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            dump($user->id .' - Usuário ' . $user->info->nome . ' criado com sucesso!');
        }
    }
}
