<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Migrate extends CI_Controller 
{

	public function __construct()
	{
		parent::__construct();

		if($this->input->is_cli_request() == FALSE)
		{
			show_404();
		}

		$this->load->library('migration');
		$this->load->dbforge();
	}

	public function latest()
	{
		$this->migration->latest();
		echo 'Tabela migrada com sucesso!';
	}

	public function seed()
	{
		$this->load->model('mainModel');
		$this->mainModel->seed();
		echo 'Tabela seedada com sucesso!';
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/migrate.php */