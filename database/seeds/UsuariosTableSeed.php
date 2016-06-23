<?php

use Illuminate\Database\Seeder;

class UsuariosTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //cadastra o administrador do sistema
        DB::table('users')->insert([
            'email' =>  'admin@admin.com',      
            'name' => 'admin',
            'password' => bcrypt('admin'),
            'remember_token' => 'admin',
            'data_de_nascimento' => '1990-12-01',
        ]);

        //Usando o modelo factory cria 10 usuários e 3 posts para cada 
        factory('App\User', 10)->create()->each(function($u){
        	$u->posts()->save(factory('App\Post')->make());
            $u->posts()->save(factory('App\Post')->make());
            $u->posts()->save(factory('App\Post')->make());            
        });
        
    }
}
