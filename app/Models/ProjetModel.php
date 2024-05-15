<?php

namespace App\Models;

use CodeIgniter\Model;

class ProjetModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'recrut_projet';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [];
    // protected $allowedFields    = ['Codeprojet','NomProjet','SigleProjet','Datedebut'];

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

    public function get_all_oderby()
    {
        // return $this->db
        //     ->select('recrut_projet.*')
        //     ->order_by('recrut_projet.nbrdisponible', 'DESC')
        //     ->get('recrut_projet')
        //     ->result();

        return $this->where('active', '1');            
    }

    // public function postulants()
    // {
    //     // return $this->hasMany('postulants', 'App\Models\PersoRecrutModel');
    //     $this->hasMany('postulants', 'App\Models\PersoRecrutModel', 'id_projet', 'id');
    // }

    public function postulants()
    {
        // return $this->hasMany('postulants', 'App\Models\PersoRecrutModel');
        $this->hasMany('postulants', 'App\Models\PersoRecrutModel', 'id_projet', 'id');
    }

}
