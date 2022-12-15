<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Papel extends Model
{
    protected $table = 'papeis';

    protected $fillable = ['nome','descricao'];

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function permissoes()
    {
        return $this->belongsTo(Permissao::class);
    }
}
