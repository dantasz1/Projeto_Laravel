<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $fillable = ['nome', 'email', 'senha'];

    public function getAuthPassword()
    {
        return $this->senha;
    }
}


