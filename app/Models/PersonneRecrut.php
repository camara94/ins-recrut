<?php

namespace App\Models;

use CodeIgniter\Model;

class PersonneRecrut extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'recrut_personne_recrut';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['matricule','name','last_name','note'];


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

    public function countHommes()
    {
                
        $session = \Config\Services::session();
        
        $userprefectures = array_column($session->get('userprefectures'), 'prefecture_id');
        if(!$userprefectures){
            $userprefectures = [0];
        }
            
        return $this->where('sexe', '1')->whereIn('departement3', $userprefectures)->countAllResults();
    }

    public function countFemmes()
    {
        // return $this->where('sexe', '2')->countAllResults();

        $session = \Config\Services::session();        
        $userprefectures = array_column($session->get('userprefectures'), 'prefecture_id');
        if(!$userprefectures){
            $userprefectures = [0];
        }
            
        return $this->where('sexe', '2')->whereIn('departement3', $userprefectures)->countAllResults();
    }

    /*  public function updateNote($matricule, $note)
    {
        $q = $this->where('matricule', $matricule);
        $this->update(['note' => $note]);
        return true;
    } 

    public function updateNote($data)
    {
        $q = $this->builder($this->table)->updateBatch($data, 'matricule');
        return true;
    } */

    public function updateNoteByMatricule($matricule, $pointsTotal)
    {
        $data = [
            'note' => $pointsTotal,
        ];
       // print_r($pointsTotal);
        $this->where('matricule', $matricule);
        $this->update('recrut_personne_recrut', $data);
        //return true;
    }
}
