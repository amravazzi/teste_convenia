<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ferias extends CI_Controller 
{

	public function __construct()
	{
		parent::__construct();

		$this->load->model('mainModel');
		$this->load->helper('date');
	}


	public function resumo()
	{
		$info = $this->mainModel->getEmployeeInfo();
		$this->load->library('table');

		$resumo['cabeçalho']['funcionário'] = 'Funcionário';
		$resumo['cabeçalho']['contratado'] 	= 'Contratado em';
		$resumo['cabeçalho']['concessão'] 	= 'Início do período de concessão';
		$resumo['cabeçalho']['status'] 		= 'Status atual';
		$resumo['cabeçalho']['faltas'] 		= 'Total de faltas';
		$resumo['cabeçalho']['dias'] 		= 'Dias de férias';

		foreach ($info->result() as $row)
		{
		    $daysToNow = (now() - human_to_unix($row->hired_date))/60/60/24;
		    $daysToVaccation = floor(365 - $daysToNow);
		    $periodoConcessivoStartDate = 86400*365 + human_to_unix($row->hired_date);

		    $resumo[$row->name]['name'] = $row->name;
		    $resumo[$row->name]['hired'] = date('d-m-Y', human_to_unix($row->hired_date));
		    $resumo[$row->name]['concessao_start'] = date('d-m-Y', $periodoConcessivoStartDate);

		    //Verifica em qual período está o empregado
		    if($daysToVaccation <= 0)
		    {
		    	$resumo[$row->name]['period'] = 'concessão';

		    } else {
		    	$resumo[$row->name]['period'] = 'aquisição';
		    }

			$resumo[$row->name]['days_missed'] = $row->days_missed;

		    //Verifica quantos dias tem de férias baseado nas faltas registradas
	    	if($row->days_missed < 6)
	    	{
	    		$resumo[$row->name]['vac_days'] = 30;
	    	} 
	    	elseif(($row->days_missed > 5)&&($row->days_missed < 15)) 
	    	{
	    		$resumo[$row->name]['vac_days'] = 24;
	    	} 
	    	elseif(($row->days_missed > 14)&&($row->days_missed < 24)) 
	    	{
	    		$resumo[$row->name]['vac_days'] = 18;
	    	} 
	    	elseif(($row->days_missed > 23)&&($row->days_missed < 34)) 
	    	{
	    		$resumo[$row->name]['vac_days'] = 12;
	    	} else {
	    		$resumo[$row->name]['vac_days'] = 0;
	    	}

		}

		$this->load->view('resumo', array('resumo' => $resumo));

	}

}
