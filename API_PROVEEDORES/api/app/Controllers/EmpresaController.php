<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use CodeIgniter\HTTP\Response;

class EmpresaController extends Controller{

    // 1.-
    public function obtener_empresas_precios(){
        $model = model('EmpresaModel');
        $data['datos'] = $model->obtener_empresas_precios();
        $response = response();
        $response->setStatusCode(Response::HTTP_OK);
        $response->setBody(json_encode($data));
        $response->setHeader('Content-Type','text/json');
        $response->noCache();
        $response->send();
    }

    // 2.-
    public function comparar_precio(){
        $model = model('EmpresaModel');
        $data['datos'] = $model->comparar_precio();
        $response = response();
        $response->setStatusCode(Response::HTTP_OK);
        $response->setBody(json_encode($data));
        $response->setHeader('Content-Type','text/json');
        $response->noCache();
        $response->send();        
    }

    // 3.-
    public function obtener_precio_empresa(){
        $model = model('EmpresaModel');
        $data['datos'] = $model->obtener_precio_empresa();
        $response = response();
        $response->setStatusCode(Response::HTTP_OK);
        $response->setBody(json_encode($data));
        $response->setHeader('Content-Type','text/json');
        $response->noCache();
        $response->send();  
    }

    // 4.-
    public function obtener_repartidores(){
        $model = model('EmpresaModel');
        $data['datos'] = $model->obtener_repartidores();
        $response = response();
        $response->setStatusCode(Response::HTTP_OK);
        $response->setBody(json_encode($data));
        $response->setHeader('Content-Type','text/json');
        $response->noCache();
        $response->send();
    }

    // 5.-
    public function obtener_nombre_empresa(){
        $model = model('EmpresaModel');
        $data['datos'] = $model->obtener_nombre_empresa();
        $response = response();
        $response->setStatusCode(Response::HTTP_OK);
        $response->setBody(json_encode($data));
        $response->setHeader('Content-Type','text/json');
        $response->noCache();
        $response->send();             
    }

    // 6.-
    public function obtener_entregas_repartidor(){
        $model = model('EmpresaModel');
        $data['datos'] = $model->obtener_entregas_repartidor();   
        $response = response();
        $response->setStatusCode(Response::HTTP_OK);
        $response->setBody(json_encode($data));
        $response->setHeader('Content-Type','text/json');
        $response->noCache();
        $response->send();     
    }

    // 7.-
    public function obtener_entregas_hechas_por_empresa(){
        $model = model('EmpresaModel');
        $data['datos'] = $model->obtener_entregas_hechas_por_empresa();
        $response = response();
        $response->setStatusCode(Response::HTTP_OK);
        $response->setBody(json_encode($data));
        $response->setHeader('Content-Type','text/json');
        $response->noCache();
        $response->send();    
    }

        // 8.-
        public function obtener_nombre_empresas(){
            $model = model('EmpresaModel');
            $data['datos'] = $model->obtener_nombre_empresas();
            $response = response();
            $response->setStatusCode(Response::HTTP_OK);
            $response->setBody(json_encode($data));
            $response->setHeader('Content-Type','text/json');
            $response->noCache();
            $response->send(); 
        }

}