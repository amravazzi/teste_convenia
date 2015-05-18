<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Migration_Add_Employee extends CI_Migration {

	public function up()
	{
		$this->dbforge->add_field(array(
				'id' => array(
					'type' => 'INT',
					'unsigned' => TRUE,
					'auto_increment' => TRUE
				),
				'name' => array(
					'type' => 'VARCHAR',
					'constraint' => 255
				),
				'hired_date' => array(
					'type' => 'DATETIME'
				),
				'days_missed' => array(
					'type' => 'INT'
				)
		));

		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('employee');
	}

	public function down()
	{
		$this->dbforge->drop_table('employee');
	}

}