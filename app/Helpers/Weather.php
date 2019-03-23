<?php

namespace App\Helpers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Client;

class Weather
{
    // Richiede ad OpenWeather i dati per le previsioni
    // di domani
    // return: la temperatura media su tutto il giorno
    // TODO: Fare la richiesta asincrona?
    public static function getTemperaturaMedia()
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
}
