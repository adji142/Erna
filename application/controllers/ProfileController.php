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
    function RekeningDetail()
    {
        $data = array('success' => false ,'message'=>array(),'data' =>array());

        $id = $this->input->post('idrek');

        $rek = $this->ModelsExecuteMaster->FindData(array('tglpasif'=>null),'masterrekening')->result();

        $data['success'] = true;
        $data['data'] = $rek;
        echo json_encode($data);
    }
    function SavePayment()
    {
        $data = array('success' => false ,'message'=>array());

        $nopembayaran = 'BBM'.rand();
        $tglpembayaran = date("Y-m-d H:i:s");
        $doid = $this->input->post('doid');
        $image = $this->input->post('base64');
        $rekening = $this->input->post('rekening');

        $excec = $this->ProfileModels->SumOrder($doid);
        $jumlahtagihan = $excec->row()->TOTAL;

        $datainsert = array(
            'nopembayaran'  => $nopembayaran,
            'tglpembayaran' => $tglpembayaran,
            'doid'          => $doid,
            'jumlah'        => $jumlahtagihan,
            'image'         => 'data:image/png;base64,'.$image,
            'rekeningid'    => $rekening,
            'confirmed'     => 0,
        );

        $exec = $this->ModelsExecuteMaster->ExecInsert($datainsert,'pembayaran');
        if ($exec) {
            $update = $this->ModelsExecuteMaster->ExecUpdate(array('statusorder'=>1),array('id'=>$doid),'deliveryorder');
            if ($update) {
                $data['success'] = true;
            }
            else{
                $data['message'] = 'Update Status Pesanan Gagal';
            }
        }
        else{
            $data['message'] = 'Pemnbayaran Gagal MOhon hubungi Customer Service';
        }
        echo json_encode($data);
    }
    function Selesai()
    {
        $data = array('success' => false ,'message'=>array());
        $doid = $this->input->post('doid');

        $update = $this->ModelsExecuteMaster->ExecUpdate(array('statusorder'=>5),array('id'=>$doid),'deliveryorder');
        if ($update) {
            $data['success'] = true;
        }
        else{
            $data['message'] = 'Update Status Pesanan Gagal';
        }
        echo json_encode($data);
    }
    function review()
    {
        $data = array('success' => false ,'message'=>array());

        $postorderid = $this->input->post('postorderid');
        $userid_ = $this->input->post('userid_');
        $rating = $this->input->post('rating');
        $descrev = $this->input->post('descrev');

        $dataInsert = array(
            'userid'    => $userid_,
            'postid'    => $postorderid,
            'starpoint' => $rating,
            'comment'   => $descrev,
        );

        $ExecInsert = $this->ModelsExecuteMaster->ExecInsert($dataInsert,'review');

        if ($ExecInsert) {
            $data['success'] = true;
        }
        else{
            $data['message'] = 'Gagal Menambahkan review silahkan hubungi Customer Service kami';
        }
        echo json_encode($data);
    }
}