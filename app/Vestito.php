<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vestito extends Model
{
    //
    protected $guarded = [];
    protected $table = 'vestito';

    public function tipo()
    {
        return $this->belongsTo('App\Tipo', 'tipo_id');
    }

    public function disponibili()
    {
        return $this->hasMany('App\Disponibile');
    }

    public function indossati()
    {
        return $this->belongsToMany('App\Indossato', 'indossato_vestito',
            'vestito_id', 'indossato_id');
    }

    // Ritorna il numero di indossature dall'ultima lavata
    //
    // return: il numero di indossature dall'ultima lavata
    // TODO: Usare query più complesse
    public function getIndossature()
    {
        $indossature = 0;
        foreach ($this->indossati()->orderBy('data', 'asc')->get() as $ind)
        {
            if ($ind->lavato)
                $indossature = 0;
            else
                $indossature++;
        }
        return $indossature;
    }

    // Ritorna true se il vestito è disponibile, false altrimenti
    public function isDisponibile()
    {
        $disp = $this->disponibili()->orderBy('data', 'desc')->first();
        if ($disp === null)
            return true;
        return $disp->disponibile;
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
