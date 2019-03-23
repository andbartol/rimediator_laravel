<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    //
    protected $guarded = [];
    protected $table = 'settings';
    protected $primaryKey = 'user_id';

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
