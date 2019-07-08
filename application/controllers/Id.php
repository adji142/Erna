<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Id extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('GlobalVar');
		$this->load->model('ModelsExecuteMaster');
		$this->load->library('user_agent');
	}
	function test()
	{
		$this->load->view('test');
	}

	function Index()
	{
		$this->load->view('Index');
		// var_dump(gethostbyname(getHostName()));
		if ($this->agent->is_browser()){
            $agent = $this->agent->browser().' '.$this->agent->version();
        }elseif ($this->agent->is_mobile()){
            $agent = $this->agent->mobile();
        }else{
            $agent = 'Data user gagal di dapatkan';
        }
		$ip = gethostbyname(getHostName());
		$platform = $this->agent->platform();
		$browser = $agent;

		$data = array(
			'ip'		=> $ip,
			'platform'	=> $platform,
			'browser'	=> $browser
		);
		$this->ModelsExecuteMaster->ExecInsert($data,'visitlog');

		// Session
		if (!$this->session->userdata('anonimouse')) {
			$id_reg = rand(0,999999999);
	        $sess_data['anonimouse']=md5($id_reg);
	        $this->session->set_userdata($sess_data);	
		}
	}
	function Home()
	{
		$this->load->view('Index');
	}
	function SettingMember()
	{
		$this->load->view('MasterSettingMember');
	}
	function GrupMember()
	{
		$this->load->view('GroupMember');
	}
	function MasterXPDC()
	{
		$this->load->view('MasterXPDC');
	}
	function MasterStock()
	{
		$this->load->view('masterStock');
	}
	function MutasiStock()
	{
		$this->load->view('MutasiStock');
	}
	// site setting
	function siteBanner()
	{
		$this->load->view('WebSetBanner');
	}
	function siteCategories()
	{
		$this->load->view('WebSetCategories');
	}
	function siteAbout()
	{
		$this->load->view('WebSetAbout');
	}
	function siteInfo()
	{
		$this->load->view('WebSetInfo');
	}
	function CheckOut()
	{
		$this->load->view('Checkout');
	}
}