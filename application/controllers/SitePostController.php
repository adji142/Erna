<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class SitePostController extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('GlobalVar');
		$this->load->model('ModelsExecuteMaster');
		$this->load->model('ModelsPostProduct');
	}
	function GetPost()
	{
		$data = array('success' => false ,'message'=>array(),'data' =>array());

		$field = '';
		$order = '';

		$order = $this->input->post('order');

		if($order == ''){
			$field = 'a.id';
			$order = 'DeSC';
			// $sort = array('tglaktif','desc');
		}
		if ($order == '2') {
			$field = 'a.price - ((CASE WHEN a.promomember = 1 THEN (SELECT MAX(x.benefitdiscount) FROM mastersettingmember x) ELSE 0 END/100)*a.price)';
			$order = 'asc';
			// $sort = array('price','asc');
		}
		if ($order == '3') {
			$field = 'a.price - ((CASE WHEN a.promomember = 1 THEN (SELECT MAX(x.benefitdiscount) FROM mastersettingmember x) ELSE 0 END/100)*a.price)';
			$order = 'desc';
			// $sort = array('price','desc');
		}
		if ($order == '4') {
			$field = 'tglaktif';
			$order = 'desc';
			// $sort = array('tglaktif','desc');
		}
		$perPage = 1;

		$GetPost = $this->ModelsPostProduct->GetPost($field,$order);
		if($GetPost->num_rows()>0){
			$data['success'] = true;
			$data['data'] =$GetPost->result();
		}
		else{
			$InsertData = array(
				'errorcode'		=> '404-01',
				'errordesc'		=> 'Server Error',
				'stacktrace'	=> 'SitePostController line 30',
			);
			$exec = $this->ModelsExecuteMaster->ExecInsert($InsertData,'errorlog');
			$data['message'] = '404-01';
		}
		echo json_encode($data);
	}

	function GetPost_nextStep()
	{
		$data = array('success' => false ,'message'=>array(),'data' =>array());

		$field = '';
		$order = '';

		$lastid = $this->input->post('lastid');

		$GetPost = $this->ModelsPostProduct->GetPostNextLoad($lastid);
		if($GetPost->num_rows()>0){
			$data['success'] = true;
			$data['data'] =$GetPost->result();
		}
		else{
			$InsertData = array(
				'errorcode'		=> '404-01',
				'errordesc'		=> 'Server Error',
				'stacktrace'	=> 'SitePostController line 83',
			);
			$exec = $this->ModelsExecuteMaster->ExecInsert($InsertData,'errorlog');
			$data['message'] = '404-01';
		}
		echo json_encode($data);
	}

	function GetImagePost()
	{
		$data = array('success' => false ,'message'=>array(),'data' =>array());

		$id = $this->input->post('postid');

		$GetImg = $this->ModelsExecuteMaster->FindData(array('postid'=>$id),'imagetable');
		if($GetImg->num_rows()>0){
			$data['success'] = true;
			$data['data'] =$GetImg->result();
		}
		else{
			$InsertData = array(
				'errorcode'		=> '404-01',
				'errordesc'		=> 'Server Error',
				'stacktrace'	=> 'SitePostController line 60',
			);
			$exec = $this->ModelsExecuteMaster->ExecInsert($InsertData,'errorlog');
			$data['message'] = '404-01';
		}
		echo json_encode($data);
	}

	function GetPostbyID()
	{
		$data = array('success' => false ,'message'=>array(),'data' =>array());

		$id = $this->input->post('postid');

		$GetPost = $this->ModelsPostProduct->GetPostWhere('id',$id);
		if($GetPost->num_rows()>0){
			$data['success'] = true;
			$data['data'] =$GetPost->result();
		}
		else{
			$InsertData = array(
				'errorcode'		=> '404-01',
				'errordesc'		=> 'Server Error',
				'stacktrace'	=> 'SitePostController line 84',
			);
			$exec = $this->ModelsExecuteMaster->ExecInsert($InsertData,'errorlog');
			$data['message'] = '404-01';
		}
		echo json_encode($data);
	}

	function GetPromo()
	{
		$data = array('success' => false ,'message'=>array(),'data' =>array());


		$GetPost = $this->ModelsPostProduct->GetPromoMember('max');
		if($GetPost->num_rows()>0){
			$data['success'] = true;
			$data['data'] =$GetPost->result();
		}
		else{
			$InsertData = array(
				'errorcode'		=> '404-01',
				'errordesc'		=> 'Server Error',
				'stacktrace'	=> 'SitePostController line 105',
			);
			$exec = $this->ModelsExecuteMaster->ExecInsert($InsertData,'errorlog');
			$data['message'] = '404-01';
		}
		echo json_encode($data);
	}
	function loadRecord()
	{
		$rowno=0;
		$order='';
		$cat='';

		$rowno = $this->input->post('pagno');
		$order = $this->input->post('sort');
		$cat = $this->input->post('cat');
		$rowperpage = 12;
 		$field = '';
		$order = $order;

		// $order = $this->input->post('order');

		if($order == ''){
			$field = 'a.id';
			$order = 'DeSC';
			// $sort = array('tglaktif','desc');
		}
		if ($order == '2') {
			$field = 'a.price - ((CASE WHEN a.promomember = 1 THEN (SELECT MAX(x.benefitdiscount) FROM mastersettingmember x) ELSE 0 END/100)*a.price)';
			$order = 'asc';
			// $sort = array('price','asc');
		}
		if ($order == '3') {
			$field = 'a.price - ((CASE WHEN a.promomember = 1 THEN (SELECT MAX(x.benefitdiscount) FROM mastersettingmember x) ELSE 0 END/100)*a.price)';
			$order = 'desc';
			// $sort = array('price','desc');
		}
		if ($order == '4') {
			$field = 'tglaktif';
			$order = 'desc';
			// $sort = array('tglaktif','desc');
		}

        if($rowno != 0){
          $rowno = ($rowno-1) * $rowperpage;
        }

        if($cat == ''){
	        $allcount = $this->db->where('tglpasif',null)->from("post_product")->count_all_results();
	    }
	    else{
	    	$allcount = $this->db->where(array('tglpasif'=>null,'categories'=>$cat))->from("post_product")->count_all_results();	
	    }
        // var_dump($allcount);
        // $this->db->limit($rowperpage, $rowno);
	    if($cat == ''){
	        $users_record = $this->ModelsPostProduct->GetPost($field,$order,$rowperpage, $rowno,'')->result_array();
	    }
	    else{
	    	$users_record = $this->ModelsPostProduct->GetPost($field,$order,$rowperpage, $rowno,$cat)->result_array();	
	    }
        // var_dump($users_record);

        $config['base_url'] = base_url().'SitePostController/loadRecord';
        $config['use_page_numbers'] = TRUE;
        $config['total_rows'] = $allcount;
        $config['per_page'] = $rowperpage;

        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tag_close']  = '<span aria-hidden="true"></span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tag_close']  = '</span></li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tag_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tag_close']  = '</span></li>';

        $this->pagination->initialize($config);
 
        $data['pagination'] = $this->pagination->create_links();
        $data['result'] = $users_record;
        $data['row'] = $rowno;
 
        echo json_encode($data);
	}

	function CartSave()
	{
		$data = array('success' => false ,'message'=>array());

		$id_post = $this->input->post('id_post');
		$fixid = $this->input->post('fixid');

		$find_post = $this->ModelsExecuteMaster->FindData(array('id'=>$id_post),'post_product')->row();

		$data = array(
			'postid'	=> $id_post,
			'tglorder'	=> date("Y-m-d H:i:s"),
			'qtyorder'	=> 1,
			'userid'	=> $fixid,
			'statuscart'=> 1,
			'idsetingmember' => 0,
			'pricenet' => $find_post->price,
		);

		try {
			$exec = $this->ModelsExecuteMaster->ExecInsert($data,'carttable');	
			if($exec){
				$data['success'] = true;
			}
		} catch (Exception $e) {
			$InsertData = array(
				'errorcode'		=> '500-01',
				'errordesc'		=> 'Server Error',
				'stacktrace'	=> 'SitePostController line 269',
			);
			$exec = $this->ModelsExecuteMaster->ExecInsert($InsertData,'errorlog');
			$data['message'] = '500-01'.' '.$e->getMessage();
		}
		echo json_encode($data);
	}

	function CartPopulate()
	{
		$data = array('success' => false ,'message'=>array(),'data'=>array(),'count'=>0,'sum'=>0);

		$userid = $this->input->post('userid');

		try {
			$exec = $this->ModelsPostProduct->getCart($userid);	
			if($exec->num_rows() > 0){
				$data['success'] = true;
				$data['data'] = $exec->result();
				$data['count'] = $this->db->where(array('userid'=>$userid,'statuscart'=>1))->from("carttable")->count_all_results();
				// var_dump($this->ModelsExecuteMaster->SelectSum(array('userid'=>$userid,'statuscart'=>1),'carttable','pricenet')->row());
				// var_dump( $this->ModelsPostProduct->GetSubtotal($userid));

				$data['sum'] = $this->ModelsPostProduct->GetSubtotal($userid)->row()->pricenet;
			}
		} catch (Exception $e) {
			$InsertData = array(
				'errorcode'		=> '500-01',
				'errordesc'		=> 'Server Error',
				'stacktrace'	=> 'SitePostController line 269',
			);
			$exec = $this->ModelsExecuteMaster->ExecInsert($InsertData,'errorlog');
			$data['message'] = '500-01'.' '.$e->getMessage();
		}
		echo json_encode($data);
	}
	function Rem_Cart()
	{
		$data = array('success' => false ,'message'=>array());

		$id = $this->input->post('id');

		try {
			$exec = $this->ModelsExecuteMaster->ExecUpdate(array('statuscart'=>0),array('id'=>$id),'carttable');
			if ($exec) {
				$data['success'] =true;
			}
		} catch (Exception $e) {
			$InsertData = array(
				'errorcode'		=> '500-01',
				'errordesc'		=> 'Server Error',
				'stacktrace'	=> 'SitePostController line 316',
			);
			$exec = $this->ModelsExecuteMaster->ExecInsert($InsertData,'errorlog');
			$data['message'] = '500-01'.' '.$e->getMessage();
		}
		echo json_encode($data);
	}
	function GetMemberPromo()
	{
		$data = array('success' => false ,'message'=>array(),'data'=>array());
		$find_memberdisc = $this->ModelsExecuteMaster->FindData(array('tglpasif'=>null),'mastersettingmember');

		if ($find_memberdisc->num_rows() > 0) {
			$data['success'] = true;
			$data['data'] = $find_memberdisc->result();
		}

		echo json_encode($data);
	}
	function Update_Price()
	{
		$data = array('success' => false ,'message'=>array());

		// $global_User = $this->input->post('global_User');
		// $postid = $this->input->post('postid');
		// $memberid = $this->input->post('memberid');
		// $cartid = $this->input->post('cartid');
		$Qty = $this->input->post('Qty');
		$cartid = $this->input->post('cartid');
		// global var
		$discount = 0;
		$harganormal = 0;
		$minspen = 0;
		$net = 0;
		$postid = 0;
		$memberid = 0;
		// get discount
		$find_memberdisc = $this->ModelsExecuteMaster->FindData(array('tglpasif'=>null),'mastersettingmember');
		if($find_memberdisc->num_rows() >0){
			foreach ($find_memberdisc->result() as $key) {
				if ($Qty >= $key->minimumspend) {
					$discount = $key->benefitdiscount;
					$memberid = $key->id;
				}
			}
		}

		// get post

		$getpostid = $this->ModelsExecuteMaster->FindData(array('id'=>$cartid),'carttable');

		if ($getpostid->num_rows() > 0) {
			$postid = $getpostid->row()->postid;
		}
		// Get price

		$GetNormalPrice = $this->ModelsExecuteMaster->FindData(array('id'=>$postid),'post_product');
		if($GetNormalPrice->num_rows() > 0){
			$harganormal = $GetNormalPrice->row()->price;
			$net = $harganormal;
		}

		// perhitungan discount

		if ($discount >0) {
			$net = $harganormal - (($discount/100)*$harganormal);
		}
		else{
			$data['message'] = 'Member Setting Not Found';
		}

		// proses update
		// var_dump($discount);
		try {
			$dataupdate = array(
				'qtyorder'	=> $Qty,
				'pricenet'	=> $net,
				'idsetingmember' => $memberid
			);
			$exec = $this->ModelsExecuteMaster->ExecUpdate($dataupdate,array('id'=>$cartid),'carttable');
			if ($exec) {
				$data['success']=true;
			}
		} catch (Exception $e) {
			$data['message'] = 'Error Exception '.$e.getMessage();
		}

		echo json_encode($data);
	}
	function cekuser()
	{
		$data = array('success' => false ,'message'=>array());

		$userold = $this->input->post('userold');
		$usernew = $this->input->post('usernew');

		$cekexist = $this->ModelsExecuteMaster->FindData(array('userid'=>$userold,'statuscart'=>1),'carttable');

		var_dump($cekexist->result());
		if ($cekexist->num_rows() > 0) {
			try {
				$dataupdate = array(
					'userid'	=> $usernew
				);
				$exec = $this->ModelsExecuteMaster->ExecUpdate($dataupdate,array('userid'=>$userold,'statuscart'=>1),'carttable');
				if ($exec) {
					$data['success']=true;
				}
			} catch (Exception $e) {
				$InsertData = array(
					'errorcode'		=> '500-01',
					'errordesc'		=> 'Server Error',
					'stacktrace'	=> 'SitePostController line 316',
				);
				$exec = $this->ModelsExecuteMaster->ExecInsert($InsertData,'errorlog');
				$data['message'] = '500-01'.' '.$e->getMessage();
			}
		}
		echo json_encode($data);
	}
	public function ShowSingle($id)
	{

		$cekexist = $this->ModelsExecuteMaster->FindData(array('id'=>$id),'post_product');

		if ($cekexist) {
			$data['single'] = $cekexist->result();

			$getimage = $this->ModelsExecuteMaster->FindData(array('postid'=>$id),'imagetable');
			if ($getimage) {
				// $data['image'] = $getimage->result();

				foreach ($getimage->result() as $key) {
					// try {
					// 	$this->ModelsExecuteMaster->ExecUpdate(array('name_l'=>$filenameL),array('id'=>$key->id),'imagetable');	
					// } catch (Exception $e) {
					// 	$InsertData = array(
					// 		'errorcode'		=> '500-01',
					// 		'errordesc'		=> 'Server Error',
					// 		'stacktrace'	=> $e->getMessage().'SitePostController line 466',
					// 	);
					// 	$exec = $this->ModelsExecuteMaster->ExecInsert($InsertData,'errorlog');
					// }
					// M
					// $filenameM = base_url('public/img_post/M/');
					// $filenameM .= 'M'.uniqid('intrinsic_').'.png';
					// $file = fopen($filenameM, 'rb');
					//   $newIamge = resize_image($im, 900, 1024);

					//   fwrite($file, $newIamge);
					//   fclose($file);
					//   return $filenameM;
					// try {
					// 	$this->ModelsExecuteMaster->ExecUpdate(array('name_m'=>$filenameM),array('id'=>$key->id),'imagetable');	
					// } catch (Exception $e) {
					// 	$InsertData = array(
					// 		'errorcode'		=> '500-01',
					// 		'errordesc'		=> 'Server Error',
					// 		'stacktrace'	=> $e->getMessage().'SitePostController line 466',
					// 	);
					// 	$exec = $this->ModelsExecuteMaster->ExecInsert($InsertData,'errorlog');
					// }
					// T

					// $filenameT = base_url('public/img_post/T/');
					// $filenameT .= 'T'.uniqid('intrinsic_').'.png';
					// $file = fopen($filenameT, 'rb');
					//   $newIamge = resize_image($im, 900, 1024);

					//   fwrite($file, $newIamge);
					//   fclose($file);
					//   return $filenameT;
					// try {
					// 	$this->ModelsExecuteMaster->ExecUpdate(array('name_t'=>$filenameT),array('id'=>$key->id),'imagetable');	
					// } catch (Exception $e) {
					// 	$InsertData = array(
					// 		'errorcode'		=> '500-01',
					// 		'errordesc'		=> 'Server Error',
					// 		'stacktrace'	=> $e->getMessage().'SitePostController line 466',
					// 	);
					// 	$exec = $this->ModelsExecuteMaster->ExecInsert($InsertData,'errorlog');
					// }
				}
			}
		}

		$this->load->view('Postsingle',$data);
	}
	public function resize_image($file, $w, $h, $crop=FALSE) {
	  //list($width, $height) = getimagesize($file);
	  $src = imagecreatefromstring(base64_decode($file));
	  if (!$src) return false;
	  $width = imagesx($src);
	  $height = imagesy($src);

	  $r = $width / $height;
	  if ($crop) {
	      if ($width > $height) {
	        $width = ceil($width-($width*abs($r-$w/$h)));
	      } else {
	        $height = ceil($height-($height*abs($r-$w/$h)));
	      }
	      $newwidth = $w;
	      $newheight = $h;
	  } else {
	      if ($w/$h > $r) {
	        $newwidth = $h*$r;
	        $newheight = $h;
	      } else {
	        $newheight = $w/$r;
	        $newwidth = $w;
	      }
	  }
	  //$src = imagecreatefrompng($file);
	  $dst = imagecreatetruecolor($newwidth, $newheight);
	  imagecopyresampled($dst, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);

	  // Buffering
	ob_start();
	imagepng($dst);
	$data = ob_get_contents();
	ob_end_clean();
	  return $data;
	}

	function GetInfoAddr()
	{
		$data = array('success' => false ,'message'=>array(),'data'=>array());

		$tipe = $this->input->post('link');
		$idaddr = $this->input->post('idaddr');

		if ($tipe == 'prov') {
			$curl = curl_init();

			curl_setopt_array($curl, array(
			  CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => "",
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 30,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => "GET",
			  CURLOPT_HTTPHEADER => array(
			    "key: 66f09fcb700162bd339a522699dd8215"
			  ),
			));

			$response = curl_exec($curl);
			$err = curl_error($curl);

			curl_close($curl);

			if ($err) {
			  echo "cURL Error #:" . $err;
			} else {
				$result = json_decode($response, true);
			  	if ($result['rajaongkir']['status']['code'] == 200){
			  		$data['success'] = true;
			  		$data['data'] = $result['rajaongkir']['results'];
			  	}
			}
		}
		if ($tipe == 'kota_RO') {
			$curl = curl_init();

			curl_setopt_array($curl, array(
			  CURLOPT_URL => "https://api.rajaongkir.com/starter/city",
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => "",
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 30,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => "GET",
			  CURLOPT_HTTPHEADER => array(
			    "key: 66f09fcb700162bd339a522699dd8215"
			  ),
			));

			$response = curl_exec($curl);
			$err = curl_error($curl);

			curl_close($curl);

			if ($err) {
			  echo "cURL Error #:" . $err;
			} else {
			  $result = json_decode($response, true);
			  	if ($result['rajaongkir']['status']['code'] == 200){
			  		$data['success'] = true;
			  		$data['data'] = $result['rajaongkir']['results'];
			  	}
			}
		}
		if ($tipe == 'kota') {
			$kota = $this->ModelsExecuteMaster->FindData(array('province_id'=>$idaddr),'regencies');
			$data['success'] = true;
			$data['data'] = $kota->result();
		}
		if ($tipe == 'kec') {
			$kota = $this->ModelsExecuteMaster->FindData(array('regency_id'=>$idaddr),'districts');
			$data['success'] = true;
			$data['data'] = $kota->result();
		}
		if ($tipe == 'kel') {
			$kota = $this->ModelsExecuteMaster->FindData(array('district_id'=>$idaddr),'villages');
			$data['success'] = true;
			$data['data'] = $kota->result();
		}
		echo json_encode($data);
	}
	function SaveInfo()
	{
		$data = array('success' => false ,'message'=>array());

		$id = $this->input->post('id');
		$prov = $this->input->post('prov');
		$tipe = $this->input->post('tipe');

		$city_id = $this->input->post('city_id');
		$city_name = $this->input->post('city_name');
		$type = $this->input->post('type');
		$postal_code = $this->input->post('postal_code');

		if ($tipe == 'prov') {
			$InsertData = array(
				'id'		=> $id,
				'nama'		=> $prov,
			);
			$exec = $this->ModelsExecuteMaster->ExecInsert($InsertData,'provrajaongkir');
		}
		if ($tipe == 'kota') {
			$InsertData = array(
				'city_id'		=> $city_id,
				'city_name'		=> $city_name,
				'type'		=> $type,
				'postal_code'		=> $postal_code,
			);
			$exec = $this->ModelsExecuteMaster->ExecInsert($InsertData,'kotarajaongkir');
		}
		echo json_encode($data);
	}
	function cekongkir()
	{
		$data = array('success' => false ,'message'=>array(),'origin_det'=>array(),'dest_det'=>array(),'data'=>array());

		$cekongkir_provinsi = $this->input->post('cekongkir_provinsi');
		$destination = $this->input->post('cekongkir_kota');
		$xpdc = $this->input->post('xpdc');
		$user_id = $this->session->userdata('userid');

		// get berat
		$berat = $this->ModelsPostProduct->getberat($user_id)->row()->Weight;
		// var_dump(ROUND($berat);
		$curl = curl_init();
		curl_setopt_array($curl, array(
		  CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "POST",
		  CURLOPT_POSTFIELDS => "origin=445&destination=".$destination."&weight=".$berat."&courier=".$xpdc,
		  CURLOPT_HTTPHEADER => array(
		    "content-type: application/x-www-form-urlencoded",
		    "key: 66f09fcb700162bd339a522699dd8215"
		  ),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
		  echo "cURL Error #:" . $err;
		} else {
			$result = json_decode($response, true);
		  if ($result['rajaongkir']['status']['code'] == 200){
		  	$data['success'] = true;
		  	$data['data'] = $result['rajaongkir']['results'];
		  	$data['origin_det'] = $result['rajaongkir']['origin_details'];
		  	$data['dest_det'] = $result['rajaongkir']['destination_details'];
		  }
		  else{
		  	$data['message'] = $result['rajaongkir']['results'];
		  }
		}
		echo json_encode($data);
	}
	function PlaceOrder()
	{
		$data = array('success' => false ,'message'=>array());
		// Declaring variable
		$penerima = $this->input->post('penerima');
		$email = $this->input->post('email');
		$phone = $this->input->post('phone');
		$alamat = $this->input->post('alamat');
		$fixprovinsi = $this->input->post('fixprovinsi');
		$fixkota = $this->input->post('fixkota');
		$kecamatan = $this->input->post('kecamatan');
		$Kelurahan = $this->input->post('Kelurahan');
		$postcode = $this->input->post('postcode');
		$xpdc = $this->input->post('xpdc');
		$Service = $this->input->post('Service');
		$otherremarks = $this->input->post('otherremarks');
		$user_id = $this->session->userdata('userid');
		$notrx = date('Y')."".date('m')."".date('d')."".rand();
		$fixservice = $this->input->post('fixservice');
		$fixcost = $this->input->post('fixcost');
		$idsetingmember = '';
		$memberid = '';
		$headerid='';
		//public variable

// get last member status from cart
		$this->db->select_max('idsetingmember');
		$this->db->where('userid',$user_id);
		$this->db->where('statuscart',1);
		$getmemberid = $this->db->get('carttable')->row();

		$idsetingmember = $getmemberid->idsetingmember;
//end get last member status from cart

// get jumlah member registerd
		$jml_Member = $this->ModelsExecuteMaster->FindData(array('kotakab'=>$fixkota,'verifymember'=>1,'jenismemberid'=>$idsetingmember),'mastermember');
		$quota = $this->ModelsExecuteMaster->FindData(array('id'=>$idsetingmember),'mastersettingmember');

		if ($jml_Member->num_rows() < $quota->row()->quota) {
			$cekexist = $this->ModelsExecuteMaster->FindData(array('userid'=>$user_id),'mastermember');
			if ($cekexist->num_rows() == 0) {
				$datamember = array(
					'userid'		=> $user_id,
					'jenismemberid'	=> $idsetingmember,
					'namamember'	=> $penerima,
					'email'			=> $email,
					'notlp'			=> $phone,
					'Alamat'		=> $alamat,
					'propinsi'		=> $fixprovinsi,
					'kotakab'		=> $fixkota,
					'kelurahan'		=> $Kelurahan,
					'kecamatan'		=> $kecamatan,
					'nopos'			=> $postcode,
					'verifymember'	=> 1,
					'membersince'	=> date("Y-m-d"),
				);
				$exec = $this->db->insert('mastermember',$datamember);
				$memberid = $this->db->insert_id();
			}
			else{
				$memberid = $cekexist->row()->Id;
			}
			$do = array(
				'memberid'		=> $memberid,
				'nomerorder'	=> $notrx,
				'tglorder'		=> date("Y-m-d"),
				'xpdc'			=> $xpdc,
				'service'		=> $fixservice,
				'statusorder'	=> 0,
			);
			$execdo = $this->db->insert('deliveryorder',$do);//$this->ModelsExecuteMaster->ExecInsert($do,'deliveryorder');
			$headerid = $this->db->insert_id();
			if ($execdo) {
				$post = $this->ModelsPostProduct->getCart($user_id)->result();
				foreach ($post as $cart) {
					$dod = array(
						'headerid'	=> $headerid,
						'postid'	=> $cart->postid,
						'qtyorder'	=> $cart->qtyorder,
						'gros'		=> $cart->price * $cart->qtyorder,
						'discount'	=> ($cart->price * $cart->qtyorder) - ($cart->pricenet * $cart->qtyorder),
						'ongkir'	=> $fixcost,
					);
					$execdod = $this->ModelsExecuteMaster->ExecInsert($dod,'deliveryorderdetail');
					if ($execdod) {
						$updatecart = $this->ModelsExecuteMaster->ExecUpdate(array('statuscart'=>0),array('id'=>$cart->id),'carttable');
						if ($updatecart) {
							$data['success'] = true;
						}
					}
				}
				// var_dump($dod);
			}
			else{
				$data['message'] = 'Gagal Menyimpan Order';
			}
		}
		else{
			$data['message'] = '701 - Quota Member '.$quota->row()->namagrade.' Sudah Penuh, sistem akan mengkalkulasi Ulang dengan Harga Member yang tersedia di bawah nya';
		}
//end get jumlah member registerd
		echo json_encode($data);
	}
	function Recalculation()
	{
		$data = array('success' => false ,'message'=>array());
		// Declaring variable
		$penerima = $this->input->post('penerima');
		$email = $this->input->post('email');
		$phone = $this->input->post('phone');
		$alamat = $this->input->post('alamat');
		$fixprovinsi = $this->input->post('fixprovinsi');
		$fixkota = $this->input->post('fixkota');
		$kecamatan = $this->input->post('kecamatan');
		$Kelurahan = $this->input->post('Kelurahan');
		$postcode = $this->input->post('postcode');
		$xpdc = $this->input->post('xpdc');
		$Service = $this->input->post('Service');
		$otherremarks = $this->input->post('otherremarks');
		$user_id = $this->session->userdata('userid');
		$notrx = date('Y')."".date('m')."".date('d')."".rand();
		$fixservice = $this->input->post('fixservice');
		$fixcost = $this->input->post('fixcost');
		$idsetingmember = '';
		$memberid = '';
		$headerid='';

		$query = "SELECT * FROM mastersettingmember ORder by benefitdiscount DESC";
		$excec = $this->db->query($query);
		$pricenet = 0;
		// var_dump($excec->result());
		foreach ($excec->result() as $key) {
			$quota = $this->ModelsExecuteMaster->FindData(array('id'=>$key->id),'mastersettingmember');
			$jml_Member = $this->ModelsExecuteMaster->FindData(array('kotakab'=>$fixkota,'verifymember'=>1,'jenismemberid'=>$key->id),'mastermember');
			if ($jml_Member->num_rows() < $key->quota) {
				// var_dump('expression masuk ke level bawah nya');
				$post = $this->ModelsPostProduct->getCart($user_id)->result();
				// updateing cart
				foreach ($post as $crt) {
					$data_upd = array(
						'pricenet'			=> $crt->price - ($crt->price * $key->benefitdiscount / 100),
						'idsetingmember'	=> $key->id,
					);
					$this->ModelsExecuteMaster->ExecUpdate($data_upd,array('id' => $crt->id),'carttable');
				}

				$cekexist = $this->ModelsExecuteMaster->FindData(array('userid'=>$user_id),'mastermember');
				if ($cekexist->num_rows() == 0) {
					$datamember = array(
						'userid'		=> $user_id,
						'jenismemberid'	=> $key->id,
						'namamember'	=> $penerima,
						'email'			=> $email,
						'notlp'			=> $phone,
						'Alamat'		=> $alamat,
						'propinsi'		=> $fixprovinsi,
						'kotakab'		=> $fixkota,
						'kelurahan'		=> $Kelurahan,
						'kecamatan'		=> $kecamatan,
						'nopos'			=> $postcode,
						'verifymember'	=> 1,
						'membersince'	=> date("Y-m-d"),
					);
					$exec = $this->db->insert('mastermember',$datamember);
					$memberid = $this->db->insert_id();
				}
				else{
					$memberid = $cekexist->row()->Id;
				}
				$do = array(
					'memberid'		=> $memberid,
					'nomerorder'	=> $notrx,
					'tglorder'		=> date("Y-m-d"),
					'xpdc'			=> $xpdc,
					'service'		=> $fixservice,
					'statusorder'	=> 0,
				);
				$execdo = $this->db->insert('deliveryorder',$do);//$this->ModelsExecuteMaster->ExecInsert($do,'deliveryorder');
				$headerid = $this->db->insert_id();
				if ($execdo) {
					$post = $this->ModelsPostProduct->getCart($user_id)->result();
					foreach ($post as $cart) {
						$dod = array(
							'headerid'	=> $headerid,
							'postid'	=> $cart->postid,
							'qtyorder'	=> $cart->qtyorder,
							'gros'		=> $cart->price * $cart->qtyorder,
							'discount'	=> ($cart->price * $cart->qtyorder) - ($cart->pricenet * $cart->qtyorder),
							'ongkir'	=> $fixcost,
						);
						$execdod = $this->ModelsExecuteMaster->ExecInsert($dod,'deliveryorderdetail');
						if ($execdod) {
							$updatecart = $this->ModelsExecuteMaster->ExecUpdate(array('statuscart'=>0),array('id'=>$cart->id),'carttable');
							if ($updatecart) {
								$data['success'] = true;
							}
						}
					}
					// var_dump($dod);
				}
				else{
					$data['message'] = 'Gagal Menyimpan Order';
				}
			}
		}
		echo json_encode($data);
	}
}