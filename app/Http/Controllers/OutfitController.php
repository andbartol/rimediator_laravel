<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OutfitController extends Controller
{
    public function consiglio()
    {
        $temp = 15; //TODO leggere la temperatura da qualche parte
        $outfits = \App\Outfit::where('temp_min', '<=', $temp)
            ->where('temp_max', '>=', $temp)->get();
        $outfits = self::filtraOutfits($outfits);

        $consigli = array();
        foreach ($outfits as $outfit)
        {
            $combs= self::creaCombinazioni($outfit);
            foreach ($combs as $comb)
            {
                array_push($consigli, ['comb' => $comb, 'outfit' => $outfit, 
                    'indossature' => self::calcolaIndossature($comb)]);
            }
        }
        usort($consigli, function($el1, $el2) {
            return $el1['indossature']-$el2['indossature'];
        });

        return view('consiglio', ['consigli' => $consigli]);
    }

    // Calcola il numero di indossature di una combinazione di vestiti
    //
    // $comb: Un array di vestiti
    // return: Il numero di indossature totale in $comb
    private static function calcolaIndossature($comb)
    {
        $indossature = 0;
        foreach ($comb as $vestito)
        {
            $indossature += $vestito->getIndossature();
        }
        return $indossature;
    }

    // Crea tutte le combinazioni di vestiti in un dato outfit
    //
    // $outfit: l'outfit di partenza
    // return: un array con array di vestiti
    private static function creaCombinazioni($outfit)
    {
        $tipi = $outfit->tipi;
        $v = array();
        foreach ($tipi as $tipo)
        {
            $vestiti = $tipo->vestiti()
                            ->where('user_id', '=', Auth::user()->id)
                            ->get();
            $vestiti = $vestiti->filter(function ($vestito, $key) {
                return $vestito->isDisponibile();
            });
            array_push($v, $vestiti);
        }
        return self::cartesian($v);
    }

    // Rimuove gli outfits senza vestiti
    //
    // $outfits: gli outfits da filtrare
    // return: gli outfits filtrati
    private static function filtraOutfits($outfits)
    {
        $outs = array();
        foreach ($outfits as $outfit)
        {
            if (self::outfitOk($outfit))
                array_push($outs, $outfit);
        }
        return $outs;
    }


    // Controlla se ci sono vestiti nell'outfit
    //
    // $outfit: l'outfit da controllare
    // return: true o false
    private static function outfitOk($outfit)
    {
        foreach ($outfit->tipi as $tipo)
        {
            $vestiti = $tipo->vestiti()
                            ->where('user_id', '=', Auth::user()->id)->get();
            $vestiti = $vestiti->filter(function ($vestito, $key) {
                return $vestito->isDisponibile();
            });
            if ($vestiti->count() == 0)
                return false;
        }
        return true;
    }

    public static function cartesian($set)
    {
        if (!$set) {
            return array(array());
        }

        $subset = array_shift($set);
        $cartesianSubset = self::cartesian($set);

        $result = array();
        foreach ($subset as $value) {
            foreach ($cartesianSubset as $p) {
                array_unshift($p, $value);
                $result[] = $p;
            }
        }

        return $result;
    }
}
