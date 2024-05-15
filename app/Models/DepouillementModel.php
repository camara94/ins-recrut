<?php 
namespace App\Models;  
use CodeIgniter\Model;
  
class DepouillementModel extends Model{  

    protected $DBGroup          = 'default';
    protected $table            = 'depouillements';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    
    protected $allowedFields = [
        'cv', 'pi', 'cm', 'ae', 'de', 'cr', 'cj', 'etat', 'user_id', 'postulant_id',
        'age17', 'age18', 'age12', 'dp_collect17','dp_chauffeur18','exp_collect17','exp_chauffeur18','utilis_tablette','cons_informatique','nb_langue17','nb_langue18',
        'niv_etu','sp','co_lg_carto_trait_img','trav_carto_realise', 'occ_ant', 'residence','dispo', 'note'
    ];
    
    // Dates
    protected $useTimestamps = true;
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

    // public function userprefectures()
    // {
    //     // return $this->hasMany('userprefectures', 'App\Models\UserPrefectureModel', 'user_id', 'id');
    //     // return $this->hasMany(BookModel::class, 'author_id', 'id');
    //     return $this->hasMany(UserPrefectureModel::class, 'user_id', 'id');

    // }

}