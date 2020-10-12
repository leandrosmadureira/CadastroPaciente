<?php namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		$pacienteModel = new \App\Models\PacienteModel();
		/*
		$pacienteModel->insert([
			'nm_paciente' 	=> 'LEANDRO SOARES MADUREIRA',
			'nm_mae'		=> 'APARECIDA SOARES SANTANA MADUREIRA',
			'nm_pai'		=> 'FAUSTINO DO CARMO MADUREIRA',
			'dt_nascimento'	=> '1991-03-22',
			'nr_cpf'		=> '09644977602',
			'nr_cns'		=> '123456789987654',
			'ds_foto'		=> 'foto01.jpg'
		]);
		*/
		print_r($pacienteModel->findAll());
		
		return view('welcome_message');
	}

	//--------------------------------------------------------------------

}
