<?php
class Master_model extends CI_Model
{
	#var $p = 'go_';
	#var $author = AUTHOR;	
	public function __construct()
    {
		parent::__construct();
		
	}	
	public function getLastId($table,$fieldId){
		$this->db->select_max($fieldId);
		$q = $this->db->get($table);
		$r = $q->result();		
		return count($r) > 0  ? intval ($r[0]->$fieldId) + 1 : 1 ;	
	}
	
	public function getColumn($tbl){
		$f = array();
		$q = $this->db->query("SHOW COLUMNS FROM ".$tbl);
		$r = $q->result();
		
		foreach($r as $row){$f[] = $row->Field;}
		
		return $f;
	}
	
	public function createCaptcha(){
		#delete image created before
		$imgPath = './capt/';
		$this->session->unset_userdata('captword');
		
		$this->load->helper('file');
		$this->load->helper('captcha');		
		delete_files($imgPath);
		
		$apppath = str_replace('/','',APPPATH);
		#copy index html
		copy('./'.$apppath.'/index.html', $imgPath.'index.html');		
		
		$vals = array(
			'img_path' => $imgPath,
			'img_url' => base_url().'/capt/',
			//'font_path' => './inc/font/murad-book.otf',
			//'font_path' => './assets/fonts/glyphicons-halflings-regular.ttf',
			'img_width' => '150',
			'img_height' => 30,
			'expiration' => 7200
			);		
		$cap = create_captcha($vals);
		
		$this->session->set_userdata('captword',$cap['word']);
		
		return $cap;
	}

	/**
	*@param $table = nama table,
	*@param $where = array('key','value')
	*@param $select = select field table
	*@param $order  = order by  
	*@param $limit   =  LIMIT,$offset ,
	*@param $whereNotin = where not in
	*@param $like  = like array()
	*@return array()
	fungsi untuk menggunakan query select 

	*/
	
	public function getAll($table, $where = array(), $select = array(), $order = array(), $limit = '', $offset = '', $whereNotin = '', $like = array(),$whereIn=array()){
		if($limit != ''){
			if($offset == '')
			{
				if(is_numeric($limit)){
					$this->db->limit($limit);
				}
			}else{
				if(is_numeric($offset)){
					$this->db->limit($limit, $offset);
				}else{
					$this->db->limit($limit);
				}
			}
		}
		
		if(count($like) > 0 && $like != ''){
			foreach($like as $k=>$v){
				$this->db->like($k,$v);
			}
		}
		if(is_array($whereIn)){
			if(count($whereIn) > 0){
				foreach($whereIn as $a => $b){
					if(is_array($b)){
						$str = '';
						$i = 0;
						foreach($b as $c => $d){
							$str .= $d.($i == count($d) ? '' : ',');
							$i++;

						}
						
					}
					else{
						$str = $b;
					}
					$this->db->where_in($a,$str);
				}
			}
		}
		#p($whereNotin);
		if(is_array($whereNotin)){
			if(count($whereNotin) > 0){
				$field = $whereNotin[0];
				
				$ItemWhere = $whereNotin[1] != ''  > 0 ? $whereNotin[1] : array();  #ditambahin ini kemaren
				
				#echo count($whereNotin[1]);
				#p($whereNotin[1]);				
				foreach($ItemWhere as $k=>$v){
					$this->db->where_not_in($field,$v);
				}
			}
		}
		
		if(is_array($where)){
			if(count($where) > 0){
				foreach($where as $k=>$v){
					$this->db->where($k,$v);
				}			
			}
		}
		
		if(is_array($order)){
			if(count($order) > 0){
				foreach($order as $ko=>$vo){				
					$this->db->order_by($ko, $vo); 
				}
			}
		}
		
		$s = '';
		if(is_array($select)){
			if(count($select) > 0){
				foreach($select as $vs){				
					$s .= ','.$vs;
				}
				$s = substr($s,1);
				$this->db->select($s);
			}
		}
		
		$q = $this->db->get($table);
		
		if($q->num_rows() > 0){
			$r = $q->result();
		}else{
			$r = array();
		}
		
		return $r;		
	}
	function getLast($table, $field, $where = array())
	{
		if(count($where) > 0){
			foreach($where as $k=>$v){
				$this->db->where($k,$v);
			}			
		}		
		$this->db->select_max($field);
		$qry = $this->db->get($table);
		$row = $qry->result_array();
		
		if($qry->num_rows() > 0){return $row[0][$field]+1;}else{return 1;}
	}
	function getQuery($sql){
		$q = $this->db->query($sql);
		
		if($q->num_rows() > 0 ){
			return $q->result();
		}else{
			return array();
		}
	}
	
	
	function update($table,$updateField = array(),$where = array()){
		$this->db->update($table, $updateField, $where);
	}
	
