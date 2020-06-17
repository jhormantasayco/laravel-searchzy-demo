<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Jhormantasayco\LaravelSearchzy\Searchzy;

class Usuario extends Authenticatable
{
    use Notifiable, Searchzy;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'usuarios';

    /**
    * The primary key used by the model.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The number of models to return for pagination.
     *
     * @var int
     */
    protected $perPage = 50;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that are searchable.
     *
     * @var array
     */
    protected $searchable = [
        'nombre'      => 'name',
        'dni'         => 'code',
        'phone'       => 'phone',
        'email'       => 'email',
        'post'        => 'posts:title',
        'descripcion' => 'posts:description',
    ];

    /**
     * The attributes that are filterable.
     *
     * @var array
     */
    protected $filterable = [
        'rol_id'       => 'role_id',
        //'categoria_id' => 'posts:category_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Retorna los posts del usuario.
     */
    public function posts(){

        return $this->hasMany(Post::class, 'user_id');
    }
}
