<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class mainModel extends CI_Model 
{

	public function __construct()
	{
		parent::__construct();
	}

	public function seed()
	{
		$data1 = array(
		   'name' => 'Func 1',
		   'hired_date' => '2014-01-01',
		   'days_missed' => 2
		);
		$this->db->insert('employee', $data1); 

		$data2 = array(
		   'name' => 'Func 2',
		   'hired_date' => '2013-07-11',
		   'days_missed' => 8
		);
		$this->db->insert('employee', $data2); 

		$data3 = array(
		   'name' => 'Func 3',
		   'hired_date' => '2014-06-15',
		   'days_missed' => 14
		);
		$this->db->insert('employee', $data3); 

		$data4 = array(
		   'name' => 'Func 4',
		   'hired_date' => '2015-07-21',
		   'days_missed' => 25
		);
		$this->db->insert('employee', $data4); 

		$data5 = array(
		   'name' => 'Func 5',
		   'hired_date' => '2015-02-01',
		   'days_missed' => 35
		);
		$this->db->insert('employee', $data5); 
	}

	public function getEmployeeInfo()
	{
		return $this->db->get('employee');
	}



}