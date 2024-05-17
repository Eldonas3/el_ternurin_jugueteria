<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('welcome_message');
    }

    public function ver_juguetes(){
        return view('envios/ver_juguetes');
    }

    public function agregar_juguete(){
        return view('envios/agregar_juguetes');
    }

    public function pruebas(){
        return view('envios/prueba');
    }

    public function agregar_proveedor(){
        return view('envios/agregar_proveedores');
    }

    public function insertar_juguete()
    {
        $request = \Config\Services::request();
        $nombre = $request->getVar('nombre');
    
        if (!empty($nombre)) {
            $db = \Config\Database::connect();
            $data = [
                'nombre' => $nombre
            ];
    
            if ($db->table('producto')->insert($data)) {
                echo json_encode(['status' => 'success']);
            } else {
                echo json_encode(['status' => 'error']);
            }
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Nombre is required']);
        }
    }

    public function insertar_proveedor()
    {
        $request = \Config\Services::request();
        $nombre_proveedor = $request->getVar('nombre_proveedor');
        $nombre_empresa = $request->getVar('nombre_empresa');
    
        if (!empty($nombre_proveedor) &&!empty($nombre_empresa)) {
            $db = \Config\Database::connect();
    
            // Insertar proveedor
            $data_proveedor = [
                'empresa_proveedora' => $nombre_proveedor
            ];
            $db->table('proveedores')->insert($data_proveedor);
    
            // Insertar empresa
            $data_empresa = [
                'empresa_proveedora' => $nombre_empresa
            ];
            $db->table('proveedores')->insert($data_empresa);
    
            echo json_encode(['status' => 'uccess']);
        } else {
            echo json_encode(['status' => 'error', 'essage' => 'Nombre de proveedor y empresa son requeridos']);
        }
    }
}
