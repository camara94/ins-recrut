<?php

namespace App\Models;

use CodeIgniter\Model;

class EhnieModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'recrut_ethnie';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['libelle'];

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

    public function dropdown_orderby()
    {
        $args = func_get_args();

        if (count($args) == 2) {
            list($key, $value) = $args;
        } else {
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

}