	function deleteImg($path,$imgName, $useFilesUpload = '' ){
		# $path = ./up/prodcategory/ # $imgName = namaimg.jpg

		$inputName = '';
		if($useFilesUpload != ''){
			
			$f = $_FILES;
			foreach($f as $k=>$v){
				$inputName = $k;
			}
			
			if($f[$inputName]['name'] != '')
			{
				#echo 'masuk';
				$this->deleteImgNow($path,$imgName);
			}else{
				#$this->deleteImgNow($path,$imgName);
			} #close else
		}else{
			$this->deleteImgNow($path,$imgName);
		}
	}
	
	function deleteImgNow($path,$imgName){
		$filePath = $path.$imgName;				
		#echo $filePath;
		if(file_exists($filePath) && $imgName != ''){
			#delete real image
			unlink($filePath);
			#delete thumb
			$filePathThumb = $path.'/thumb/'.$imgName;
			
			if(file_exists($filePathThumb)){
				unlink($filePathThumb);
			}
		}
	}
	
	function renameImg($imgpath,$imgName, $newImgName = ''){		
		#$newImgName = must include extention exp: gambar.jpg
		$newImgNameThumb = $imgName;
		
		$currImg = $imgpath.$imgName;		
		if(file_exists($currImg))
		{
			if($newImgName == ''){
				$newImgNameP = str_replace('temp_','',$currImg);
			}		
			
			rename($currImg, $newImgNameP);
		}
		
		$currImgThumb = $imgpath.'thumb/'.$imgName;
		#rename thumb file
		
		if(file_exists($currImgThumb)){
			if($newImgName == '')
			{
				#echo 'masuk';
				$newImgNameThumb = str_replace('temp_','',$currImgThumb);
			}
		}
		
		rename($currImgThumb, $newImgNameThumb);
		
		return str_replace($imgpath, '', $newImgNameP);
	}
	
	
	
	function renameImgSlider($imgpath,$imgName, $newImgName = ''){		
		#$newImgName = must include extention exp: gambar.jpg
		$newImgNameThumb = $imgName;
		
		$currImg = $imgpath.$imgName; #echo $currImg;	
		if(file_exists($currImg))
		{
			if($newImgName == ''){
				$newImgNameP = str_replace('temp_','',$currImg);
			}		
			
			rename($currImg, $newImgNameP);
		}
		
		$currImgThumb = $imgpath.'thumb/'.$imgName;
		#rename thumb file
		
		if(file_exists($currImgThumb)){
			if($newImgName == '')
			{
				#echo 'masuk';
				$newImgNameThumb = str_replace('temp_','',$currImgThumb);
			}
		}
		
		rename($currImgThumb, $newImgNameThumb);
		
		return str_replace($imgpath, '', $newImgNameP);
	}
	
	
	function handleUpload($uploadName, $pathUpload, $createThumb = '', $cropThumb='', $thumbSize=''){
		$uploadName = str_replace('-','_',$uploadName);
		
		$inputName = '';
		$f = $_FILES;
		
		foreach($f as $k=>$v){
			$inputName = $k;
		}

		$dbName = '';
		if(isset($f[$inputName]['name']))
		{
			if($f[$inputName]['name'] != '')
			{
				#$uploadName = str_replace('-','_',url_title($nama)).'_'.$id;
				$dbName = $uploadName.'.'.substr($_FILES[$k]['name'], strrpos($_FILES[$k]['name'], '.') + 1); #getExtention
				
				#echo $pathUpload.$dbName;
				#check file exist
				if(file_exists($pathUpload.$dbName)){			
					$dbName = 'temp_'.$dbName; 
					$uploadName = 'temp_'.$uploadName; 
				}
				
				#$uploadPath	 = './swuploads/infokampus/';
				$uploadPath	 = $pathUpload;
				$ImgName		= $uploadName;
				$maxSize		= 5000;
				$maxWidth	   = 1000;
				$maxHeight	  = 1000;
			
				$this->uploadImg($uploadPath, $ImgName, $maxSize, $maxWidth, $maxHeight, $inputName);
				
				if($createThumb == 1){
					#create thumb
					$cropThumb = $cropThumb == '' ? 0 : 1; 
					$thumbSize == '' ? 200 : $thumbSize;
					
					$src = $uploadPath . $dbName;
					$dst = $uploadPath . 'thumb/' . $dbName;			
					
					image_resize($thumbSize, $thumbSize, $cropThumb, $src, $dst);
				}
				
				return $dbName;
			}else{
				
				return $dbName;
			}
		}
	}
	public function resizeImg($source_image,$width='',$height=''){

		$config['image_library'] = 'gd2';
		$config['source_image'] = $source_image;
		$config['create_thumb'] = TRUE;
		$config['maintain_ratio'] = TRUE;
		$config['width']         = $width;
		$config['height']       = $height;
		$config['overwrite'] = TRUE;
		$config['thumb_marker'] = 'thumb_';
		$this->load->library('image_lib',$config);
		if(!$this->image_lib->resize()){
			 echo $this->image_lib->display_errors();
		}

	}
	public function uploadImg($uploadPath, $ImgName, $maxSize, $maxWidth, $maxHeight, $inputName, $allowtypefile = '')
	{
		$allowtype = $allowtypefile == '' ? 'gif|jpg|png|jpeg' : $allowtypefile;
		
		#$inputNama = nama input file form
		$this->load->library('upload');	
		//get_array($file);
		$config['file_name']      = $ImgName;
		$config['upload_path']    = $uploadPath;
		$config['allowed_types']  = $allowtype;
		$config['max_size']	      = $maxSize;
		$config['max_width']      = $maxWidth;
		$config['max_height']     = $maxHeight;

		
		#p($config);
		$this->upload->initialize($config);
		#echo $inputName;
		#exit;
		if (!$this->upload->do_upload('img'))					
		{
			$error = $this->upload->display_errors('','');
			echo "
			<script>
				alert('".$error."');
				//window.history.go(-1);
			</script>
			";
			exit;
		}else{
			$uploadData = $this->upload->data();
			echo $uploadPath.$uploadData['file_name'];
			$this->resizeImg($uploadPath.$uploadData['file_name']);
			return $uploadData;
		}		
	}
		
