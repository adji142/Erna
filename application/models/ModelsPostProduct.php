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
	function GetPost($field,$order,$rowperpage, $rowno,$cat)
	{
		$x = 0;
		$data = "
			SELECT @i:=@i+1 idpost,a.*,(SELECT image FROM imagetable b WHERE b.postid = a.id ORDER BY b.id LIMIT 1) imagemain,
			CASE WHEN a.promomember = 1 THEN (SELECT MAX(x.benefitdiscount) FROM mastersettingmember x) ELSE 0 END DISC
			FROM post_product a,(SELECT @i:=0) bla
			WHERE a.tglpasif is null 
		";
		// var_dump(substr($cat, 0,2));
		if($cat != ''){
			if (substr($cat, 0,2) == "MC") {
				$parent = substr($cat, 2,1000);
				$data .= " AND a.categories IN (select id From categories where parent = $parent)";
			}
			elseif (substr($cat, 0,2) == "SC") {
				$like = substr($cat, 2,100000);
				$data .= " AND a.tittle like '%$like%'";
			}
			else{
				$data .= " AND a.categories = $cat ";
			}
		}
		$data .= "ORDER BY $field $order LIMIT $rowno,$rowperpage;";
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
	function getCart($user)
	{
		$data = "SELECT a.*,(SELECT image FROM imagetable WHERE postid = a.postid ORDER BY id LIMIT 1) image,b.tittle,b.id post_id,b.price,c.beratperpcs FROM carttable a
			LEFT JOIN post_product b on a.postid = b.id
			LEFT JOIN masterstok c on b.stockid = c.id
			where a.userid = '$user' AND a.statuscart =1;
		";
		return $this->db->query($data);
	}
	function GetSubtotal($user)
	{
		$data = "SELECT SUM(a.pricenet*a.qtyorder) pricenet,SUM(a.qtyorder*b.price) grosprice FROM carttable a
		LEFT JOIN post_product b on a.postid = b.id
		where a.userid = '$user' and a.statuscart = 1";
		return $this->db->query($data);
	}
	function getberat($user)
	{
		$data = "SELECT SUM(c.beratperpcs*a.qtyorder) Weight FROM carttable a
			LEFT JOIN post_product b on a.postid = b.id
			LEFT JOIN masterstok c on b.stockid = c.id
			where a.userid = '$user' AND a.statuscart =1;
		";
		return $this->db->query($data);
	}
	function GetMemberInfo($user)
	{
		$data = "SELECT 
					b.namamember,COALESCE(b.email,a.email) Email,COALESCE(b.notlp,a.phone) Phone,
					COALESCE(b.Alamat,'Alamat *') Alamat
				FROM users a
				LEFT JOIN mastermember b on b.userid = a.Id 
				WHERE a.id = '$user'
				";
		return $this->db->query($data);
	}
	function cekMember_Count()
	{
		$this->db->where('tglpasif',null);
		$this->db->order_by('minimumspend','DESC');
		return $this->db->get('mastersettingmember');

	}
}