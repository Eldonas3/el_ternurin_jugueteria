<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use CodeIgniter\HTTP\Response;

class JugueteController extends Controller{

    // 1.-
    public function getJuguetePorNombre(){
        $model = model('JugueteModel');
        $data['datos'] = $model->getJuguetePorNombre();

        $response = response();

        $response->setStatusCode(Response::HTTP_OK);
        $response->setBody(json_encode($data));
        $response->setHeader('Content-Type','text/json');
        $response->noCache();

        $response->send();
    }

    // 2.-
    public function getCantidadJuguete(){
        $model = model('JugueteModel');
        $data['datos'] = $model->getCantidadJuguete();

        $response = response();

        $response->setStatusCode(Response::HTTP_OK);
        $response->setBody(json_encode($data));
        $response->setHeader('Content-Type','text/json');
        $response->noCache();

        $response->send();
    }

    // 3.-
    public function getNumeroEmpresasPorJuguete(){
        $model = model('JugueteModel');
        $data['datos'] = $model->getNumeroEmpresasPorJuguete();

        $response = response();
        $response->setStatusCode(Response::HTTP_OK);
        $response->setBody(json_encode($data));
        $response->setHeader('Content-Type','text/json');
        $response->noCache();

        $response->send();
    }

    // 4.-
    public function getJuguetesPorCategoria(){
        $model = model('JugueteModel');
        $categoria = $this->request->getGet('categoria');
        $data['datos'] = $model->getJuguetesPorCategoria($categoria);

        $response = response();
        $response->setStatusCode(Response::HTTP_OK);
        $response->setBody(json_encode($data));
        $response->setHeader('Content-Type','text/json');
        $response->noCache();

        $response->send();
    }

    // 5.-
    public function getAllJuguetes(){
        $model = model('JugueteModel');
        $data['datos'] = $model->getAllJuguetes();

        $response = response();
        $response->setStatusCode(Response::HTTP_OK);
        $response->setBody(json_encode($data));
        $response->setHeader('Content-Type','text/json');
        $response->noCache();

        $response->send();
    }

    // 6.-
    public function getJuguetePorId(){
        $model = model('JugueteModel');
        $id = $this->request->getGet('id');
        $data['datos'] = $model->getJuguetePorId($id);
        $response = response();
        $response->setStatusCode(Response::HTTP_OK);
        $response->setBody(json_encode($data));
        $response->setHeader('Content-Type','text/json');
        $response->noCache();

        $response->send();
    }

    // 7.-
    public function getProveedoresPorJuguete(){
        $model = model('JugueteModel');
        $id = $this->request->getGet('id');
        $data['datos'] = $model->getProveedoresPorJuguete($id);
        $response = response();
        $response->setStatusCode(Response::HTTP_OK);
        $response->setBody(json_encode($data));
        $response->setHeader('Content-Type','text/json');
        $response->noCache();

        $response->send();
    }

    // 8.-
    public function getColeccionesPorJuguete(){
        $model = model('JugueteModel');
        $id = $this->request->getGet('id');
        $data['datos'] = $model->getColeccionesPorJuguete($id);
        $response = response();
        $response->setStatusCode(Response::HTTP_OK);
        $response->setBody(json_encode($data));
        $response->setHeader('Content-Type','text/json');
        $response->noCache();

        $response->send();
    }
    
}