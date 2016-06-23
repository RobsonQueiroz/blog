<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    

    protected $fillable = [
        'name', 'email', 'titulo', 'password', 'data_de_nascimento', 'foto', 'imagem'
    ];

    public function posts()
    {
        return $this->hasMany('App\Post');
    }

    public function addPost(Post $post)
    {
        return $this->posts()->save($post);
    }

     

    public function addUser(User $user)
    {
        return $this->users()->save($user);
    }
    
    public function deletarPosts()
    {
        foreach ($this->posts as $post) {
            $post->delete();
        }
        return true;
    }
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