	function pagging($selectID, $tbl, $limit, $offset, $url, $uri_segment, $like = array(), $where = array(), $selectFieldRow = '')
	{
		#p($like);
		#where for num row
		if(count($where) > 0 && $where != '' ){
			foreach($where as $k=>$v){
				$this->db->where($k,$v);
			}
		}
		
		# for num row like
		if(count($like) > 0 && $like != ''){
			foreach($like as $k=>$v){
				$this->db->like($k,$v);
			}
		}
		
		$this->db->select($selectID);
		$qry = $this->db->get($tbl);
		$num = $qry->num_rows();
		
		
		
		#get data where
		if(count($where) > 0 && $where != ''){
			foreach($where as $k=>$v){
				$this->db->where($k,$v);
			}
		}
		
		#get data like
		if(count($like) > 0 && $like != ''){
			foreach($like as $k=>$v){
				$this->db->like($k,$v);
			}
		}
		
		if($selectFieldRow != ''){
			#$this->db->select('title, content, date');
			$this->db->select($selectFieldRow);
		}
		
		$this->db->limit($limit, $offset);
		$this->db->order_by($selectID, "desc");
		$qry1 = $this->db->get($tbl);
		$row = $qry1->result();

		$this->load->library('pagination');	
		
		$config['base_url'] = base_url().$url;
		$config['total_rows'] = $num;
		$config['per_page'] = $limit;
		$config['uri_segment'] = $uri_segment;
		$config['full_tag_open'] = '<div class="muradpagging pull-right">
                						<ul class="pagination">';
		$config['full_tag_close'] = '	</ul>
									
									  </div>
									  <div class="cleaner"></div>';
		
		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</a></li>';
		
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		
		
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li>';		
		$config['last_tag_close'] = '</li>';
		
		$config['prev_link'] = '&laquo;';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		
		$config['next_link'] = '&raquo;';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		
		/*
		   <div class="muradpagging pull-right">
                <ul class="pagination">
                  <li><a href="#">&laquo;</a></li>
                  <li class="active"><a href="#">1</a></li>
                  <li><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li><a href="#">4</a></li>
                  <li><a href="#">5</a></li>
                  <li><a href="#">&raquo;</a></li>
                </ul>
            </div>
          </div>
          <div class="cleaner"></div> 
	*/
		
		
		
		$this->pagination->initialize($config);
		$pagging = $this->pagination->create_links();
		
		return array('pagging'=> $pagging, 'row'=>$row, 'num'=>$num); // pagging link		
		/*
			Cara pakai 
			$uri_segment = 2; 
			$limit	   = 2;
			$offset	  = $this->uri->segment($uri_segment) == '' ? 0 : $this->uri->segment($uri_segment);
			$selectID    = 'id';
			$tbl		 = 'folio';
			$url		 = base_url().'portfolio/';		
			
			$skyPage = $this->fm->skyPage($selectID, $tbl, $limit, $offset, $url, $uri_segment);
			
			$data['pagging'] = $skyPage['pagging'];
			$data['row']	 = $skyPage['row']; 	
			
			$this->load->view('home',$data);
		
		*/		
	}
	
	
	var $loopPaggingFront = 0;	
	function paggingfront($selectID, $tbl, $limit, $offset, $url, $uri_segment, $like = array(), $where = array(), $selectFieldRow = '',$orderby = array())
	{
		$this->loopPaggingFront ++;
		
		#echo $this->loopPaggingFront;
		
		#where for num row
		if(count($where) > 0 && $where != '' ){
			foreach($where as $k=>$v){
				$this->db->where($k,$v);
			}
		}
		
		# for num row like
		/*
		if(count($like) > 0 && $like != ''){
			$a =0;
			foreach($like as $k=>$v){
				if($a == 0){
					$this->db->like($k,$v);
				}else{
					$this->db->or_like($k,$v);
				}
				$a ++;
			}
		}
		*/
		
		if(count($like) > 0 && $like != ''){
			$a =0;
			foreach($like as $k=>$v){
				if($a == 0){
					$this->db->like($k,$v);
				}else{
					$this->db->or_like($k,$v);
				}
				$a ++;
				
				if($this->loopPaggingFront == 2){
					$expLike = explode(' ',$v);					
					if(count($expLike) > 0){
						for($i=0; $i < count($expLike); $i++){
							$this->db->or_like($k,$expLike[$i]);
						}
					}
				}
				
			}
		}
		
		$this->db->select($selectID);
		$qry = $this->db->get($tbl);
		$num = $qry->num_rows();
		
		#p($num);
		if($this->loopPaggingFront == 1 && $num == 0){
			$this->paggingfront($selectID, $tbl, $limit, $offset, $url, $uri_segment, $like,$where,$selectFieldRow,$orderby);
		}
		
		#get data where
		if(count($where) > 0 && $where != ''){
			foreach($where as $k=>$v){
				$this->db->where($k,$v);
			}
		}
		
		#get data like
		if(count($like) > 0 && $like != ''){
			$a =0;
			foreach($like as $k=>$v){
				if($a == 0){
					$this->db->like($k,$v);
				}else{
					$this->db->or_like($k,$v);
				}
				$a ++;
				
				if($this->loopPaggingFront == 2){
					$expLike = explode(' ',$v);					
					if(count($expLike) > 0){
						for($i=0; $i < count($expLike); $i++){
							$this->db->or_like($k,$expLike[$i]);
						}
					}
				}
			}
		}
		/*
		if(count($like) > 0 && $like != ''){
			$a =0;
			foreach($like as $k=>$v){
				if($a == 0){
					$this->db->like($k,$v);
				}else{
					$this->db->or_like($k,$v);
				}
				$a ++;
			}
		}
		*/
		
		if($selectFieldRow != ''){
			#$this->db->select('title, content, date');
			$this->db->select($selectFieldRow);
		}
		
		#order by
		if(count($orderby) > 0 && $orderby != ''){
			foreach($orderby as $k=>$v){
				$this->db->order_by($k,$v);
			}
		}else{
			$this->db->order_by($selectID, "desc");
		}
		
		
		$this->db->limit($limit, $offset);
		
		$qry1 = $this->db->get($tbl);
		$row = $qry1->result();
		
		
		
		#echo $this->db->last_query();
		$this->load->library('pagination');	
		
		$config['base_url'] = base_url().$url;
		$config['total_rows'] = $num;
		$config['per_page'] = $limit;
		$config['uri_segment'] = $uri_segment;
		$config['full_tag_open'] = '<div class="muradpagging pull-right">
                						<ul class="pagination">';
		$config['full_tag_close'] = '	</ul>									
									  </div>
									  <div class="cleaner"></div>';
		
		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</a></li>';
		
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		
		
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li>';		
		$config['last_tag_close'] = '</li>';
		
		$config['prev_link'] = '&laquo;';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		
		$config['next_link'] = '&raquo;';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';	
		
		$this->pagination->initialize($config);
		$pagging = $this->pagination->create_links();
		
		return array('pagging'=> $pagging, 'row'=>$row, 'num'=>$num); // pagging link	
	}
	
