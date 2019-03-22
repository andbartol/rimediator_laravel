<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Client;

class OutfitController extends Controller
{

    public function oggi(Request $request)
    {
        return view('outfit.oggi', [
            'tipi' => \App\Tipo::all()->toJson(),
        ]);
    }

    public function insertOggi(Request $request)
    {
        $indossato = new \App\Indossato();

        $vestiti = $request->input('vestito.*');
        $vestiti = array_map(function($v) {
            return \App\Vestito::where('id','=',$v)
                ->where('user_id','=',Auth::user()->id)
                ->first();
        }, $vestiti);
        $indossato->data = \Carbon\Carbon::now();
        $indossato->lavato = false;
        $indossato->save();

        foreach ($vestiti as $vestito)
        {
            $indossato->vestiti()->attach($vestito);
        }
        return redirect()->route('home');
    }

    public function consiglio()
    {
        $temp = self::getTemperaturaMedia();
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

    // Richiede ad OpenWeather i dati per le previsioni
    // di domani
    // return: la temperatura media su tutto il giorno
    // TODO: Fare la richiesta asincrona?
    private static function getTemperaturaMedia()
    {
        $client = new Client(['timeout' => 0.5]);
        $resp = $client->get('http://api.openweathermap.org/data/2.5/forecast?lat=44.4965578&lon=11.3709479&units=metric&appid=8fb8a4ac0144a800105ba86689e028ee');
        $resp = json_decode($resp->getBody());
        $media = 0;
        foreach ($resp->list as $prev)
        {
            $media += $prev->main->temp;
        }
        $media /= count($resp->list);
        return $media;
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
