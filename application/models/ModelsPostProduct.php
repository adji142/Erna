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
	function GetPost($field,$order,$rowperpage, $rowno)
	{
		$x = 0;
		$data = "
			SELECT @i:=@i+1 idpost,a.*,(SELECT image FROM imagetable b WHERE b.postid = a.id ORDER BY b.id LIMIT 1) imagemain,
			CASE WHEN a.promomember = 1 THEN (SELECT MAX(x.benefitdiscount) FROM mastersettingmember x) ELSE 0 END DISC
			FROM post_product a,(SELECT @i:=0) bla
			WHERE a.tglpasif is null
			ORDER BY $field $order
			LIMIT $rowno,$rowperpage
			;
		";
		// $this->db->order_by($order);
		return $this->db->query($data);
	}
	function GetPostNextLoad($last)
	{
		$data = "
		SELECT X.* FROM (
			SELECT @i:=@i+1 idpost,a.*,(SELECT image FROM imagetable b WHERE b.postid = a.id ORDER BY b.id LIMIT 1) imagemain,
			CASE WHEN a.promomember = 1 THEN (SELECT MAX(x.benefitdiscount) FROM mastersettingmember x) ELSE 0 END DISC
			FROM post_product a,(SELECT @i:=0) bla
			WHERE a.tglpasif is null 
		)X WHERE X.id < $last ORDER BY X.id LIMIT 3
		";
		// $this->db->order_by($order);
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
	function GetPromoMember($type)
	{
		if ($type == 'max') {
			$this->db->select_max('benefitdiscount');
			return $this->db->get('mastersettingmember');
		}
	}
}