	public function backwardPage($msg = '',$href=''){
		$r = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : base_url();
		
		if($href != ''){$r = $href;}
		
		echo "
			<script>
				alert('".$msg."');
				window.location.href = '".$r."';
			</script>
		";
	}
	public function checkLogin($page =''){ // page == halamaan yang di tuju 
		$userid = $this->session->userdata('id_member');
		if($userid == ''){
			$this->backwardPage('session anda telah habis, Silahkan Login',base_url().($page == '' ? 'home/login' : 'home/login?page='.$page));
			return false;
			
		} 
		else{
			return true;
		}
		
	}
		
	function permalink($table,$title){
		$title = str_replace("'",'',strip_tags(strtolower(url_title($title))));
		
		$q = $this->db->query("select permalink as num from ".$table." where permalink = '".$title."'");
		$s = $q->result();
		
		if(count($s) > 0){
			return $title.date('His');	
		}else{
			return $title;
		}
	}
	
	function getUserObj($userid){
		$det = $this->getAll(tblUser,array('userid'=>$userid));		
		$this->userid = $this->username = $this->userpwd = $this->email = $this->nama = $this->usergroupid = $this->lastlogin = $this->active = '';
		
		foreach($det as $r){
			$this->userid = $r->userid ;
			$this->username = $r->username ;
			$this->userpwd = $r->userpwd ;
			$this->email = $r->email ;
			$this->nama = $r->nama ;
			$this->usergroupid = $r->usergroupid ;
			$this->lastlogin = $r->lastlogin ;
			$this->active = $r->active ;
		}
		
		return $this;
	}
	
