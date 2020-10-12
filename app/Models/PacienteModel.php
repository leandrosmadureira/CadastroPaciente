<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Database\Query;

class PacienteModel extends Model {
  protected $table = 'paciente';
  protected $primaryKey = 'cd_paciente';
  protected $returnType = 'array';
  //   protected $useSoftDeletes = true;

  protected $allowedFields = ['nm_paciente', 'nm_mae', 'nm_pai', 'dt_nascimento', 'nr_cpf', 'nr_cns'];
  /*
    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
   */
  protected $validationRules = [];
  protected $validationMessages = [];
  protected $skipValidation = false;
  

  public function getPacientes($limite = null, $cd_paciente = null, $nm_paciente = null, $nr_cpf = null) {
    $db = \Config\Database::connect();
    $str_nm_paciente = null;
    $str_cd_paciente = null;
    $str_nr_cpf = null;
    if ($nm_paciente) {
      $str_nm_paciente = "and        p.nm_paciente ilike upper('%$nm_paciente%')";
    }
    if ($cd_paciente) {
      $str_cd_paciente = "and       p.cd_paciente = $cd_paciente";
    }
    if ($nr_cpf) {
      $str_nr_cpf = "and        p.nr_cpf = '$nr_cpf'";
    }
    $query = " 
      select     p.cd_paciente
                 ,p.nm_paciente
                 ,p.nm_mae
                 ,p.nm_pai
                 ,p.dt_nascimento
                 ,p.nr_cpf
                 ,p.nr_cns
                 ,p.ds_foto
      from       paciente p
      where      1=1
      $str_nm_paciente
      $str_cd_paciente
      $str_nr_cpf
      order by   p.nm_paciente
      limit      $limite
    ";
    //print_r($query);exit;
    $return = $db->query($query)->getResult();
    //print_r($return);exit;
    //$return = (($return)?$return[0]:array());
    return $return;
  }

}
