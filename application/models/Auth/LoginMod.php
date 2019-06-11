<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginMod extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function Validate_username($username)
    {
        $this->db->where('username',$username);
        return $this->db->get('users');
    }
    function Validate_Login($username,$Password)
    {
        $this->db->where('id',$username);
        $this->db->where('password',$Password);
        return $this->db->get('users');
    }
}
