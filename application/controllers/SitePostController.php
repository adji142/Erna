<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class SitePostController extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('GlobalVar');
		$this->load->model('ModelsExecuteMaster');
		$this->load->model('ModelsPostProduct');
	}
	function GetPost()
	{
		$data = array('success' => false ,'message'=>array(),'data' =>array());

		$sort = array();

		$order = $this->input->post('order');

		if($order = ''){
			$sort = array('tglaktif','desc');
		}

		$GetPost = $this->ModelsPostProduct->GetPost($sort);
		if($GetPost->num_rows()>0){
			$data['success'] = true;
			$data['data'] =$GetPost->result();
		}
		else{
			$InsertData = array(
				'errorcode'		=> '404-01',
				'errordesc'		=> 'Server Error',
				'stacktrace'	=> 'SitePostController line 30',
			);
			$exec = $this->ModelsExecuteMaster->ExecInsert($InsertData,'errorlog');
			$data['message'] = '404-01';
		}
		echo json_encode($data);
	}
	function GetImagePost()
	{
		$data = array('success' => false ,'message'=>array(),'data' =>array());

		$id = $this->input->post('postid');

		$GetImg = $this->ModelsExecuteMaster->FindData(array('postid'=>$id),'imagetable');
		if($GetImg->num_rows()>0){
			$data['success'] = true;
			$data['data'] =$GetImg->result();
		}
		else{
			$InsertData = array(
				'errorcode'		=> '404-01',
				'errordesc'		=> 'Server Error',
				'stacktrace'	=> 'SitePostController line 60',
			);
			$exec = $this->ModelsExecuteMaster->ExecInsert($InsertData,'errorlog');
			$data['message'] = '404-01';
		}
		echo json_encode($data);
	}

	function GetPostbyID()
	{
		$data = array('success' => false ,'message'=>array(),'data' =>array());

		$id = $this->input->post('postid');

		$GetPost = $this->ModelsPostProduct->GetPostWhere('id',$id);
		if($GetPost->num_rows()>0){
			$data['success'] = true;
			$data['data'] =$GetPost->result();
		}
		else{
			$InsertData = array(
				'errorcode'		=> '404-01',
				'errordesc'		=> 'Server Error',
				'stacktrace'	=> 'SitePostController line 84',
			);
			$exec = $this->ModelsExecuteMaster->ExecInsert($InsertData,'errorlog');
			$data['message'] = '404-01';
		}
		echo json_encode($data);
	}
}