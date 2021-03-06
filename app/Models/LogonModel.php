<?php namespace App\Models;

use CodeIgniter\Model;

class PacienteModel extends Model
{
    protected $table      = 'paciente';
    protected $primaryKey = 'cd_paciente';

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['nm_paciente', 'nm_mae','nm_pai', 'dt_nascimento','nr_cpf','nr_cns'];

    protected $useTimestamps = false;

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}