<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{

    

	protected $fillable = ['name', 'email', 'data_de_nascimento', 'senha', 'foto'];
    
   
}
