<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Auth_Login extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->library('user_agent');
		$this->load->model('ModelsExecuteMaster');
        $this->load->model('GlobalVar');
	}
	function reg_pro(){
        if ($this->agent->is_browser()){
            $agent = $this->agent->browser().' '.$this->agent->version();
        }elseif ($this->agent->is_mobile()){
            $agent = $this->agent->mobile();
        }else{
            $agent = 'Data user gagal di dapatkan';
        }
        $data['success']=true;
        $username = $this->input->post('username');
        $email = $this->input->post('email');
        $phone = $this->input->post('phone');
        $pass = $this->input->post('pass');
        $re_Pass =$this->input->post('repass');
        $token = $this->security->get_csrf_hash();

        $md_pass = $this->encryption->encrypt($re_Pass);
        if ($pass == $re_Pass) {
        	$data= array(
                'email'=>$email,
                'phone'=>$phone,
                'token'=> $token,
                'ip'=>$this->input->ip_address(),
                'browser'=>$agent,
                'createdby'=>'system',
                'createdon'=>date("Y-m-d H:i:s"),
                'verified' => 0,
                'username' => $username,
                'password' => $md_pass
            );
            try{
                $this->ModelsExecuteMaster->ExecInsert($data,'users');
                $data = array('success' => true ,'saving' => true,'return'=>$email);
            }
            catch(Exception $e){
                $data['error'] = $e;
            }
        }
        else{
        	$data['message'] = '500-NotMatch';
        }
        echo json_encode($data);
    }

    function send_email(){
        $this->load->library('email');
        $param = $this->input->post('ver');
        $hash = $this->input->post('map');
        $Cek_Already = $this->ModelsExecuteMaster->FindData(array('email'=>$param),'users');

        $token = $Cek_Already->row()->token;
        $data = array('success' => false ,'message'=>array());

        $url = $_SERVER['HTTP_REFERER'];
        $config = Array(
        'protocol' => 'smtp',
        'smtp_host' => 'in-v3.mailjet.com',//'ssl://srv57.niagahoster.com',
        'smtp_port' => 587 ,//465,
        'smtp_user' => '8f66723472d5c1b1200ccfa0e1e0f497',//'info@koprasiwanitausahamandiri.com',//'postmaster@sandbox96a59d42d16b45829acd22122c0e4fa2.mailgun.org', //isi dengan gmailmu!
        'smtp_pass' => 'cbb303c9e63705c5edb938ee23572853',//'Admin123', //isi dengan password gmailmu!
        'mailtype' => 'html',
        'charset' => 'iso-8859-1',
        'wordwrap' => TRUE
        // 'smtp_crypto' => 'ssl'
        );
        $this->email->initialize($config);  
        $this->email->set_newline("\r\n");
        $this->email->from('info@koprasiwanitausahamandiri.com');
        $this->email->to($param); //email tujuan. Isikan dengan emailmu!
        $this->email->subject('Laundry online - Email Verifikasi');

        $ret_encript_email = $this->encryption->encrypt($param);
        $ret_encript_email = strtr(
            $ret_encript_email,
            array(
                '+' => '.',
                '=' => '-',
                '/' => '~'
            )
        );
        $this->email->message('
            <h3><center><b>YourDomain.com</b></center></h3><br>
            <p>
            Terimakasih sudah bergabung <a href="YourDomain.com">YourDomain.com</a><br>
            Kamu hampir selesai!!!
            <br>
            <a href="'.base_url().'Auth/Auth_Login/confirm/'.$ret_encript_email.'/'.$token.'" target="_blank">Klik disini untuk menyelesaikan registrasi</a>
            </p>
            <p>
            <br>
            Best Regards<br><br>

            <a href="towo.com">YourDomain.com</a>
            </p>
        ');
        if($this->email->send()){
            $data['success']=true;
        }
        else{
                $data['message']=show_error($this->email->print_debugger());
        }
        echo json_encode($data);
    }
    function confirm($email_encript,$token){
        // $email_encript = $this->get('ver');
        // $token = $this->get('map');
        $email_encript = strtr(
            $email_encript,
            array(
                '.' => '+',
                '-' => '=',
                '~' => '/'
            )
        );
        // $data = array('success' => false ,'message'=>array(),'saving' => false,'error'=>array(),'Verified'=>false);
        $Validate_token = $this->ModelsExecuteMaster->FindData(array('token'=>$token,'verified'=>0),'users');
        if($Validate_token->num_rows() > 0){
            $update_val = array(
                'verified'=>1
            );
            $update_where = array(
                'token' => $token,
                'email' => $this->encryption->decrypt($email_encript)
            );
            $update = $this->ModelsExecuteMaster->ExecUpdate($update_val,$update_where,'users');
            if($update){
                $dataroles = array(
                    "roleid" => 3,
                    "userid" => (int)$Validate_token->row()->id
                );
                // var_dump($dataroles);
                $rs_roles = $this->ModelsExecuteMaster->ExecInsert($dataroles,'userrole');
                // var_dump($rs_roles);
                if($rs_roles){
                    $data['success']='true';
                    $sess_data['confirmed']=true;
                    $this->session->set_userdata($sess_data);
                    // $data['Verified'] = true;
                }
                else{
                    $data['message']='E500-RU-IN';
                    // Error Role insert
                }
            }
            else{
                $data['message']='E500-VER-UP';
                // Error Verify update
            }
        }
        else{
            if($Validate_token->num_rows() == 0){
                $data['message']='E500-ALR';
            }
            else {
                $Validate_token = $this->Registration->get_user_using_token($token);
                if($Validate_token->num_rows() <= 0){
                    $data['message']='E500-TOK';
                }
            }
        }
        // echo json_encode($data);
        // $this->load->view('Id-home',$data);
        redirect(base_url('Id'));
    }

    function Pro_Login(){
        $logedinat = date("Y-m-d H:i:s");
        $data = array('success' => false ,'message'=>array());
        $usr = $this->input->post('account');
        $pwd =$this->input->post('secreet');

        $userold = $this->input->post('anonimuser');

        // var_dump($pwd);
        if ($this->agent->is_browser()){
            $agent = $this->agent->browser().' '.$this->agent->version();
        }elseif ($this->agent->is_mobile()){
            $agent = $this->agent->mobile();
        }else{
            $agent = 'Data user gagal di dapatkan';
        }

        $Validate_username = $this->ModelsExecuteMaster->FindData(array('email'=>$usr,'verified' => 1),'users');
        if($Validate_username->num_rows()>0){
            $userid = $Validate_username->row()->id;
            $pass_valid = $this->encryption->decrypt($Validate_username->row()->password);
            // var_dump($pwd.'-'.$pass_valid)
            if($pass_valid == $pwd){
                $sess_data['userid']=$userid;
                $data_ins= array(
                    'userid'=>$userid,
                    'logedinat'=>$logedinat,
                    'ip'=> $this->input->ip_address(),
                    'os'=>'',
                    'browser'=>$agent
                );
                $rs = $this->ModelsExecuteMaster->ExecInsert($data_ins,'userlogin_log');
                $this->session->set_userdata($sess_data);

                $cekexist = $this->ModelsExecuteMaster->FindData(array('userid'=>$userold,'statuscart'=>1),'carttable');

                if ($cekexist->num_rows() > 0) {
                    try {
                        $dataupdate = array(
                            'userid'    => $userid
                        
                        );

                        $exec = $this->ModelsExecuteMaster->ExecUpdate($dataupdate,array('userid'=>$userold,'statuscart'=>1),'carttable');
                        if ($exec) {
                            $data['success']=true;
                        }
                    } catch (Exception $e) {
                        $InsertData = array(
                            'errorcode'     => '500-01',
                            'errordesc'     => 'Server Error',
                            'stacktrace'    => 'Auth_Login line 234',
                        );
                        $exec = $this->ModelsExecuteMaster->ExecInsert($InsertData,'errorlog');
                        $data['message'] = '500-01'.' '.$e->getMessage();
                    }
                }

                // $data['success']=true;
                // redirect('Id');
            }
            else{
                $data['message']='L01';
                // user or password not match
            }
        }
        else{
            $data['message']='L02';
            // Username Unavailable or doesn't verification
        }


        echo json_encode($data);
    }

    function cek_mail(){
        $data = array('success' => false ,'message'=>array());
        $email = $this->input->post('email');
        $Cek_Already = $this->ModelsExecuteMaster->FindData(array('email'=>$email),'users');
        if($Cek_Already->num_rows() > 0){
            $data['message']='Email Sudah Terdaftar';
        }
        else{
            $data = array('success' => true ,'message'=>'true');
        }
        echo json_encode($data);
    }
    function cek_UID(){
        $data = array('success' => false ,'message'=>array());
        $user = $this->input->post('user');
        $Cek_Already = $this->ModelsExecuteMaster->FindData(array('username'=>$user),'users');
        if($Cek_Already->num_rows() > 0){
            $data['message']='UserName Sudah Terdaftar';
        }
        else{
            $data = array('success' => true ,'message'=>'true');
        }
        echo json_encode($data);
    }
	function logout()
	{
		delete_cookie('ci_session');
        $this->session->sess_destroy();
        redirect('Id');
	}
}