	#get id object from permalink
	function getObjId($table,$permalink, $idName = ''){
		$idName = $idName == '' ? 'id' : $idName;		
		$det = $this->getAll($table, array('permalink'=>$permalink),array('id'));
		#echo $this->db->last_query();		
		#p($det);
		#exit;
		
		if(count($det) > 0){
			$id = $det[0]->$idName ;
		}else{
			$id = 0;
			redirect('notfound');
		}
		
		return $id;
	}
	
	function sendMail($from, $to, $subject, $message, $ket = '', $cc = ''){
		#save data to send email
		$data = array(
					  'from_email' => $from,
					  'from_name'  => $from,
					  'to_email'=> $to,
					  'cc_email'=> $cc,
					  'subject' => $subject,
					  'message' => $message,
					  'ket' => $ket
					  );
					  
		$this->db->insert('email_outbox', $data);
	}
	
	// ===================================================================================================
	function flashdata($msg){
		$this->session->set_flashdata('msg', $msg);
	}
	
	function setTambahData(){
		$this->session->set_flashdata('msg', '<div class="alert alert-success"> <i class="fa fa-check"></i> Berhasil Tambah Data</div>');
	}
	
	function setUbahData(){
		$this->session->set_flashdata('msg', '<div class="alert alert-success"> <i class="fa fa-check"></i> Berhasil Ubah Data</div>');
	}
	
	function setHapusData(){
		$this->session->set_flashdata('msg', '<div class="alert alert-success"> <i class="fa fa-check"></i>Berhasil Hapus Data</div>');
	}
	
	function showFlashMsg(){
		if ($this->session->flashdata('msg')) {
        	echo $this->session->flashdata('msg');
		}
	}
	
	public function showError($error){
		if(strlen($error) > 0){
			echo '<div class="alert alert-danger"> '.$error.'</div>';
		}
	}

	// ===================================================================================================
	public function cek_ip_view($kanal,$id,$ip,$tipe)
	{
	    $query = $this->db->query(" SELECT
	                                    A.*
	                                FROM
	                                    tbl_view A
	                                WHERE
	                                    type_visit  = '$tipe'
	                                    AND
	                                    place_visit = '$kanal'
	                                    AND
	                                    place_id    = '$id'
	                                    AND
	                                    session_ip  = '$ip'
	                                LIMIT
	                                    1
	                                    ")->num_rows();
	    return $query;
	}

	public function set_news_emot($tbl,$kanal,$id,$field)
	{

	    $object = array(
	    			$field => $field + 1,
	    );

	    $query = $this->db->update($tbl, $object, array($kanal.'_id' => $id));

	    return $query;
	}

	public function set_tbl_view($object)
	{
		$this->db->insert('tbl_view', $object);

        return $this->db->insert_id();
	}

	public function get_jumlah_emot($tbl,$id,$field,$kanal)
	{

		$query = $this->db->get_where($tbl, array($kanal.'_id' => $id))->row();

	    return $query;
	}
	
	
	
}
?>