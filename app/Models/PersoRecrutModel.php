<?php

namespace App\Models;

use CodeIgniter\Model;

class PersoRecrutModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'recrut_personne_recrut';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    // protected $allowedFields    = ['id_projet', 'name', 'last_name', 'date_naiss', 'lieu_naiss', ];
    
    protected $allowedFields    = [
        'codeProjet', 'NomProjet', 'titre_poste', 'departement', 'departement2', 'departement3', 'departement4', 'sousprefecture', 'sousprefecture2', 'sousprefecture3', 
        'sousprefecture4', 'possedeNumTel', 'nomtuteurlegal', 'nomtuteurlegal2', 'namepere', 'namemere', 'isDisponible', 'hasAcceptDisponible', 'hasexpcollecte', 'exp_structure', 
        'exp_annee', 'exp_intitule_poste', 'exp_intitule_projet', 'date_jour_decla', 'declarahonneur', 'confirmlieuaffectation', 'codebonneconduite', 'contrat', 'numero_cni', 'type_piece', 
        'name', 'last_name', 'choix_projet', 'date_naiss', 'lieu_naiss', 'sexe', 'niveau_etude', 'last_diplome', 'status', 'email', 
        'contact1', 'contact2', 'contact3', 'first_langue_nat', 'second_langue_nat', 'third_langue_nat', 'photo', 'cv', 'doc_last_diplome', 'cni', 'cnituteur',
        'id_projet', 'name', 'last_name', 'date_naiss', 'lieu_naiss', 'certifmedical','certifresidence','matricule','casier','note2','is_admited','rank','admited_at'
        ,'fonction_id', 'attestcollecte', 'mobile', 'depouille', 'user_id', 'uuid', 'renewCV'
        
        , 'comSalle', 'quartSalle', 'adresSalle', 'siteSalle', 'salle', 'phone_om', 'residence_situation',
    ];
    
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

    protected $softDeleteField = '';

    public function matricule($matricule)
    {
        if(empty($matricule)) return [];
        return $this->where('matricule', $matricule)->findAll();
    }

    public function contact1($contact1, $project_id)
    {
        if(empty($contact1)) return [];
        return $this->where('contact1', $contact1)->where('id_projet', $project_id)->findAll();
    }

    public function email($email, $project_id)
    {
        if(empty($email)) return [];
        return $this->where('email', $email)->where('id_projet', $project_id)->findAll();
    }

    public function piece($type_piece, $numero_cni, $project_id)
    {
        if(empty($type_piece) || empty($numero_cni)) return [];
        return $this->where('type_piece', $type_piece)->where('numero_cni', $numero_cni)->where('id_projet', $project_id)->findAll();
    }

    public function dropdown_orderby()
    {
        $args = func_get_args();

        if(count($args) == 2){
            list($key, $value) = $args;
        } 
        else{
            $key = $this->primaryKey;
            $value = $args[0];
        }

        $this->trigger('before_dropdown', [$key, $value]);

        if ($this->useSoftDeletes && $this->_temporaryWithDeleted !== true) {
            $this->where($this->softDeleteField, false);
        }

        $result = $this->select([$key, $value])
                       ->orderBy('libelle', 'ASC')
                       ->get()
                       ->getResult();

        $options = [];
        foreach ($result as $row) {
            $options[$row->{$key}] = $row->{$value};
        }

        $options = $this->trigger('after_dropdown', $options);
        return $options;
    }

    public function getValueByParameter($parameter)
    {
        return $this->where('libelle', $parameter)->first();
    }

    public function projet()
    {
        // return $this->belongsTo('projet', 'App\Models\ProjetModel');
        $this->belongsTo('projet', 'App\Models\ProjetModel', 'id', 'id_projet');
    }

    public function prefecture()
    {
        // return $this->belongsTo('projet', 'App\Models\ProjetModel');
        $this->belongsTo('prefecture', 'App\Models\DepartementModel', 'CodDep', 'departement3');
    }

    public function sprefecture()
    {
        $this->belongsTo('sprefecture', 'App\Models\SPrefectureModel', 'CodSp', 'sousprefecture3');
    }

    public function userAffect($user_id)
    {
        return $this->where('user_id', $user_id)->findAll();
    }

    public function userDepouille($user_id)
    {
        return $this->where('depouille', 1)->where('user_id', $user_id)->findAll();
    }

    public function nbUserAffect($user_id)
    {
        return $this->where('user_id', $user_id)->countAllResults();
    }

    public function nbUserDepouille($user_id)
    {
        return $this->where('depouille', 1)->where('user_id', $user_id)->countAllResults();
    }

}

