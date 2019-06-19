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

		$field = '';
		$order = '';

		$order = $this->input->post('order');

		if($order == ''){
			$field = 'a.id';
			$order = 'DeSC';
			// $sort = array('tglaktif','desc');
		}
		if ($order == '2') {
			$field = 'a.price - ((CASE WHEN a.promomember = 1 THEN (SELECT MAX(x.benefitdiscount) FROM mastersettingmember x) ELSE 0 END/100)*a.price)';
			$order = 'asc';
			// $sort = array('price','asc');
		}
		if ($order == '3') {
			$field = 'a.price - ((CASE WHEN a.promomember = 1 THEN (SELECT MAX(x.benefitdiscount) FROM mastersettingmember x) ELSE 0 END/100)*a.price)';
			$order = 'desc';
			// $sort = array('price','desc');
		}
		if ($order == '4') {
			$field = 'tglaktif';
			$order = 'desc';
			// $sort = array('tglaktif','desc');
		}
		$perPage = 1;

		$GetPost = $this->ModelsPostProduct->GetPost($field,$order);
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

	function GetPost_nextStep()
	{
		$data = array('success' => false ,'message'=>array(),'data' =>array());

		$field = '';
		$order = '';

		$lastid = $this->input->post('lastid');

		$GetPost = $this->ModelsPostProduct->GetPostNextLoad($lastid);
		if($GetPost->num_rows()>0){
			$data['success'] = true;
			$data['data'] =$GetPost->result();
		}
		else{
			$InsertData = array(
				'errorcode'		=> '404-01',
				'errordesc'		=> 'Server Error',
				'stacktrace'	=> 'SitePostController line 83',
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

	function GetPromo()
	{
		$data = array('success' => false ,'message'=>array(),'data' =>array());


		$GetPost = $this->ModelsPostProduct->GetPromoMember('max');
		if($GetPost->num_rows()>0){
			$data['success'] = true;
			$data['data'] =$GetPost->result();
		}
		else{
			$InsertData = array(
				'errorcode'		=> '404-01',
				'errordesc'		=> 'Server Error',
				'stacktrace'	=> 'SitePostController line 105',
			);
			$exec = $this->ModelsExecuteMaster->ExecInsert($InsertData,'errorlog');
			$data['message'] = '404-01';
		}
		echo json_encode($data);
	}
	function loadRecord($rowno=0,$order='')
	{
		$rowperpage = 3;
 		$field = '';
		$order = $order;

		// $order = $this->input->post('order');

		if($order == ''){
			$field = 'a.id';
			$order = 'DeSC';
			// $sort = array('tglaktif','desc');
		}
		if ($order == '2') {
			$field = 'a.price - ((CASE WHEN a.promomember = 1 THEN (SELECT MAX(x.benefitdiscount) FROM mastersettingmember x) ELSE 0 END/100)*a.price)';
			$order = 'asc';
			// $sort = array('price','asc');
		}
		if ($order == '3') {
			$field = 'a.price - ((CASE WHEN a.promomember = 1 THEN (SELECT MAX(x.benefitdiscount) FROM mastersettingmember x) ELSE 0 END/100)*a.price)';
			$order = 'desc';
			// $sort = array('price','desc');
		}
		if ($order == '4') {
			$field = 'tglaktif';
			$order = 'desc';
			// $sort = array('tglaktif','desc');
		}

        if($rowno != 0){
          $rowno = ($rowno-1) * $rowperpage;
        }

        $allcount = $this->db->where('tglpasif',null)->from("post_product")->count_all_results();

        // var_dump($allcount);
        // $this->db->limit($rowperpage, $rowno);

        $users_record = $this->ModelsPostProduct->GetPost($field,$order,$rowperpage, $rowno)->result_array();

        // var_dump($users_record);

        $config['base_url'] = base_url().'SitePostController/loadRecord';
        $config['use_page_numbers'] = TRUE;
        $config['total_rows'] = $allcount;
        $config['per_page'] = $rowperpage;

        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tag_close']  = '<span aria-hidden="true"></span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tag_close']  = '</span></li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tag_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tag_close']  = '</span></li>';

        $this->pagination->initialize($config);
 
        $data['pagination'] = $this->pagination->create_links();
        $data['result'] = $users_record;
        $data['row'] = $rowno;
 
        echo json_encode($data);
	}
}