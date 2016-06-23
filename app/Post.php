<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	protected $fillable = ['titulo', 'conteudo', 'imagem', 'name', 'email', 'password', 'data_de_nascimento', 'data_publicacao','foto'];
	
    public function user()
    {
    	return $this->belongsTo('App\User');
    }
    protected $hidden = [
        'password', 'remember_token',
    ];

}
