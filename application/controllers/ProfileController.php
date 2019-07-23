<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ProfileController extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('SideBarModels');
        $this->load->model('GlobalVar');
        $this->load->model('ModelsPostProduct');
        $this->load->model('ModelsExecuteMaster');
        $this->load->model('ProfileModels');
    }
    function index(){
        $this->load->view('profile');
    }
    function Akun(){
        $this->load->view('ProfileAccount');
    }
    function pesanan(){
        $this->load->view('ProfileDaftarPesanan');
    }
    function member(){
        $this->load->view('ProfileMember');
    }
    function UpdateProfile()
    {
        $data = array('success' => false ,'message'=>array());

        $email = $this->input->post('email');
        $phone = $this->input->post('phone');
        $name = $this->input->post('name');
        $r3 = $this->input->post('r3');
        $birtday = $this->input->post('birtday');
        $user_id = $this->session->userdata('userid');

        $data = array(
            'email'     => $email,
            'notlp'     => $phone,
            'namamember'=> $name,
            'gender'    => $r3,
            'tgllahir'  => $birtday,
        );

        try {
            $exec = $this->ModelsExecuteMaster->ExecUpdate($data,array('userid'=>$user_id),'mastermember');
            if ($exec) {
                $data['success'] = true;
            }
        } catch (Exception $e) {
            $InsertData = array(
                'errorcode'     => '500-01',
                'errordesc'     => 'Server Error',
                'stacktrace'    => 'ProfileController line 53',
            );
            $exec = $this->ModelsExecuteMaster->ExecInsert($InsertData,'errorlog');
            $data['message'] = '500-01'.' '.$e->getMessage();
        }

        echo json_encode($data);
    }
}