<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chamado extends Model
{
    protected $table = 'chamados';

    protected $fillable = [
        'user_id',
        'titulo',
        'descricao',
        'status'
    ];

    public static function boot()
    {        
        parent::boot();

        self::creating(function($model){
            $model->user_add = Auth()->User()->id;
        });

        self::updating(function($model){
            $model->user_upd = Auth()->User()->id;
        });
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
