<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class ModelsPostProduct extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}
	function GetPost($order)
	{
		$data = "
			SELECT a.*,(SELECT image FROM imagetable b WHERE b.postid = a.id ORDER BY b.id LIMIT 1) imagemain FROM post_product a
			WHERE a.tglpasif is null
		";
		$this->db->order_by($order);
		return $this->db->query($data);
	}
	function GetPostWhere($field,$value)
	{
		$data = "
			SELECT a.*,(SELECT image FROM imagetable b WHERE b.postid = a.id ORDER BY b.id LIMIT 1) imagemain FROM post_product a
			where a.tglpasif is null and $field = $value
		";
		// $this->db->where($where);
		return $this->db->query($data);
	}
}