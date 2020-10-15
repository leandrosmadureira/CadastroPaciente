<?php

namespace App\Controllers;

use CodeIgniter\I18n\Time;

class Paciente extends BaseController {

  public function index() {
    //print_r($this->request->getPost());exit;
    $pacienteModel = new \App\Models\PacienteModel();
    $cd_paciente = (($this->request->getPostGet('cd_paciente')) ? $this->request->getPostGet('cd_paciente') : null);
    $nm_paciente = (($this->request->getPostGet('nm_paciente')) ? $this->request->getPostGet('nm_paciente') : null);
    $nm_mae = (($this->request->getPostGet('nm_mae')) ? $this->request->getPostGet('nm_mae') : null);
    $nm_pai = (($this->request->getPostGet('nm_pai')) ? $this->request->getPostGet('nm_pai') : null);
    $dt_nascimento = (($this->request->getPostGet('dt_nascimento')) ? $this->request->getPostGet('dt_nascimento') : null);
    $nr_cpf = (($this->request->getPostGet('nr_cpf')) ? $this->request->getPostGet('nr_cpf') : null);
    $nr_cns = (($this->request->getPostGet('nr_cns')) ? $this->request->getPostGet('nr_cns') : null);
    $ds_foto = (($this->request->getPostGet('ds_foto')) ? $this->request->getPostGet('ds_foto') : null);

    $cep = (($this->request->getPostGet('cep')) ? $this->request->getPostGet('cep') : null);
    $logradouro = (($this->request->getPostGet('logradouro')) ? $this->request->getPostGet('logradouro') : null);
    $numero = (($this->request->getPostGet('numero')) ? $this->request->getPostGet('numero') : null);
    $bairro = (($this->request->getPostGet('bairro')) ? $this->request->getPostGet('bairro') : null);
    $cidade = (($this->request->getPostGet('cidade')) ? $this->request->getPostGet('cidade') : null);
    $uf = (($this->request->getPostGet('uf')) ? $this->request->getPostGet('uf') : null);
    
    $submit = (($this->request->getPostGet('submit')) ? $this->request->getPostGet('submit') : null);
    $msg_erro = "";
    $msg = "";

    $paciente = [];
    $paciente['cd_paciente'] = $cd_paciente;
    $paciente['nm_paciente'] = $nm_paciente;
    $paciente['nm_mae'] = $nm_mae;
    $paciente['nm_pai'] = $nm_pai;
    $paciente['dt_nascimento'] = $dt_nascimento;
    $paciente['nr_cpf'] = $nr_cpf;
    $paciente['nr_cns'] = $nr_cns;
    $paciente['ds_foto'] = $ds_foto;

    $endereco = [];
    $endereco['cep'] = $cep;
    $endereco['logradouro'] = $logradouro;
    $endereco['numero'] = $numero;
    $endereco['bairro'] = $bairro;
    $endereco['cidade'] = $cidade;
    $endereco['uf'] = $uf;


    if ($submit == 'submit') {
      $msg_erro .= (!isset($nm_paciente) ? "Necessário informar um nome! </br>" : null);
      $msg_erro .= (!isset($nm_mae) ? "Necessário informar o nome da mãe! </br>" : null);
      $msg_erro .= (!isset($dt_nascimento) ? "Data de nascimento ainda não informada! </br>" : null);
      $msg_erro .= (!isset($nr_cns) ? "Informe o número de <b>CNS!</b> </br>" : null);
      $msg_erro .= (!isset($nr_cns) ? "Não passou pela validação </br>" : null);
      $msg_erro .= (!isset($nr_cpf) ? "<b>CPF</b> deve ser informado! </br>" : null);
      if ($msg_erro == '') {
        $msg_erro .= ((!$this->validaCPF($nr_cpf)) ? "<b>CPF</b> Invalido </br>" : null);
        $duplicidade = $pacienteModel->where('nr_cpf',"$nr_cpf")->findAll();
        $msg_erro .= ((count($duplicidade) > 0) and !$cd_paciente ? "Já existe paciente cadastrado com esse CPF <br>": null);
        $msg_erro .= (!$this->validaCns($nr_cns) ? "<b>CNS</b> inválido! </br>" : null);
        $dt = explode('-', $dt_nascimento);
        $msg_erro .= (!checkdate($dt[1], $dt[2], $dt[0]) ? "<b>Data de Nascimento</b> inválido! </br>" : null);
      }  
      if (!$msg_erro) {
        if (isset($cd_paciente)) {
          if($pacienteModel->update($paciente['cd_paciente'], [
            'nm_paciente' => $paciente['nm_paciente'],
            'nm_mae' => $paciente['nm_mae'],
            'nm_pai' => $paciente['nm_pai'],
            'dt_nascimento' => $paciente['dt_nascimento'],
            'nr_cpf' => $paciente['nr_cpf'],
            'nr_cns' => $paciente['nr_cns'],
            'ds_foto' => $paciente['ds_foto']
          ])){
            $msg .= "Dados atualizados como sucesso! <br>";
          };
        } else {
          if($pacienteModel->insert(
            [
              'nm_paciente' => $paciente['nm_paciente'],
              'nm_mae' => $paciente['nm_mae'],
              'nm_pai' => $paciente['nm_pai'],
              'dt_nascimento' => $paciente['dt_nascimento'],
              'nr_cpf' => $paciente['nr_cpf'],
              'nr_cns' => $paciente['nr_cns'],
              'ds_foto' => $paciente['ds_foto']
          ])){
            $msg .= "Dados inseridos como sucesso! <br>";
          };
        }
      }
    }
    if($submit == 'consulta'){
      $paciente = (array) $pacienteModel->getPacientes(10, $cd_paciente, $nm_paciente, $nr_cpf)[0];
    }
    $dados['paciente'] = $paciente;
    $dados['msg_erro'] = $msg_erro;
    $dados['endereco'] = $endereco;
    $dados['msg'] = $msg;
    return view('paciente\paciente', $dados);

    //--------------------------------------------------------------------
  }

}
