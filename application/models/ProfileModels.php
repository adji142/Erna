<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class ProfileModels extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}
	function SumOrder($ORDRID)
	{
		$data = "SELECT SUM(qtyorder) Qty,SUM(gros) gros,SUM(discount) discount,SUM(ongkir) ongkir,SUM(gros+discount+ongkir) TOTAL FROM deliveryorderdetail where headerid = $ORDRID";
		return $this->db->query($data);
	}
}