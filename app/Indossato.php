<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Indossato extends Model
{
    //
    protected $guarded = [];
    protected $table = 'indossato';

    public function vestiti()
    {
        return $this->belongsToMany('App\Vestito', 'indossato_vestito',
            'indossato_id', 'vestito_id');
    }
}
