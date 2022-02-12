<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class apimortyController extends Controller
{
    public function inicio(){
        $api = new \GuzzleHttp\Client();
        $response = $api->request('GET','https://pokeapi.co/api/v2/pokemon?offset=0&limit=20');
        $datos = json_decode($response->getBody()->getContents(), true);
        
        //Recorrer el arreglo
        $personajes = [];

        foreach ($datos['results'] as $personaje){
            $personajes[] = [
                'nombre' =>$personaje['name'],
                'url' => $personaje['url']
            ];
        }
        return view('index', ['personajes'=>$personajes]);
    }
}
