<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class SiteInformationController extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('GlobalVar');
		$this->load->model('ModelsExecuteMaster');
	}
	function GetBanner()
	{
		$data = array('success' => false ,'message'=>array(),'data' =>array());

		$GetBanner = $this->ModelsExecuteMaster->FindData(array('tglpasif'=>null),'sitebanner');
		if($GetBanner){
			$data['success'] = true;
			$data['data'] =$GetBanner->result();
		}
		else{
			$InsertData = array(
				'errorcode'		=> '404-01',
				'errordesc'		=> 'Server Error',
				'stacktrace'	=> 'SiteInformationController line 29',
			);
			$exec = $this->ModelsExecuteMaster->ExecInsert($InsertData,'errorlog');
			$data['message'] = '404-01';
		}
		echo json_encode($data);
	}
}