<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Banco extends Migration
{
	public function up()
	{
		$forge->createDatabase('cadastro', TRUE);
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$forge->dropDatabase('cadastro');
	}
}
