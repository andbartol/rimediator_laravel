<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VestitiController extends Controller
{
    public function lista()
    {
        $vestiti = \App\Vestito::where('user_id', Auth::user()->id)->get();
        return view('vestiti.lista', ['vestiti' => $vestiti]);
    }

    public function aggiungi()
    {
        $tipi = \App\Tipo::all();
        return view('vestiti.aggiungi', ['tipi' => $tipi]);
    }

    public function aggiungi_post(Request $request)
    {
        $vestito = new \App\Vestito();
        $vestito->user_id = Auth::user()->id;
        $vestito->nome = $request->input('nome');
        $vestito->tipo_id = $request->input('tipo');
        if ($request->hasFile('immagine'))
        {
            $path = $request->file('immagine')->store('vestiti');
            $vestito->immagine = $path;
        }
        $vestito->save();
        return redirect()->route('vestiti.lista');
    }

    public function mostra(\App\Vestito $vestito)
    {
        dump($vestito);
    }
}
