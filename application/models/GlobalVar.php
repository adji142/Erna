<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class GlobalVar extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}
	function UserInfo($user_id){
        $data = "
            SELECT a.id,a.username,b.image FROM users a
            left join userimage b on a.id = b.userid
            where a.id = $user_id
        ";
        return $this->db->query($data);
    }
}