<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/
/*
$factory->define(App\Usuario::class, function (Faker\Generator $faker) {
    return [
        'email' =>  'admin@admin.com',      
 		'name' => 'admin',
        'password' => bcrypt('admin'),
        'remember_token' => 'admin',
        'data_de_nascimento' => $faker->date($format = 'd-m-Y', $max = 'now'),
    ];

});
*/
$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,    
 		'password' => bcrypt(str_random(10)),
        'foto' => 'img/perfil/profile.jpg', 
        'data_de_nascimento' => $faker->date($format = 'Y-m-d', $max = 'now'),      
    ];
   
});

$factory->define(App\Post::class, function (Faker\Generator $faker) {
    return [        
        'titulo' => $faker->catchPhrase,
        'conteudo'=> $faker->paragraph(40),    
 		'imagem' => 'img/padrao.png',
        'data_publicacao'=> $faker->date($format = 'Y-m-d', $max = 'now'),                              
    ];
   
});