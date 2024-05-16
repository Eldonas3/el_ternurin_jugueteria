<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('welcome_message');
    }

    public function agregar_juguete(){
        return view('envios/agregar_juguetes');
    }

    public function ver_juguetes(){
        header('Access-Control-Allow-Origin: *');
        return view('envios/ver_juguetes');
    }
    //http://localhost/api_juguetes/api/juguetes/obtener_nombres_juguetes
}
