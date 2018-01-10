<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Eyemarket extends CI_Controller {

	public function __construct(){
        parent::__construct();
		    $this->load->model('Eyemarket_model');
		    date_default_timezone_set('Asia/Jakarta');
			$this->load->helper(array('form','url','text','date','my_helper'));
			$this->load->library('PHPMailer_Library');
			$this->load->library('session');

			$this->load->model('Master_model','mod');

			$this->id_member  = @$this->session->userdata('id_member');#id_member login 
			$this->username   = @$this->session->userdata('username');
			/*
				variabel userdata
			*/
			$this->data['id_member']   = $this->id_member;
			$this->data['myusername']  = $this->username;
    }

	public function index()
	{	
		$data['products']	= $this->Eyemarket_model->get_all_product();
		$data["body"] 		= $this->load->view('/eyemarket/new_view/index', $data, true);
		$data["kanal"] 		= 'eyemarket';
		
		$this->load->view('/template/static', $data);
	}

	public function detail($toko,$title_slug)
	{ 
		$id_product 			= $this->Eyemarket_model->get_id_product($title_slug);
		$data["product"] 		= $this->Eyemarket_model->get_product($id_product->id_product);
		$data["ex_product"] 	= $this->Eyemarket_model->get_product_lain($id_product->id_product);
		$created_date 		 	= "";
		$data['username'] 		= $this->session->userdata('username');
		$data['id_member'] 		= $this->session->userdata('id_member');

		foreach ($data["product"] as $produk)
		{
			$created_date 		= $produk['created_date'];
		}

		// $besok	 = date('Y-m-d',strtotime("+1 days"));

		// $date =  new DateTime($created_date);
		
		// $data["page"] 			= "home";
		$data["kanal"] 		= 'eyemarket';
		
		$data["body"] 		= $this->load->view('eyemarket/new_view/detail', $data, true);

		$this->load->view('/template/static', $data);
	}

	public function login_view()
	{
		$this->load->view('eyemarket/admin/login');
	}

	public function login_admin()
	{
		if($this->input->post('username') != FALSE)
		{
	      	$username 	= $this->input->post('username');
	      	$password 	= $this->input->post('password');

	      	$query 		= $this->db->query("select * from eyemarket_admin where username='".$username."' and password='".md5($password)."'");

	      	$row 		= $query->row_array();
	      	$id 		= $row['id'];
	      	$username 	= $row['username'];

	      	if($row['id']=="" && $row['password']=="")
	      	{
				// print_r($_POST);
				//  exit;
	      		redirect('/');  
	      	}
	      	else
	      	{
	      		$this->session->set_userdata('id',$id);
	      		$this->session->set_userdata('username',$username);

	      		// $data['id'] 		= $_SESSION['id'];
	      		// $data['username'] 	= $_SESSION['username'];
	      		// $data['content'] 	= "Selamat datang ".$_SESSION['username'];

	      		redirect('/eyemarket/admin');
	      		// $this->load->view('/eyemarket/admin',$data, TRUE);
	      	}  
      	}	
	}

	public function login()
	{
	      	$username 	= $this->input->post('username');
	      	$password 	= $this->input->post('password');

	      	$query 		= $this->db->query("select * from tbl_member where email='".$username."' and password='".md5($password)."'");

	      	$row 			= $query->row_array();
	      	$user_id 		= $row['id_member'];
	      	$email 		= $row['email'];
	      	$username 	= $row['name'];

	      	if($row['id_member']=="" && $row['password']=="")
	      	{
	      		redirect($_SERVER['HTTP_REFERER']); 
	      	}
	      	else
	      	{
	      		$this->session->set_userdata('id_member',$user_id);
	      		$this->session->set_userdata('email',$email);
	      		$this->session->set_userdata('username',$username);

	      		redirect($_SERVER['HTTP_REFERER']);
	      	}  
	}

	public function logout()
	{
		session_destroy();
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function admin()
	{
		$data["id_admin"] 	= $this->session->userdata('id') != NULL ? $this->session->userdata('id') : NULL;

		if ($data["id_admin"] != NULL)
		{
			$data["profile"] 	= $this->Eyemarket_model->get_admin($data["id_admin"]);

			foreach ($data["profile"] as $value)
			{
				$data['nama'] 		= $value['nama'];
				$data['username'] 	= $value['username'];
			}

			$data['content'] 	= "Selamat datang";
		}
		else
		{
			redirect('eyemarket/login_view');
		}

		$data["active"] 	= "dashboard";

		$this->load->view('/eyemarket/admin/template',$data);
	}

	public function crud_product()
	{
		$data["id_admin"] 	= $this->session->userdata('id') != NULL ? $this->session->userdata('id') : NULL;

		if ($data["id_admin"] != NULL)
		{
			$data["profile"] 	= $this->Eyemarket_model->get_admin($data["id_admin"]);

			foreach ($data["profile"] as $value)
			{
				$data['nama'] 		= $value['nama'];
				$data['username'] 	= $value['username'];
			}

			$data['product']	= $this->Eyemarket_model->get_all_product_admin();
			$data['kategori']	= $this->Eyemarket_model->get_all_kategori();
			$data['region']		= $this->Eyemarket_model->get_all_parent_kategori();
			$data['toko']		= $this->Eyemarket_model->get_all_toko();
			$data["content"] 	= $this->load->view('/eyemarket/product/crud',$data,TRUE);
		}
		else
		{
			redirect('eyemarket/login_view');
		}

		$data["active"] 	= "produk";
		
		$this->load->view('/eyemarket/admin/template', $data);
	}

	public function tambah_produk()
	{
		$id_admin 	= $_SESSION['id'];
		
		$input = array(
			'id_parent_cat' => $this->input->post('id_parent_cat'),
			'id_kategori' 	=> $this->input->post('id_kategori'),
			'id_toko' 		=> $this->input->post('id_toko'),
			'nama' 			=> $this->input->post('nama'),
			'title_slug' 	=> strtolower(str_replace(array(" ","+","&","'"), "-", $this->input->post('nama'))),
			'harga_sebelum' => $this->input->post('harga_sebelum'),
			'harga' 		=> $this->input->post('harga'),
			'diskon' 		=> $this->input->post('diskon'),
			'stok' 			=> $this->input->post('stok'),
			'berat' 		=> $this->input->post('berat'),
			'keterangan' 	=> $this->input->post('keterangan'),
			'ongkir' 		=> $this->input->post('ongkir'),
			'created_by' 	=> $id_admin,
			'created_date' 	=> date("Y-m-d H:i:s"),
		);

		$insert = $this->Eyemarket_model->tambah_produk($input);

		$data_size = array(
			'id_product' 	=> $insert,
			'S' 	=> $this->input->post('ukuranS'),
			'M' 	=> $this->input->post('ukuranM'),
			'L' 	=> $this->input->post('ukuranL'),
			'XL' 	=> $this->input->post('ukuranXL'),
			'XXL' 	=> $this->input->post('ukuranXXL'),
			'XXXL' 	=> $this->input->post('ukuranXXXL'),
		);

		$insert_size = $this->Eyemarket_model->tambah_size($data_size);

		$tbl_image = array(
			'id_product' 	=> $insert,
		);

		$inset_image = $this->Eyemarket_model->tambah_image($tbl_image);

		if ($insert && $insert_size)
		{
			redirect('/eyemarket/crud_product');
		}
		else
		{
			redirect('/eyemarket/crud_product');
		}

		
	}

	public function tambah_gambar($id)
	{ 	
    	$config['upload_path'] = './produk_image/';  
        $config['allowed_types'] = '*';

        $this->upload->initialize($config);

        if (!empty($this->input->post('img_hidden1')))
        {
        	if(!$this->upload->do_upload('image1')) 
        	{  
        	    echo $this->upload->display_errors();  
        	}  
        	else  
        	{
        	    $data 		= $this->upload->data();

        	    $object = array(
        			'image1' 		=> $data["file_name"],
        	    	);

        	    $insert = $this->Eyemarket_model->tambah_gambar($id,$object);

        	    if ($insert)
        	    {
        	    	echo '<img src="'.base_url().'img/eyemarket/produk/'.$data["file_name"].'" width="300" height="225" class="img-thumbnail" />';  
        	    }
        	    else
        	    {
        	    	echo 'gagal';
        	    }
        	}
        }
        else
        if (!empty($this->input->post('img_hidden2')))
        {
        	if(!$this->upload->do_upload('image2')) 
        	{  
        	    echo $this->upload->display_errors();  
        	}  
        	else  
        	{
        	    $data 		= $this->upload->data();

        	    $object = array(
        			'image2' 		=> $data["file_name"],
        	    	);

        	    $insert = $this->Eyemarket_model->tambah_gambar($id,$object);

        	    if ($insert)
        	    {
        	    	echo '<img src="'.base_url().'img/eyemarket/produk/'.$data["file_name"].'" width="300" height="225" class="img-thumbnail" />';  
        	    }
        	    else
        	    {
        	    	echo 'gagal';
        	    }
        	}
        }
        else
        if (!empty($this->input->post('img_hidden3')))
        {
        	if(!$this->upload->do_upload('image3')) 
        	{  
        	    echo $this->upload->display_errors();  
        	}  
        	else  
        	{
        	    $data 		= $this->upload->data();

        	    $object = array(
        			'image3' 		=> $data["file_name"],
        	    	);

        	    $insert = $this->Eyemarket_model->tambah_gambar($id,$object);

        	    if ($insert)
        	    {
        	    	echo '<img src="'.base_url().'img/eyemarket/produk/'.$data["file_name"].'" width="300" height="225" class="img-thumbnail" />';  
        	    }
        	    else
        	    {
        	    	echo 'gagal';
        	    }
        	}
        }
        else
        if (!empty($this->input->post('img_hidden4')))
        {
        	if(!$this->upload->do_upload('image4')) 
        	{  
        	    echo $this->upload->display_errors();  
        	}  
        	else  
        	{
        	    $data 		= $this->upload->data();

        	    $object = array(
        			'image4' 		=> $data["file_name"],
        	    	);

        	    $insert = $this->Eyemarket_model->tambah_gambar($id,$object);

        	    if ($insert)
        	    {
        	    	echo '<img src="'.base_url().'img/eyemarket/produk/'.$data["file_name"].'" width="300" height="225" class="img-thumbnail" />';  
        	    }
        	    else
        	    {
        	    	echo 'gagal';
        	    }
        	}
        }
        else
        if (!empty($this->input->post('img_hidden5')))
        {
        	if(!$this->upload->do_upload('image5')) 
        	{  
        	    echo $this->upload->display_errors();  
        	}  
        	else  
        	{
        	    $data 		= $this->upload->data();

        	    $object = array(
        			'image5' 		=> $data["file_name"],
        	    	);

        	    $insert = $this->Eyemarket_model->tambah_gambar($id,$object);

        	    if ($insert)
        	    {
        	    	echo '<img src="'.base_url().'img/eyemarket/produk/'.$data["file_name"].'" width="300" height="225" class="img-thumbnail" />';  
        	    }
        	    else
        	    {
        	    	echo 'gagal';
        	    }
        	}
        }

        
	}

	public function edit_produk($id)
	{
		$id_admin 	= $_SESSION['id'];
		
		$input = array(
			'id_kategori' 	=> $this->input->post('id_kategori'),
			'id_toko' 		=> $this->input->post('id_toko'),
			'nama' 			=> $this->input->post('nama'),
			'harga_sebelum' => $this->input->post('harga_sebelum'),
			'harga' 		=> $this->input->post('harga'),
			'diskon' 		=> $this->input->post('diskon'),
			'stok' 			=> $this->input->post('stok'),
			'berat' 		=> $this->input->post('berat'),
			'keterangan' 	=> $this->input->post('keterangan'),
			'ongkir' 		=> $this->input->post('ongkir'),
			'updated_by' 	=> $id_admin,
			'updated_date' 	=> date("Y-m-d H:i:s"),
		);

		$update = $this->Eyemarket_model->edit_produk($id,$input);

		if ($update)
		{
			redirect('/eyemarket/crud_product');
		}
		else
		{
			redirect('/eyemarket/crud_product');
		}
	}

	public function delete_produk($id)
	{
		$id_admin 	= $_SESSION['id'];
		
		$data = array(
			'status_publish'=> '2',
			'deleted_by' 	=> $id_admin,
			'deleted_date' 	=> date("Y-m-d H:i:s"),
		);

		$query = $this->Eyemarket_model->delete_produk($id,$data);

		if ($query)
		{
			redirect('/eyemarket/crud_product');
		}
		else
		{
			redirect('/eyemarket/crud_product');
		}
	}

	public function enable_produk($id)
	{
		$id_admin 	= $_SESSION['id'];
		
		$data = array(
			'status_publish'=> '1',
			'updated_by' 	=> $id_admin,
			'updated_date' 	=> date("Y-m-d H:i:s"),
		);

		$query = $this->Eyemarket_model->enable_produk($id,$data);

		if ($query)
		{
			redirect('/eyemarket/crud_product');
		}
		else
		{
			redirect('/eyemarket/crud_product');
		}
	}

	public function disable_produk($id)
	{
		$id_admin 	= $_SESSION['id'];
		
		$data = array(
			'status_publish'=> '0',
			'updated_by' 	=> $id_admin,
			'updated_date' 	=> date("Y-m-d H:i:s"),
		);

		$query = $this->Eyemarket_model->disable_produk($id,$data);

		if ($query)
		{
			redirect('/eyemarket/crud_product');
		}
		else
		{
			redirect('/eyemarket/crud_product');
		}
	}

	public function keranjang($id_member,$id_product)
	{
		$jumlah = $this->input->post('jumlah');

		$this->db->select('harga,berat');
        $harga = $this->db->get_where('eyemarket_product', array('id_product' => $id_product))->row();

        $total 	= $harga->harga * $jumlah;
        $berat 	= $harga->berat * $jumlah;

		$data 		= array(
			'id_product' 	=> $id_product,
			'id_member' 	=> $id_member,
			'jumlah' 		=> $jumlah,
			'total' 		=> $total,
			'berat' 		=> $berat,
			'catatan' 		=> $this->input->post('catatan'),
			'created_date' 	=> date("Y-m-d H:i:s"),
		);

		$insert 	= $this->Eyemarket_model->add_keranjang($data);

		if ($insert)
		{
			redirect('/eyemarket/view_keranjang/'.$id_member);
		}
	}

	public function view_keranjang($id_member)
	{
		$url 	= uri_string();
		
		$this->mod->checkLogin($url);
		
		$data['model'] 		= $this->Eyemarket_model->get_keranjang($id_member);
		
		$data['total_all']	= $this->Eyemarket_model->get_total_harga($id_member);
		$data['jumlah']		= $this->Eyemarket_model->get_count_keranjang($id_member);

		$data['username'] 	= $this->session->userdata('username');
		$data['member_id'] 	= $this->session->userdata('id_member');

		$data["kanal"] 		= 'eyemarket';
		
		$data["body"] 		=  $this->load->view('eyemarket/new_view/basket', $data, true);

		$this->load->view('/template/static', $data);
	}

	public function daftar_keranjang($id_member)
	{
		$url 	= uri_string();
		
		$this->mod->checkLogin($url);
		
		$data['model'] 		= $this->Eyemarket_model->get_keranjang($id_member);
		
		$data['total_all']	= $this->Eyemarket_model->get_total_harga($id_member);
		$data['jumlah']		= $this->Eyemarket_model->get_count_keranjang($id_member);

		$data["id_member"] 	= $id_member;

		$data["profile"] 	= $this->Eyemarket_model->get_member($id_member);

		foreach ($data["profile"] as $value)
		{
			$data['username'] 		= $value['name'];
			$data['nama_lengkap'] 	= $value['fullname'];
		}

		$data["active"] 	= "keranjang";

		$data["content"] 	= $this->load->view('eyemarket/user/keranjang',$data,TRUE);
		
		$this->load->view('/eyemarket/user/template', $data);
	}

	public function edit_keranjang()
	{
		$id_member 		= $_POST['id_member'];
		$jumlah 		= $_POST['jumlah_sekarang'];
		$id_keranjang 	= $_POST['id_keranjang'];

		$harga_satuan 	= $this->Eyemarket_model->get_harga_satuan($id_keranjang);
		$berat_satuan 	= $this->Eyemarket_model->get_berat($id_keranjang);

		$total 			= $jumlah * $harga_satuan->harga;
		$berat 			= $jumlah * $berat_satuan->berat;

		$data = array(
				'jumlah' => $jumlah,
				'total' => $total,
				'berat' => $berat,
		);

		$update 				= $this->Eyemarket_model->edit_keranjang($data,$id_keranjang);
		$total_all_update 		= $this->Eyemarket_model->get_total_harga($id_member);

		$total_all_updatenya 	= $total_all_update->total_all;

		if ($update)
		{

			echo json_encode(array('status'=>'1','jumlah_update'=>$jumlah, 'total_update'=>$total, 'total_all_update'=>$total_all_updatenya));
		}
		else
		{
			echo json_encode(array('status'=>'0'));
		}
	}

	public function edit_catatan()
	{
		$id_member 		= $_POST['id_member'];
		$id_keranjang 	= $_POST['id_keranjang'];
		$new_catatan 	= $_POST['new_catatan'];

		$data 	= array(
					'catatan' 	=> $new_catatan,
		);

		$update 	= $this->Eyemarket_model->edit_catatan($data,$id_keranjang);

		if ($update)
		{

			echo json_encode(array('status'=>'1','catatan_update'=>$new_catatan));
		}
		else
		{
			echo json_encode(array('status'=>'0'));
		}
	}

	public function hapus_keranjang($id_keranjang)
	{
		$delete 	= $this->Eyemarket_model->delete_keranjang($id_keranjang);

		if ($delete)
		{
			redirect($_SERVER['HTTP_REFERER']);
		}
		else
		{
			redirect($_SERVER['HTTP_REFERER']);
		}
	}

	public function input_order($id_member)
	{
		// $data['model'] 		= $this->Eyemarket_model->get_keranjang($id_member);
		// $data['total_all']	= $this->Eyemarket_model->get_total_harga($id_member);
		// $data['berat_all']	= $this->Eyemarket_model->get_total_berat($id_member);


		// //====== update keranjang
		// $object_cart 	= array(
		// 	'id_order' 	=> $order,
		// );

		// $query = $this->db->update('eyemarket_keranjang', $object_cart, array('id_member' => $id_member, 'status' => '0'));


		redirect('/eyemarket/order_address/'.$id_member);
	}

	public function order_address($id_member)
	{
		$url 	= uri_string();
		
		$this->mod->checkLogin($url);
		
		$data['id_member'] 	= $id_member;
		$data['member'] 	= $this->Eyemarket_model->get_member($id_member);
		$data['address'] 	= $this->Eyemarket_model->get_address($id_member);
		$data['provinsi'] 	= $this->Eyemarket_model->get_all_provinsi();
		$data['jumlah'] 	= count($data['address']);

		$data["kanal"] 		= 'eyemarket';
		
		$data["body"] 		=  $this->load->view('eyemarket/new_view/address', $data, true);

		$this->load->view('/template/static', $data);
	}

	public function input_address($id_member)
	{
		$provinsi 	= $this->input->post('provinsi');
		$kota 		= $this->input->post('kota');
		$kecamatan 	= $this->input->post('kecamatan');

		$kode_jne 	= $this->Eyemarket_model->get_kode_jne($kota,$kecamatan);

		$input = array(
			'id_member' 	=> $id_member,
			'nama' 			=> $this->input->post('nama_alamat'),
			'penerima' 		=> $this->input->post('penerima'),
			'hp' 			=> $this->input->post('hp'),
			'alamat' 		=> $this->input->post('alamat'),
			'kodepos' 		=> $this->input->post('kodepos'),
			'provinsi' 		=> $provinsi,
			'kota' 			=> $kota,
			'kecamatan' 	=> $kecamatan,
			'kode' 			=> $kode_jne->kode,
			'created_date' 	=> date("Y-m-d H:i:s"),
		);

		$insert = $this->Eyemarket_model->tambah_address($input);
		
		if ($insert)
		{
			redirect($_SERVER['HTTP_REFERER']); 
		}
		else
		{
			redirect($_SERVER['HTTP_REFERER']); 
		}
	}

	public function update_cart_address($id_member)
	{
		$input = array(
			'id_alamat' 	=> $this->input->post('pilih_alamat'),
		);

		$update_cart 	= $this->Eyemarket_model->update_cart_address($id_member,$input);
		$update_order 	= $this->Eyemarket_model->update_order_address($id_member,$input);
		
		redirect('/eyemarket/order_delivery/'.$id_member);
	}

	public function order_delivery($id_member)
	{
		$url 	= uri_string();
		
		$this->mod->checkLogin($url);
		
		$data['id_member'] 		= $id_member;
		$data['berat'] 			= $this->Eyemarket_model->get_total_berat($id_member);
		$berat 					= $data['berat']->berat_all;

		$data['model'] 			= $this->Eyemarket_model->get_keranjang($id_member);
		$kode_tujuan		 	= $data['model'][0]['kode'];
		$data['alamat']		 	= $data['model'][0]['alamat'];

		$this->load->helper('my');

		$get_ongkir 			= getOngkir($kode_tujuan,$berat);
		$jmlh_service 			= count($get_ongkir->price);
		$data['ctc'] 			= '';
		$data['reg'] 			= '';
		$data['yes'] 			= '';
		$data['ctcyes'] 		= '';

		for ($i = 0; $i < $jmlh_service ; $i++)
		{
			if ($get_ongkir->price[$i]->service_display == "CTC")
			{
				$data['ctc'] = $get_ongkir->price[$i]->price;
			}
			else
			if ($get_ongkir->price[$i]->service_display == "REG")
			{
				$data['reg'] = $get_ongkir->price[$i]->price;
			}
			else
			if ($get_ongkir->price[$i]->service_display == "YES")
			{
				$data['yes'] = $get_ongkir->price[$i]->price;
			}
			else
			if ($get_ongkir->price[$i]->service_display == "CTCYES")
			{
				$data['ctcyes'] = $get_ongkir->price[$i]->price;
			}
		}

		$data["kanal"] 		= 'eyemarket';
		
		$data["body"] 		=  $this->load->view('/eyemarket/new_view/delivery', $data, true);

		$this->load->view('/template/static', $data);
	}

	public function update_cart_delivery($id_member)
	{
		$data['harga'] 		= $this->Eyemarket_model->get_total_harga($id_member);
		$id_kurir 			= $_POST["delivery"];
		$ongkir 			= $this->input->post('ongkir'.$id_kurir);

		$data1 = array(
			'id_kurir' 	=> $id_kurir,
			'ongkir' 	=> $ongkir,
		);

		// $harga  	= $data['harga']->total_all;
		// $total_all 	= $ongkir + $harga;

		// $data2 = array(
		// 	'id_kurir' 		=> $id_kurir,
		// 	'ongkir' 		=> $ongkir,
		// 	'harga_all' 	=> $total_all,
		// );

		$update_cart 	= $this->Eyemarket_model->update_cart_delivery($id_member,$data1);
		// $update_order 	= $this->Eyemarket_model->update_order_delivery($id_member,$data2);

		
		redirect('/eyemarket/order_payment/'.$id_member);
	}

	public function order_payment($id_member)
	{
		$url 	= uri_string();
		
		$this->mod->checkLogin($url);
		
		$data['id_member'] 	= $id_member;
		$data['model'] 		= $this->Eyemarket_model->get_keranjang($id_member);
		$data['bank'] 		= $this->Eyemarket_model->get_all_bank();

		$data["kanal"] 		= 'eyemarket';
		
		$data["body"] 		=  $this->load->view('/eyemarket/new_view/payment', $data, true);

		$this->load->view('/template/static', $data);

	}

	public function start_order($id_member)
	{
		$object 	= array(
			'id_tipe_bayar' 	=> $this->input->post('payment'),
		);
		
		$update 	= $this->Eyemarket_model->update_cart_payment($id_member,$object);

		$data['model'] 		= $this->Eyemarket_model->get_keranjang($id_member);

		foreach ($data['model'] as $model)
		{
			$id_alamat 		= $model['id_alamat'];
			$id_kurir 		= $model['id_kurir'];
			$id_tipe_bayar 	= $model['id_tipe_bayar'];
			$ongkir 		= $model['ongkir'];
		}

		$data['total_all']	= $this->Eyemarket_model->get_total_harga($id_member);
		$data['berat_all']	= $this->Eyemarket_model->get_total_berat($id_member);

		$harga  	= $data['total_all']->total_all;
		$total_all 	= $ongkir + $harga;

		// ====== input ke table order 
		$data 	= array(
			'id_member' 	=> $id_member,
			'id_alamat' 	=> $id_alamat,
			'id_kurir' 		=> $id_kurir,
			'id_tipe_bayar' => $id_tipe_bayar,
			'harga' 		=> $harga,
			'ongkir' 		=> $ongkir,
			'berat_all' 	=> $data['berat_all']->berat_all,
			'harga_all' 	=> $total_all,
		);

		$order 		= $this->Eyemarket_model->set_order($data);

		// ===== update keranjang (id_order)
		$objek 	= array(
			'id_order' => $order,
		);

		$query = $this->db->update('eyemarket_keranjang', $objek, array('id_member' => $id_member, 'status' => '0'));		
		
		if ($query)
		{
			redirect('/eyemarket/order_review/'.$id_member);
		}
		else
		{
			redirect($_SERVER['HTTP_REFERER']); 
		}
	}

	public function order_review($id_member)
	{
		$url 	= uri_string();
		
		$this->mod->checkLogin($url);

		$data['id_member'] 	= $id_member;
		$data['model'] 		= $this->Eyemarket_model->get_review_order($id_member);
		$data['address'] 	= $this->Eyemarket_model->get_address($id_member);
		$data['jumlah'] 	= count($data['address']);
		$data['total_all']	= $this->Eyemarket_model->get_total_harga($id_member);

		$data['kurir']			= "";
		$data['ongkir']			= "";
		$data['total_finish']	= "";
		$data['penerima']		= "";
		$data['alamat']			= "";
		$data['hp']				= "";
		$data['berat']			= "";
		$data['berat_all']		= "";

		foreach ($data['model'] as $val)
		{
			$data['kurir']			= $val['kurir'];
			$data['ongkir']			= $val['ongkir'];
			$data['total_finish']	= $val['harga_all'];
			$data['penerima']		= $val['nama_penerima'];
			$data['alamat']			= $val['alamat'];
			$data['hp']				= $val['hp'];
			$data['berat']			= $val['berat'];
			$data['berat_all']		= $val['berat_all'];
		}

		$data["kanal"] 		= 'eyemarket';
		
		$data["body"] 		=  $this->load->view('/eyemarket/new_view/review', $data, true);

		$this->load->view('/template/static', $data);
	}

	public function order_fix($id_member)
	{
		$tahun 		= date("Y");
		$bulan 		= date("m");

		$data['model'] 	= $this->Eyemarket_model->get_order(NULL,$id_member);

		$id_order 		= $data['model']->id;

		//=====set nomor urut
		$no_urut_last 	= $this->Eyemarket_model->get_max_nourut($id_member);
		$no_urut_now	= (int)$no_urut_last->max_urut;
		$no_urut_now++;
		$new_no_urut 	= sprintf("%03s", $no_urut_now);

		//=====set nomor order
		$no_order 			= "$tahun$bulan$id_member$new_no_urut";
		$data['no_order'] 	= $no_order;

		//=====set nomor invoice
		$no_invoice 			= "INV-MBCI/EMK/".$tahun."/".$bulan."/".$id_member."/".$new_no_urut;
		$data['no_invoice'] 	= $no_invoice;

		//=====set expired time (4 jam)
		$data['expired'] 	= date('Y-m-d H:i:s',strtotime("+4 hours"));

		//=====set status = 1 di keranjang
		$cart 		= array(
			'status' 		=> 1,
		);

		$update_cart 	=  $this->Eyemarket_model->set_keranjang_status($id_order,$cart);

		//=====update final order
		$object 	= array(
			'no_urut' 		=> $new_no_urut,
			'no_order'	 	=> $no_order,
			'no_invoice'	=> $no_invoice,
			'order_date' 	=> date("Y-m-d H:i:s"),
			'expired_date' 	=> $data['expired'],
			'status' 		=> 1,
		);

		$update_order 		= $this->Eyemarket_model->set_order_status($id_order,$object);
		
		if ($update_order)
		{
			$data["profile"] 	= $this->Eyemarket_model->get_member($id_member);
			foreach ($data["profile"] as $value)
			{
				$data['username'] 		= $value['name'];
				$data['nama_lengkap'] 	= $value['fullname'];
				$data['email'] 			= $value['email'];
			}


			$message=$this->load->view('eyemarket/new_view/mail_order',$data,TRUE);

			$objMail 	= $this->phpmailer_library->load();

				//Server settings
				// $objMail->SMTPDebug = 2;                                 // Enable verbose debug output
				$objMail->isSMTP();                                      // Set objMailer to use SMTP
				$objMail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
				$objMail->SMTPAuth = true;                               // Enable SMTP authentication
				$objMail->Username = 'eyesoccerindonesia@gmail.com';                 // SMTP username
				$objMail->Password = 'BolaSepak777#';                           // SMTP password
				$objMail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
				$objMail->Port = 465;                                    // TCP port to connect to

				//Server settings
				// $objMail->SMTPDebug 	= 4;                                 // Enable verbose debug output
				// $objMail->isSMTP();                                      // Set objMailer to use SMTP
				// $objMail->Host 			= "smtp.gmail.com";  // Specify main and backup SMTP servers
				// $objMail->SMTPAuth 		= true;                               // Enable SMTP authentication
				// $objMail->SMTPSecure	= 'ssl';                            // Enable TLS encryption, `ssl` also accepted
				
				// $objMail->Port 			= 465;                                    // TCP port to connect to
				$objMail->isHTML(true);                                  // Set eobjMail format to HTML

				$objMail->SMTPOptions = array(
					'ssl' => array(
					'verify_peer' => false,
					'verify_peer_name' => false,
					'allow_self_signed' => true
					)
				);

				// $objMail->Username 		= 'robidummy665@gmail.com';
				// $objMail->Password 		= 'robionepiece32';

				//Recipients
				$objMail->setFrom('info@eyesoccer.id', 'Info Eyesoccer');
				$objMail->addAddress($data["email"]);               // Name is optional
				$objMail->addReplyTo('info@eyesoccer.id', 'Info Eyesoccer');

				//Content
				$objMail->Subject 		= 'Menunggu Pembayaran untuk Pemesanan '.$no_invoice;
				$objMail->Body    		= $message;

				if ($objMail->send())
				{
					// echo "bisa";
					$this->session->set_flashdata('sukses','<strong>Order anda berhasil</strong>, silahkan cek email anda untuk langkah selanjutnya');

					redirect('/eyemarket/pesanan/'.$id_member);
				}
				else
				{
					echo "Mailer Error: " . $objMail->ErrorInfo;
				}
		}
		else
		{
			echo 'update gagal';
		}
		
	}

	public function invoice($no_order)
	{
		
		$url 	= uri_string();

		$this->mod->checkLogin($url);

		$data['model'] 		= $this->Eyemarket_model->get_invoice($no_order);

		$data['cart'] 		= $this->Eyemarket_model->get_keranjang_invoice($data['model']->id);

		$this->load->view('/eyemarket/new_view/invoice', $data);
	}

	public function user($id_member)
	{
		$url 	= uri_string();
		
		$this->mod->checkLogin($url);

		$data["id_member"] 	= $id_member;
		$data["profile"] 	= $this->Eyemarket_model->get_member($id_member);

		foreach ($data["profile"] as $value)
		{
			$data['username'] 		= $value['name'];
			$data['nama_lengkap'] 	= $value['fullname'];
			$data['email'] 			= $value['email'];
			$data['hp'] 			= $value['phone'];
			$data['alamat'] 		= $value['address'];
		}
		$data["active"] 	= "profile";

		$data["content"] 	= $this->load->view('/eyemarket/user/profile',$data,TRUE);
		
		$this->load->view('/eyemarket/user/template', $data);
		
	}

	public function edit_profile($id_member)
	{
		$data = array(
			'name' 		=> $_POST['username'],
			'fullname' 	=> $_POST['fullname'],
			'email' 	=> $_POST['email'],
			'address' 	=> $_POST['alamat'],
		);

		$edit 	= $this->Eyemarket_model->update_member($id_member,$data);

		if (!$edit)
		{
			$this->session->set_flashdata('gagal','Edit Profile Gagal. Silahkan coba lagi');

			redirect($_SERVER['HTTP_REFERER']);
		}
		else
		{
			$this->session->set_flashdata('sukses','Edit Profile Berhasil');

			redirect($_SERVER['HTTP_REFERER']);
		}
	}	

	public function pesanan($id_member)
	{
		$url 	= uri_string();
		
		$this->mod->checkLogin($url);
		
		
			$data["id_member"] 	= $id_member;
			$data["model"] 		= $this->Eyemarket_model->get_pesanan($id_member);
			$data["profile"] 	= $this->Eyemarket_model->get_member($id_member);

			foreach ($data["profile"] as $value)
			{
				$data['username'] 		= $value['name'];
				$data['nama_lengkap'] 	= $value['fullname'];
			}

			$data["active"] 	= "pesanan";

			$data["content"] 	= $this->load->view('/eyemarket/user/pesanan',$data,TRUE);
			
			$this->load->view('/eyemarket/user/template', $data);
	}

	public function konfirmasi($no_order)
	{ 
		$url 	= uri_string();
		
		$this->mod->checkLogin($url);
		
		
		$data['model'] 		= $this->Eyemarket_model->get_invoice($no_order);

		$id_order 			= $data['model']->id;
		$id_member 			= $data['model']->id_member;
		$data["id_member"] 	= $id_member;

		$data['cart'] 		= $this->Eyemarket_model->get_keranjang_invoice($id_order);
		$data["profile"] 	= $this->Eyemarket_model->get_member($id_member);

		foreach ($data["profile"] as $value)
		{
			$data['username'] 		= $value['name'];
			$data['nama_lengkap'] 	= $value['fullname'];
		}

		$data["active"] 	= "pesanan";

		$data["content"] 	= $this->load->view('/eyemarket/user/konfirmasi',$data,TRUE);
		
		$this->load->view('/eyemarket/user/template', $data);
	}

	public function upload_bukti($id_member)
	{
		//===== inputan dari form
		$no_order 	= $this->input->post('no_order');
		$nominal 	= $this->input->post('nominal');
		$bukti 		= $this->input->post('bukti');
		$this->load->library('upload');
		
		//===== atur upload bukti
		$config['upload_path'] = "./img/eyemarket/bukti/";
		$config['allowed_types'] = '*';
		$config['max_size']  = '10000';
		$config['max_width']  = '0';
		$config['max_height']  = '0';

		$this->upload->initialize($config);

		if (!$this->upload->do_upload('bukti')) {
            $error = $this->upload->display_errors();
            
            redirect($_SERVER['HTTP_REFERER']);
        }
        else
        {
        	//===== get nama file gambar nya
        	$upload_data = $this->upload->data(); 
        	$file_name = $upload_data['file_name'];

        	//===== get data order
        	$data['model'] 		= $this->Eyemarket_model->get_invoice($no_order);

        	//===== insert ke table eyemarket_destinasi
			$objek 	= 	array(
			        		'id_order' 		=> $no_order,
			        		'nominal' 		=> $nominal,
			        		'bukti' 		=> $file_name,
			        		'created_date' 	=> date("Y-m-d H:i:s"),
			        	);

			$insert =	$this->Eyemarket_model->set_konfirmasi($objek);

			//===== update status di table eyemarket_order menjadi 2 (menunggu konfirmasi)
			$status = 	array(
							'status' 	=> 2,
						);

			$update = $this->db->update('eyemarket_order', $status, array('id' => $data['model']->id));

			//===== set variabel untuk di email bukti
			$data['no_order'] 	= $no_order;
			$data['file_name'] 	= $file_name;
			$data['nominal'] 	= $nominal;

			$message=$this->load->view('eyemarket/admin/mail_bukti',$data,TRUE);

			//===== set email ke admin eyemarket (mba Aya)
			$objMail 	= $this->phpmailer_library->load();

			// $objMail->isSMTP();
			// $objMail->Host 			= "smtp.gmail.com";
			// $objMail->SMTPAuth 		= true;
			// $objMail->SMTPSecure	= 'ssl';
			
			// $objMail->Port 			= 465;
			// $objMail->isHTML(true);

			// $objMail->SMTPOptions = array(
			// 	'ssl' => array(
			// 	'verify_peer' => false,
			// 	'verify_peer_name' => false,
			// 	'allow_self_signed' => true
			// 	)
			// );

			// $objMail->Username 		= 'robidummy665@gmail.com';
			// $objMail->Password 		= 'robionepiece32';

				$objMail->isSMTP();                                      // Set objMailer to use SMTP
				$objMail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
				$objMail->SMTPAuth = true;                               // Enable SMTP authentication
				$objMail->Username = 'eyesoccerindonesia@gmail.com';                 // SMTP username
				$objMail->Password = 'BolaSepak777#';                           // SMTP password
				$objMail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
				$objMail->Port = 465;           
				$objMail->isHTML(true);                                  // Set eobjMail format to HTML

				$objMail->SMTPOptions = array(
					'ssl' => array(
					'verify_peer' => false,
					'verify_peer_name' => false,
					'allow_self_signed' => true
					)
				);

			//Recipients
			$objMail->setFrom('info@eyesoccer.id', 'Info Eyesoccer');
			$objMail->addAddress("info@eyesoccer.id");
			$objMail->addReplyTo('info@eyesoccer.id', 'Info Eyesoccer');

			//Content
			$objMail->Subject 		= 'Ada konfirmasi pembayaran untuk nomor order '.$no_order;
			$objMail->Body    		= $message;

			if ($objMail->send())
			{
				$this->session->set_flashdata('sukses','Konfirmasi anda berhasil. <br>Admin kami akan memeriksa pembayaran anda');

				redirect('eyemarket/pesanan/'.$id_member);
			}
			else
			{
				echo "Mailer Error: " . $objMail->ErrorInfo;
			}

        	
        }
	}

	public function coba($id_member)
	{
		$data["id_member"] 	= $id_member;
		$data["model"] 		= $this->Eyemarket_model->get_pesanan($id_member);
		$data["profile"] 	= $this->Eyemarket_model->get_member($id_member);

		foreach ($data["profile"] as $value)
		{
			$data['username'] 		= $value['name'];
			$data['nama_lengkap'] 	= $value['fullname'];
		}

		$data["active"] 	= "pesanan";

		$data["content"] 	= $this->load->view('/eyemarket/user/coba',$data,TRUE);
		
		$this->load->view('/eyemarket/user/template', $data);
	}

	public function getkota()
	{
		$kota 	= $this->Eyemarket_model->get_kota($_POST['prov']);
		

		if ($kota != NULL)
		{

			echo json_encode($kota);
		}
		else
		{
			echo json_encode(array('status'=>'0'));
		}
	}

	public function getkecamatan()
	{
		$camat 	= $this->Eyemarket_model->get_kecamatan($_POST['kota']);
		

		if ($camat != NULL)
		{

			echo json_encode($camat);
		}
		else
		{
			echo json_encode(array('status'=>'0'));
		}
	}

	public function list_order()
	{
		$data["id_admin"] 	= $this->session->userdata('id') != NULL ? $this->session->userdata('id') : NULL;

		if ($data["id_admin"] != NULL)
		{
			$data["profile"] 	= $this->Eyemarket_model->get_admin($data["id_admin"]);

			foreach ($data["profile"] as $value)
			{
				$data['nama'] 		= $value['nama'];
				$data['username'] 	= $value['username'];
			}

			$data['model'] 		= $this->Eyemarket_model->get_all_order();
			$data["content"] 	= $this->load->view('/eyemarket/admin/order',$data,TRUE);
		}
		else
		{
			redirect('eyemarket/login_view');
		}

		$data["active"] 	= "order";
		
		$this->load->view('/eyemarket/admin/template', $data);

	}

	public function order_lunas($id)
	{
		$objek 	= array(
			'status' 	=> 3,
		);

		$update 	= $this->Eyemarket_model->set_status_lunas($id,$objek);

		$data['model'] 		= $this->Eyemarket_model->get_order($id,NULL);
		$data['prod_lain'] 	= $this->Eyemarket_model->get_product_lain($id);
		
		$data["profile"] 	= $this->Eyemarket_model->get_member($data['model']->id_member);

		foreach ($data["profile"] as $value)
		{
			$data['username'] 		= $value['name'];
			$data['nama_lengkap'] 	= $value['fullname'];
			$data['email'] 			= $value['email'];
		}

		if ($update)
		{
			$message=$this->load->view('eyemarket/new_view/mail_lunas',$data,TRUE);

			$objMail 	= $this->phpmailer_library->load();

				//Server settings
				// $objMail->SMTPDebug 	= 4;                                 // Enable verbose debug output
				$objMail->isSMTP();                                      // Set objMailer to use SMTP
				$objMail->Host 			= "smtp.gmail.com";  // Specify main and backup SMTP servers
				$objMail->SMTPAuth 		= true;                               // Enable SMTP authentication
				$objMail->SMTPSecure	= 'ssl';                            // Enable TLS encryption, `ssl` also accepted
				
				$objMail->Port 			= 465;                                    // TCP port to connect to
				$objMail->isHTML(true);                                  // Set eobjMail format to HTML

				$objMail->SMTPOptions = array(
					'ssl' => array(
					'verify_peer' => false,
					'verify_peer_name' => false,
					'allow_self_signed' => true
					)
				);

				$objMail->Username 		= 'robidummy665@gmail.com';                 // SMTP username
				$objMail->Password 		= 'robionepiece32';                           // SMTP password

				//Recipients
				$objMail->setFrom('info@eyesoccer.id', 'Info Eyesoccer');
				$objMail->addAddress($data["email"]);               // Name is optional
				$objMail->addReplyTo('info@eyesoccer.id', 'Info Eyesoccer');

				//Content
				$objMail->Subject 		= 'Pembayaran Lunas';
				$objMail->Body    		= $message;

				$objMail->send();

			$this->session->set_flashdata('sukses','Pembelian dengan ID order '.$id.' Telah Lunas');
			
			redirect('eyemarket/list_order/');
		}
		else
		{
			$this->session->set_flashdata('gagal','Terjadi Kesalahan, Hubungi Web Developer Anda');
			
			redirect('eyemarket/list_order/');
		}
	}
}
