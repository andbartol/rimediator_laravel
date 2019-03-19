<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipo extends Model
{
    //
    protected $guarded = [];
    protected $table = 'tipo';

    public function outfits()
    {
        return $this->belongsToMany('App\Outfit', 'tipo_outfit',
            'tipo_id', 'outfit_id');
    }

    public function vestiti()
    {
        return $this->hasMany('App\Vestito');
    }
}
