<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ProfulePage extends CI_Controller
{
    function __construct(Type $var = null)
    {
        parent::__construct();
    }
    function changeProfilePicture(){
        $data = array('success' => false ,'message'=>array(),'saving' => false,'error'=>array());
        $dataURL=$this->input->post('selectedFile');
        
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 100;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;
        
        $this->load->library('upload', $config);
        var_dump($this->upload->data());
        
        $dataURL = str_replace('data:image/png;base64,', '', $dataURL);
        $dataURL = str_replace(' ', '+', $dataURL);
        $image = base64_decode($dataURL);
        
    }
}
