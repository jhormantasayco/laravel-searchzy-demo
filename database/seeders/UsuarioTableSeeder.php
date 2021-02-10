<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use App\Models\Usuario;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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

        $user = User::factory()
            ->count(1000)
            ->has(Post::factory()->count(rand(1, 5)), 'posts')
            ->create();
    }
}
