<?php

use Illuminate\Database\Seeder;

class UsuarioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){

    	DB::statement('SET FOREIGN_KEY_CHECKS = 0;');

        DB::table('usuarios')->truncate();

        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');

        factory(App\Models\Usuario::class, 1000)->create()->each(function ($oUsuario) {

            $oUsuario->posts()->saveMany(
                factory(App\Models\Post::class, rand(1, 5))->make()
            );
        });
    }
}
