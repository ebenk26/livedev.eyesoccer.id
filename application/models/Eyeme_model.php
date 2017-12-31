<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH.'models/Master_model.php');

class Eyeme_model extends Master_model
{

	public function get_all_member()
	{
		$query = $this->db->get('tbl_member');

		return $query->result();
	}

	public function get_member($id)
	{
		$this->db->from('tbl_member')
				->where('id_member', $id);

		$query = $this->db->get();
		return $query->result();
	}	

	public function get_all_konten()
	{
		$query = $this->db->query("	SELECT
										A.id_member,
										A.id,
										A.gambar,
										A.base,
										A.keterangan,
										A.suka,
										A.komentar,
										A.created_date,
										B.name,
										B.foto
									FROM
										tbl_eyeme A
									LEFT JOIN
										tbl_member B on B.id_member = A.id_member
									WHERE 
										A.id != ''
									ORDER BY 
										A.id DESC
								")->result_array();
//var_dump($query);exit();
		return $query;
	}

	public function get_konten($id)
	{
		$this->db->from('tbl_eyeme')
				->where('id', $id)
				->order_by('id', 'desc');

		$query = $this->db->get();
		return $query->result_array();
	}

	public function get_all_komentar()
	{
		$this->db->from('tbl_komentar');

		$query = $this->db->get();
		return $query->result();
	}

	public function get_komentar($id_eyeme)
	{
		$query = $this->db->query("	SELECT
										A.id_member,
										A.isi,
										A.created_date,
										B.id as id_eyeme,
										C.name
									FROM
										tbl_komentar A
									LEFT JOIN
										tbl_eyeme B on B.id = A.id_eyeme
									LEFT JOIN
										tbl_member C on C.id_member = B.id_member
									WHERE
										A.id_eyeme = ".$id_eyeme."
								")->result_array();
		// var_dump($query);exit();
		return $query;
	}

	public function add_komentar($data)
	{
		$this->db->insert('tbl_komentar', $data);
		return $this->db->insert_id();
	}

	public function add_suka($data)
	{//var_dump($data['id_eyeme']);exit();
		$this->db->insert('tbl_suka', $data);

		return $this->db->insert_id();
	}

	public function count_suka($id_eyeme)
	{
		$this->db->like('id_eyeme', $id_eyeme);
		$this->db->from('tbl_suka');
		$query = $this->db->count_all_results();

		return $query;
	}

	public function update_eyeme($id_eyeme,$count_like)
	{
		$object 	= array('suka'=>$count_like);
		$this->db->where('id', $id_eyeme);
		$this->db->update('tbl_eyeme', $object);
	}

	public function friends($id_user)
	{
	// { var_dump($id_user);exit();
		
		$query = $this->db->query("	SELECT
										*
									FROM
										tbl_friend
									WHERE
										id_pengajak = ".$id_user."
								")->result_array();
		return $query;
	}
	/**
	  *function to get profile user
	  *@param $id_or_username in url
	
	*/
	public function getProfile($id_or_username){

		
		$this->db->where('id_member',$id_or_username);
		$this->db->or_where('username',$id_or_username);

		$get  = $this->db->get('me_profile');
		if(count($get->num_rows()) > 0 ) {
			$result = $get->result();

		}
		else {$result = array();}
		return $result;

	}
	public function getWhereIn($tbl,$where, $inArr=array()){

		$this->db->where_in($where,$inArr);
		$res = $this->db->get($tbl);
		return $res;



	}
	public function like($id_img){
		$checkLike = $this->getAll('me_like',array('id_img'=> $id_img));
		return $checkLike;

	}
	/**
		*@param $id_member = member has login
		*function getImgFollowing to get img who following by member

		

	*/
	public function getImgFollowing($id_member){
		$query = "SELECT 
					a.id_img,
					a.img_caption,
					a.id_member,
					a.img_name,
					a.img_thumb,
					a.img_alt,
					a.last_update,
					a.date_create,
					b.display_picture,
					b.username

				 FROM me_img  as a 
				 LEFT JOIN me_profile as b 
				 ON a.id_member = b.id_member  
				 WHERE  a.id_member IN
				 (SELECT id_following from me_follow where id_member = $id_member) AND active='1' ";
		$res = $this->db->query($query);

		if(count($res) > 0 ){
			$return = $res->result();

		}
		else {
			$return = array();

		}
		return $return;

	}
	/**
	*@param $id_img id dari gambar yang dikomen
	*@param $limit array, array[0] =offset array[1] = limit

		getComment function untuk mengambil komentar

	*/
	public function getComment($id_img,$limit=array()){
		$query = "  SELECT 
						a.id_comment,
						a.id_member,
						a.id_img,
						a.comment,
						a.date_create,
						a.last_update,
						b.display_picture,
						b.username
					FROM me_comment AS a
					INNER JOIN me_profile AS b
					ON a.id_member=b.id_member
					WHERE a.id_img = $id_img
					ORDER BY last_update
					ASC
						 ";
		$query  = ($limit == null || !is_array($limit) ? $query: $query.'LIMIT '. $limit[0].','.$limit[1]);

		$res    = $this->db->query($query);
		$res    = $res->result();

		return $res;


	}
	public function getLike($id_img){

		$query = "SELECT 
					a.id_like,
					a.id_member,
					a.id_img,
					a.last_update,
					b.username,
					b.display_picture
				  FROM me_like as a
				  INNER JOIN me_profile as b
				  ON a.id_member = b.id_member
				  WHERE id_img = $id_img";

		$res   = $this->db->query($query);
		$res   = $res->result();
		return $res; 

	}
	/**
	*function checkFollowed melihat kondisi apakah member telah follow akun 
	*@param id_member = id member has login
	*@param id_follow = id user yang di follow
	

	*/
	public function checkFollowed($id_member,$id_follow){
		$where    = array('id_member' => $id_member,
						'id_following'   => $id_follow);
		$find     = $this->getAll('me_follow',$where);
		if(count($find) > 0){
			return TRUE;
		}
		else return FALSE;



	}
	public function follow($id_member,$id_friend){
		$data      = array('id_member'=> $id_member,
							'id_following' => $id_friend,
							'last_update'  => $this->now);

		$exe       = $this->db->insert('me_follow',$data);
		return $exe;

	}
	public function addComment($data= array()){
		$insert = $this->db->insert('me_comment',$data);
		if($insert == TRUE){

			return TRUE;
		}
		else return FALSE;
	}
	#public function rm($arr)
	public function rm($tbl,  $where = array() ){
		if(is_array($where)){

			foreach($where as $k => $v){
				$this->db->where($k,$v);
			}

		}
		$exe  = $this->db->delete($tbl);
		if($exe == TRUE){

			echo 'success';


		}
		else{
			echo 'Faile';
		}
	}

	/*public function unlike($arr = array()){

		if(is_array($arr)){

			foreach($id as $k => $v){
				$this->db->where($k,$v)
			}


		}
		#$this->db->where('id_like'=> $id_img);
		$exe = $this->db->delete('me_like');
		if($exe == TRUE){


			echo 'success';


		}
		else{
			echo 'false';
		}
	}*/

}

/* End of file Eyeme_model.php */
/* Location: ./application/models/Eyeme_model.php */