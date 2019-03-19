<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Outfit extends Model
{
    //
    protected $guarded = [];
    protected $table = 'outfit';

    public function tipi()
    {
        return $this->belongsToMany('App\Tipo', 'tipo_outfit',
            'outfit_id', 'tipo_id');
    }
}
