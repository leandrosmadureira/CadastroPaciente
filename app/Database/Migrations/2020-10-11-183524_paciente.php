<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Paciente extends Migration
{
	public function up()
	{
		$this->forge->addField([
				'cd_paciente'          => [
						'type'           => 'SERIAL',
				],
				'nm_paciente'       => [
						'type'           => 'VARCHAR',
						'constraint'     => '100',
						'null'           => false,
				],
				'nm_pai'       => [
						'type'           => 'VARCHAR',
						'constraint'     => '100',
						'null'           => true,
				],
				'nm_mae'       => [
						'type'           => 'VARCHAR',
						'constraint'     => '100',
						'null'           => false,
				],
				'dt_nascimento'       => [
						'type'           => 'date',
						'null'           => false,
				],
				'nr_cpf'       => [
						'type'           => 'VARCHAR',
						'constraint'     => '20',
						'null'           => false,
				],
				'nr_cns'       => [
						'type'           => 'VARCHAR',
						'null'           => false,
						'constraint'     => '20',
				],
				'ds_foto'       => [
						'type'           => 'VARCHAR',
						'constraint'     => '100',
						'default'        => 'foto.jpg',
				],
		]);
		$this->forge->addKey('cd_paciente', true);
		$this->forge->createTable('paciente');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('blog');
	}
}
