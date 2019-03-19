<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Disponibile extends Model
{
    //
    protected $guarded = [];
    protected $table = 'disponibile';

    public function vestito()
    {
        return $this->belongsTo('App\Vestito', 'vestito_id');
    }
}
