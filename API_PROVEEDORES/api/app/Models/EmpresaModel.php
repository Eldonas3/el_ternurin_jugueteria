<?php

namespace App\Models;

use CodeIgniter\Model;

class EmpresaModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'empresa';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = ['id','nombre','rfc','precio_envio'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];


    // 1.- Retorna todas las empresas y sus precios de envio
    public function obtener_empresas_precios(){
        // $request = request();
        $db = db_connect();

        $sql = $db->table('empresa')
        ->select('nombre, precio_envio');

        $query = $sql->get();
        return $query->getResult();
        // $empresas = $this->select('empresa, precio_envio')->findAll();
    }

    //2.- Retorna las empresas con un precio menor al indicado
    public function comparar_precio(){
        $request = request();
        $precio = $request->getGet('precio');
        $db = db_connect();
        $sql = $db->table('empresa')
        ->select('nombre')
        ->where('precio_envio <',$precio);

        $query = $sql->get();
        return $query->getResult();
    }

    // 3.-Retorna el precio de envio de una empresa especifica
    public function obtener_precio_empresa(){
        $request = request();
        $empresa = $request->getGet('nombre');
        $db = db_connect();
        
        $sql = $db->table('empresa')
        ->select('precio_envio')
        ->where('nombre',$empresa);

        $query = $sql->get();
        return $query->getResult();
    }

    // 4.-Retorna los repartidores de una empresa
    public function obtener_repartidores(){
        $request = request();
        $nombre = $request->getGet('nombre');
        $db = db_connect();
    
        $sql = $db->table('repartidor r')
        ->select('r.nombre','r.apellido_paterno','r.apellido_materno')
        ->join('empresa e', 'r.empresa_empleadora = e.id')
        ->where('e.nombre',$nombre);
    
        $query = $sql->get();
        return $query->getResult();
    }

    // 5.-Retorna la empresa de un empleado especifico
    public function obtener_nombre_empresa(){
        $request = request();
        $nombre = $request->getGet('nombre');
        $db = db_connect();

        $sql = $db->table('empresa e')
        ->select('e.nombre','e.precio_envio')
        ->join('repartidor r', 'e.id = r.empresa_empleadora')
        ->where("CONCAT(r.nombre, ' ', r.apellido_paterno, ' ', r.apellido_materno)",$nombre);

        $query = $sql->get();
        return $query->getResult();        
    }

    //6.- Obtener todas la entregas que haya hecho un repartidor
    public function obtener_entregas_repartidor(){
        $request = request();
        $nombre = $request->getGet('nombre');
        $db = db_connect();

        $sql = $db->table('entrega')
        ->select('entrega.id, empresa.nombre AS nombre_empresa')
        ->join('repartidor', 'entrega.repartidor_encargado = repartidor.id')
        ->join('empresa', 'repartidor.empresa_empleadora = empresa.id')
        ->where("CONCAT(repartidor.nombre, ' ', repartidor.apellido_paterno, ' ', repartidor.apellido_materno)", $nombre);       
        $query = $sql->get();
        return $query->getResult(); 
    }

    // 7.-retorna todas la entregas hechas por una empresa en especifico
    public function obtener_entregas_hechas_por_empresa(){
        $request = request();
        $nombre = $request->getGet('nombre');
        $db = db_connect();
    
        $sql = $db->table('entrega')
        ->select('entrega.id', 'entrega.status', 'CONCAT(repartidor.nombre, " ", repartidor.apellido_paterno, " ", repartidor.apellido_materno) AS nombre_repartidor')
        ->join('repartidor', 'entrega.repartidor_encargado = repartidor.id')
        ->join('empresa', 'repartidor.empresa_empleadora = empresa.id')
        ->where('empresa.nombre', $nombre)
        ->where('entrega.status', true);
    
        $query = $sql->get();
        return $query->getResult();         
    }     

        // 8.- Obtiene todos los nombres de las empresas de envios
    public function obtener_nombre_empresas(){
        $request = request();
        $db = db_connect();
        $sql = $db->table('empresa')
        ->select('nombre');
        $query = $sql->get();
        return $query->getResult();    
    }

}
