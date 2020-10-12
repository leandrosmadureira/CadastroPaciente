<?php namespace App\Controllers;

class Paciente extends BaseController
{
	public function index()
	{
        //print_r($this->request->getPost());exit;
        $pacienteModel = new \App\Models\PacienteModel();
        $cd_paciente = (($this->request->getPostGet('cd_paciente'))?$this->request->getPostGet('cd_paciente'):null);
        $nm_paciente = (($this->request->getPostGet('nm_paciente'))?$this->request->getPostGet('nm_paciente'):null);
        $nm_mae = (($this->request->getPostGet('nm_mae'))?$this->request->getPostGet('nm_mae'):null);
        $nm_pai = (($this->request->getPostGet('nm_pai'))?$this->request->getPostGet('nm_pai'):null);
        $dt_nascimento = (($this->request->getPostGet('dt_nascimento'))?$this->request->getPostGet('dt_nascimento'):null);
        $nr_cpf = (($this->request->getPostGet('nr_cpf'))?$this->request->getPostGet('nr_cpf'):null);
        $nr_cns = (($this->request->getPostGet('nr_cns'))?$this->request->getPostGet('nr_cns'):null);
        $ds_foto = (($this->request->getPostGet('ds_foto'))?$this->request->getPostGet('ds_foto'):null);
        $submit = (($this->request->getPostGet('submit'))?$this->request->getPostGet('submit'):null);
        $msg = "";
        dd($this->validaCns($nr_cns));exit;
        if($submit == 'submit'){
            $msg .= ((!$this->validaCPF($nr_cpf)) ? "CPF Invalido </br>":null);
            $msg .= (!isset($nm_paciente) ? "Necessário informar um nome! <\br>" : null);
            $msg .= (!isset($nm_mae) ? "Necessário informar o nome da mãe! <\br>" : null);
            $msg .= (!isset($dt_nascimento) ? "Data de nascimento ainda não informada! <\br>" : null);
            $msg .= (!isset($nr_cns) ? "Informe o número de CARTÃO NACIONAL SUS! <\br>" : null);
            $msg .= (!isset($nr_cns)? "Não passou pela validação":null);
        }
        $paciente = [];
        $paciente['cd_paciente'] = null;
        $paciente['nm_paciente'] = null;
        $paciente['nm_mae'] = null;
        $paciente['nm_pai'] = null;
        $paciente['dt_nascimento'] = null;
        $paciente['nr_cpf'] = null;
        $paciente['nr_cns'] = null;
        $paciente['ds_foto'] = null;
        /*
		$pacienteModel->insert([
			'nm_paciente' 	=> '$nm_paciente',
			'nm_mae'		=> '$nm_mae',
			'nm_pai'		=> '$nm_pai',
			'dt_nascimento'	=> '$dt_nascimento',
			'nr_cpf'		=> '$nr_cpf',
			'nr_cns'		=> '$nr_cns',
			'ds_foto'		=> '$ds_foto'
		]);
        */
        //$paciente = $pacienteModel->find(1);
        $dados['paciente'] = $paciente;
		return view('paciente\paciente',$dados);
	}

	//--------------------------------------------------------------------
}