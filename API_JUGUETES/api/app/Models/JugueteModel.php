<?php

namespace App\Models;

use CodeIgniter\Model;

class JugueteModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'juguete';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = ['nombre','descripcion','categoria','precio','cantidad_disponible','fecha_ingreso'];

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

    //1.- Retorna toda la info de todos los juguetes con un nombre especifico
    public function getJuguetePorNombre(){
        $request = request();
        $nombre = $request->getGet('nombre');
        $db = db_connect();    
        $sql = $db->table('juguete')
        ->select('nombre,descripcion,categoria,precio,cantidad_disponible')
        ->where('nombre', $nombre);
    
        $query = $sql->get();
        return $query->getResult();
        }

    //2.- Retorna todas la cantidades disponibles de un juguete especifico
    public function getCantidadJuguete(){
        $request = request();
        $nombre = $request->getGet('nombre');
        $db = db_connect();
        
        $sql = $db->table('juguete')
        ->select('cantidad_disponible')
        ->where('nombre',$nombre);

        $query = $sql->get();
        return $query->getResult();        
    }

    //3.- retorna el numero de empresas que ofrecen un juguete especifico
    public function getNumeroEmpresasPorJuguete(){
        $request = request();
        $nombre = $request->getGet('nombre');
        $db = db_connect();

        $sql = $db->table('juguete as j')
        ->selectCount('p.nombre')
        ->join('proveedores as p','j.id = p.producto')
        ->where('j.nombre',$nombre);

        $query = $sql->get();
        return $query->getResult();  
    }

    //4.- retorna los juguetes de una categoria ingresada
    public function getJuguetesPorCategoria($categoria){
        $db = db_connect();    
        $sql = $db->table('juguete')
            ->select('nombre, descripcion, categoria, precio, cantidad_disponible')
            ->where('categoria', $categoria);
        
        $query = $sql->get();
        return $query->getResult();
    }
    
    //5.- retorna todos los juguetes de la base de datos
    public function getAllJuguetes(){
        $db = db_connect();    
        $sql = $db->table('juguete')
            ->select('id, nombre, descripcion, categoria, precio, cantidad_disponible, fecha_ingreso');
        
        $query = $sql->get();
        return $query->getResult();
    }

    //6.- obtiene la información de un juguete específico según su ID
    public function getJuguetePorId($id){
        $db = db_connect();    
        $sql = $db->table('juguete')
            ->select('nombre,descripcion,categoria,precio,cantidad_disponible')
            ->where('id', $id);
        
        $query = $sql->get();
        return $query->getRow();
    }
    
    //7.- retorna todos los proveedores de un juguete específico según su ID
    public function getProveedoresPorJuguete($id){
        $db = db_connect();    
        $sql = $db->table('proveedores')
            ->select('nombre, descripcione, precio, cantidad_disponible')
            ->where('producto', $id);
        
        $query = $sql->get();
        return $query->getResult();
    }
    
    //8.- retorna todas las colecciones a las que pertenece un juguete específico según su ID
    public function getColeccionesPorJuguete($id){
        $db = db_connect();    
        $sql = $db->table('coleccion')
            ->select('nombre, fecha_salida')
            ->where('producto', $id);
        
        $query = $sql->get();
        return $query->getResult();
    }

}
