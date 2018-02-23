<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Eyeprofile extends CI_Controller {

	public function __construct(){
        parent::__construct();
		   // $this->load->model('Eyemarket_model');
			date_default_timezone_set('Asia/Jakarta');
			$this->load->model('Master_model','mod');
			$this->load->model('Eyeprofile_model','pmod');
			$this->load->model('Eyeprofile_model');
			$this->load->model('Home_model');
			$this->load->helper(array('form','url','text','date'));
			$this->load->helper('my');
    }
	
	public function index()
	{
		$data["meta"]["title"]="";
		$data["meta"]["image"]=base_url()."/assets/img/tab_icon.png";
		$data["meta"]["description"]="Website dan Social Media khusus sepakbola terkeren dan terlengkap dengan data base seluruh stakeholders sepakbola Indonesia";		
		$data["page"]="eyeprofile";		
		
		$data['club_header'] = $this->Eyeprofile_model->get_club_header();
		$data['club_main'] = $this->Eyeprofile_model->get_club_main();
		$data['profile_club'] = $this->Eyeprofile_model->get_profile_club();
		$data['jumlah_klub'] = $this->Eyeprofile_model->get_jumlah_klub();
		$data['jumlah_pemain'] = $this->Eyeprofile_model->get_jumlah_pemain();
		$data['pemain_asing'] = $this->Eyeprofile_model->get_pemain_asing();
		$data['klasemen'] = $this->Eyeprofile_model->get_klasemen();
		$data['transfer_pemain'] = $this->Eyeprofile_model->get_transfer_pemain();
		$data['pencetak_gol'] = $this->Eyeprofile_model->get_pencetak_gol();
		$data['kompetisi'] = $this->Eyeprofile_model->get_kompetisi();

		$data['kanal'] 				= "home";
		$data["body"]=$this->load->view('eyeprofile/index', $data,true);
		$this->load->view('template/static',$data);
	}	
	
	public function klub($liga=null, $page=1)
	{
		if($liga==null){
			$liga = "Liga%20Indonesia%201";
		}
		$data["meta"]["title"]="";
		$data["meta"]["image"]=base_url()."/assets/img/tab_icon.png";
		$data["meta"]["description"]="Website dan Social Media khusus sepakbola terkeren dan terlengkap dengan data base seluruh stakeholders sepakbola Indonesia";
		$data["liga"]=$liga;		
		$data["page"]=$page;
		$jml_klub = null;
		$nama_liga = urldecode($liga);
		$data["title_liga"] = $nama_liga;
		$nama_liga_event = 'Go-Jek Traveloka Liga 1 - 2017';
		$above_datetime = '2017-12-29 00:00:00';
		$cat_liga = null;
		if($nama_liga == 'Liga Indonesia 1'){
			$jml_klub = 18;	
		}else if($nama_liga == 'Liga Indonesia 2'){
			$jml_klub = 24;
			$data["title_liga"] = $nama_liga;
			$nama_liga_event = 'Liga 2 Go-Jek Traveloka - Play Off';
		}else if($nama_liga == 'Liga Indonesia 3'){
			$data["title_liga"] = $nama_liga;
			$nama_liga_event = 'Liga Indonesia 3 Wilayah Jawa Barat';
		}else if($nama_liga == 'Liga Pelajar U-16 Piala Menpora'){
			$data["title_liga"] = $nama_liga;
			$nama_liga_event = 'Liga Pelajar U-16 Piala Menpora';
			$cat_liga = $nama_liga;
			$nama_liga = "Liga Usia Muda";
		}else if($nama_liga == 'Liga Santri Nusantara'){
			$data["title_liga"] = $nama_liga;
			$nama_liga_event = 'Liga Santri Nusantara';
			$cat_liga = $nama_liga;
			$nama_liga = "Liga Usia Muda";
		}else if($nama_liga == 'Liga Indonesia U-19'){
			$data["title_liga"] = $nama_liga;
			$nama_liga_event = 'Liga Indonesia U-19';
			$cat_liga = $nama_liga;
			$nama_liga = "Liga Usia Muda";
		}else if($nama_liga == 'Indonesia Junior League U-9'){
			$data["title_liga"] = $nama_liga;
			$nama_liga_event = 'Indonesia Junior League U-9';
			$cat_liga = $nama_liga;
			$nama_liga = "Liga Usia Muda";
		}else if($nama_liga == 'Indonesia Junior League U-11'){
			$data["title_liga"] = $nama_liga;
			$nama_liga_event = 'Indonesia Junior League U-11';
			$cat_liga = $nama_liga;
			$nama_liga = "Liga Usia Muda";
		}
		$data['club_main'] = $this->Eyeprofile_model->get_club_liga($nama_liga,$jml_klub,$cat_liga);
		$data['avg_year'] = $this->Eyeprofile_model->get_club_liga_avggyear($nama_liga,$jml_klub,$cat_liga);
		$data['get_jadwal_tomorrow_1'] = $this->Eyeprofile_model->get_jadwal_tomorrow_1($above_datetime,$nama_liga_event);
		$data['get_jadwal_tomorrow_2'] = $this->Eyeprofile_model->get_jadwal_tomorrow_2($above_datetime,$nama_liga_event);
		$data['get_jadwal_tomorrow_3'] = $this->Eyeprofile_model->get_jadwal_tomorrow_3($above_datetime,$nama_liga_event);
		$data['transfer_pemain'] = $this->Eyeprofile_model->get_transfer_pemain($nama_liga);
		$data['pencetak_gol'] = $this->Eyeprofile_model->get_pencetak_gol($nama_liga);	
		$data['get_all_kompetisi'] = $this->Eyeprofile_model->get_all_kompetisi();		
		$data['get_all_liga'] = $this->Eyeprofile_model->get_all_liga();		
		$data['get_player_liga'] = $this->Eyeprofile_model->get_player_liga($nama_liga,'indonesia',$cat_liga);		
		$data['get_player_liga_strange'] = $this->Eyeprofile_model->get_player_liga_strange($nama_liga,'indonesia',$cat_liga);		
		
		$data['kanal'] 				= "home";
		$data["body"]=$this->load->view('eyeprofile/klub', $data, true);
		$this->load->view('template/static',$data);		
	}
	
	public function pemain($liga=null)
	{
		if($liga==null){
			$liga = "Liga%20Indonesia%201";
		}
		//$this->load->view('eyeprofile/pemain');
		$data["meta"]["title"]="";
		$data["meta"]["image"]=base_url()."/assets/img/tab_icon.png";
		$data["meta"]["description"]="Website dan Social Media khusus sepakbola terkeren dan terlengkap dengan data base seluruh stakeholders sepakbola Indonesia";		
		$data["page"]="eyeprofile";		
		$nama_subliga = "";
		$jml_klub = null;
		$nama_liga = urldecode($liga);
		$cat_liga = null;
		if($this->uri->segment(4)){
			$nama_liga = urldecode($this->uri->segment(4));
			$nama_subliga = urldecode($this->uri->segment(4));
		}
		$data["title_liga"] = urldecode($liga);
		if($nama_liga == 'Liga Indonesia 1'){
			$jml_klub = 18;	
		}else if($nama_liga == 'Liga Indonesia 2'){
			$jml_klub = 24;
			$data["title_liga"] = urldecode($liga);
			$nama_liga_event = 'Liga 2 Go-Jek Traveloka - Play Off';
		}else if($nama_liga == 'Liga Indonesia 3'){
			$data["title_liga"] = urldecode($liga);
			$nama_liga_event = 'Liga Indonesia 3 Wilayah Jawa Barat';
		}else if($nama_liga == 'Liga Pelajar U-16 Piala Menpora'){
			$data["title_liga"] = urldecode($liga);
			$nama_liga_event = 'Liga Pelajar U-16 Piala Menpora';
			$cat_liga = $nama_liga;
			$nama_liga = "Liga Usia Muda";
		}else if($nama_liga == 'Liga Santri Nusantara'){
			$data["title_liga"] = urldecode($liga);
			$nama_liga_event = 'Liga Santri Nusantara';
			$cat_liga = $nama_liga;
			$nama_liga = "Liga Usia Muda";
		}else if($nama_liga == 'Liga Indonesia U-19'){
			$data["title_liga"] = urldecode($liga);
			$nama_liga_event = 'Liga Indonesia U-19';
			$cat_liga = $nama_liga;
			$nama_liga = "Liga Usia Muda";
		}
		
		// $data['kompetisi_pro'] = $this->Eyeprofile_model->get_kompetisi_pro();
		$data['get_all_kompetisi'] = $this->Eyeprofile_model->get_all_kompetisi();
		$data['get_all_liga'] = $this->Eyeprofile_model->get_all_liga();
		// $data['pemain_klub'] = $this->Eyeprofile_model->get_pemain_klub();

		$data['club_main'] = $this->Eyeprofile_model->get_club_liga($nama_liga,$jml_klub,$cat_liga);
		$data['get_player_liga'] = $this->Eyeprofile_model->get_player_liga($nama_liga,'indonesia',$cat_liga);
		$data['get_player_liga_strange'] = $this->Eyeprofile_model->get_player_liga_strange($nama_liga,'indonesia',$cat_liga);		
		$data['kanal'] = "home";
		$data['nama_subliga'] = $nama_subliga;
		
		$data["body"]=$this->load->view('eyeprofile/pemain', $data, true);
		$this->load->view('template/static',$data);		
	}
	
	public function pemain_detail($id=''){
		if($id=="")
		{
			redirect("eyeprofile/pemain");			
		}

		
		$data["meta"]["title"]  ="";
		$data["meta"]["image"]  =base_url()."/assets/img/tab_icon.png";
		$data["meta"]["description"]="Website dan Social Media khusus sepakbola terkeren dan terlengkap dengan data base seluruh stakeholders sepakbola Indonesia";
		
		#$data["page"]="eyeprofile";
		$data["pid"]   = $id;

		$url  = $this->config->item('api_url')."profile/{$id}";
		$cred = $this->config->item('credential');

		$event_data	= array(
							'startdate' => '',
							'enddate' => '',
							'related' => true,
		);
		$obj      = $this->excurl->remoteCall($url,$cred,$event_data);

		$response = json_decode($obj);

		

		$data["kanal"] = 'eyeprofile';
		$data['res']   = $response->data;
		$data['body']  = $this->load->view('eyeprofile/pemain_detail',$data,true);
		
		$this->load->view('template/static',$data);	


		/*$data['club_header'] = $this->Eyeprofile_model->get_club_header();
		$data['club_main'] = $this->Eyeprofile_model->get_club_main();
		$data['profile_club'] = $this->Eyeprofile_model->get_profile_club();
		$data['jumlah_klub'] = $this->Eyeprofile_model->get_jumlah_klub();
		$data['jumlah_pemain'] = $this->Eyeprofile_model->get_jumlah_pemain();
		$data['pemain_asing'] = $this->Eyeprofile_model->get_pemain_asing();
		$data['klasemen'] = $this->Eyeprofile_model->get_klasemen();
		$data['transfer_pemain'] = $this->Eyeprofile_model->get_transfer_pemain();
		$data['pencetak_gol'] = $this->Eyeprofile_model->get_pencetak_gol();
		$data['kompetisi'] = $this->Eyeprofile_model->get_kompetisi();				
		$data['karir_player'] = $this->Eyeprofile_model->get_karir_player();				
		
		$data['kanal'] = "home";
		$this->load->view('config-session',$data);
		$data["body"]=$this->load->view('eyeprofile/pemain_detail', $data, true);
		$data['body'] = $this->load->view('eyeprofile/pemain_detail',$data,true);*/
			
	}
	public function response_api($id){
		$url  = $this->config->item('api_url')."profile/{$id}";
		$cred = $this->config->item('credential');

		$event_data	= array(
							'startdate' => '',
							'enddate' => '',
							'related' => true,
		);
		$mod  = $this->excurl->remoteCall($url,$cred,$event_data);
		$decode  = json_decode($mod);
		p($decode);


		#echo  $url;

	}
	public function official($liga=null)
	{
		if($liga==null){
			$liga = "Liga%20Indonesia%201";
		}
		$jml_klub = null;
		$nama_liga = urldecode($liga);
		$data["title_liga"] = $nama_liga;
		if($nama_liga == 'Liga Indonesia 1'){
			$jml_klub = 18;	
		}else if($nama_liga == 'Liga Indonesia 2'){
			$nama_liga = 'Liga Indonesia 2';
			$jml_klub = 24;
			$data["title_liga"] = $nama_liga;
		}
		
		// $data['kompetisi_pro'] = $this->Eyeprofile_model->get_kompetisi_pro();
		$data['get_all_kompetisi'] = $this->Eyeprofile_model->get_all_kompetisi();
		$data['pemain_klub'] = $this->Eyeprofile_model->get_pemain_klub();

		$data['club_main'] = $this->Eyeprofile_model->get_club_liga($nama_liga,$jml_klub);
		$data['get_player_liga'] = $this->Eyeprofile_model->get_player_liga($nama_liga,'indonesia');
		$data['get_player_liga_strange'] = $this->Eyeprofile_model->get_player_liga_strange($nama_liga);		
		$data['kanal'] = "home";
		
		$data['kanal'] = "home";
		$data["body"]=$this->load->view('eyeprofile/official', $data, true);
		$this->load->view('template/static',$data);		
	}	

	public function official_detail($url=null,$action=null){
		if($url=="")
		{
			redirect("eyeprofile/official");
			
		}			
		$data["meta"]["title"]="";
		$data["meta"]["image"]=base_url()."/assets/img/tab_icon.png";
		$data["meta"]["description"]="Website dan Social Media khusus sepakbola terkeren dan terlengkap dengan data base seluruh stakeholders sepakbola Indonesia";

		$data["page"]="eyeprofile";
		$data['get_official_detail'] = $this->Eyeprofile_model->get_official_detail($url);
		$data['kanal'] = "home";
		$this->load->view('config-session',$data);
		$data["body"]=$this->load->view('eyeprofile/official_detail', $data, true);
		$this->load->view('template/static',$data);
	}
	
	public function supporter($liga=null)
	{
		if($liga==null){
			$liga = "Liga%20Indonesia%201";
		}
		if(urldecode($liga) == 'Liga Indonesia 1'){
			$nama_liga = 'Liga Indonesia 1';
			$jml_klub = 18;	
			$data["title_liga"] = $nama_liga;
		}else if(urldecode($liga) == 'Liga Indonesia 2'){
			$nama_liga = 'Liga Indonesia 2';
			$jml_klub = 24;
			$data["title_liga"] = $nama_liga;
		}else{
			$nama_liga = 'Liga Indonesia 3';
			$jml_klub = 32;
			$data["title_liga"] = $nama_liga;
		}
		
		// $data['kompetisi_pro'] = $this->Eyeprofile_model->get_kompetisi_pro();
		$data['get_all_kompetisi'] = $this->Eyeprofile_model->get_all_kompetisi();
		$data['pemain_klub'] = $this->Eyeprofile_model->get_pemain_klub();

		$data['club_main'] = $this->Eyeprofile_model->get_club_liga($nama_liga,$jml_klub);
		$data['get_player_liga'] = $this->Eyeprofile_model->get_player_liga($nama_liga,'indonesia');
		$data['get_player_liga_strange'] = $this->Eyeprofile_model->get_player_liga_strange($nama_liga);		
		$data['kanal'] = "home";
		$data["body"]=$this->load->view('eyeprofile/supporter', $data, true);
		$this->load->view('template/static',$data);		
	}	
	
	public function referee($liga=null)
	{
		if($liga==null){
			$liga = "Liga%20Indonesia%201";
		}
		if(urldecode($liga) == 'Liga Indonesia 1'){
			$nama_liga = 'Liga Indonesia 1';
			$jml_klub = 18;	
			$data["title_liga"] = $nama_liga;
		}else if(urldecode($liga) == 'Liga Indonesia 2'){
			$nama_liga = 'Liga Indonesia 2';
			$jml_klub = 24;
			$data["title_liga"] = $nama_liga;
		}else{
			$nama_liga = 'Liga Indonesia 3';
			$jml_klub = 32;
			$data["title_liga"] = $nama_liga;
		}
		
		$data['kompetisi_pro'] = $this->Eyeprofile_model->get_kompetisi_pro();
		$data['pemain_klub'] = $this->Eyeprofile_model->get_pemain_klub();

		$data['club_main'] = $this->Eyeprofile_model->get_club_liga($nama_liga,$jml_klub);
		$data['get_player_liga'] = $this->Eyeprofile_model->get_player_liga($nama_liga,'indonesia');
		$data['get_player_liga_strange'] = $this->Eyeprofile_model->get_player_liga_strange($nama_liga);		
		$data['kanal'] = "home";
		$data["body"]=$this->load->view('eyeprofile/referee', $data, true);
		$this->load->view('template/static',$data);		
	}
	
	public function get_list_pemain($liga){
		$requestData= $_REQUEST;
		$res = $this->Eyeprofile_model->get_list_pemain($requestData,urldecode($liga));
		return $res;
	}
	
	public function get_list_official($liga){
		$requestData= $_REQUEST;
		$res = $this->Eyeprofile_model->get_list_official($requestData,urldecode($liga));
		return $res;
	}
	
	public function getClub($url,$limit=null){
		$val = $_POST["val"];
		$val = $val-1;
		$limitnum = 12*$val;
		$liga = urldecode($url);
		if($liga != 'Liga Pelajar U-16 Piala Menpora' && $liga != 'Liga Santri Nusantara' && $liga != 'Liga Indonesia U-19'&& $liga != 'Indonesia Junior League U-9'&& $liga != 'Indonesia Junior League U-11'){
			$compt = "and a.competition='".$liga."'";
		
			if($liga == 'non liga'){
				$compt = "and a.competition in('SSB / Akademi Sepakbola')";
			}
		}else{
			$compt = "and d.nama_liga ='".$liga."'";
		}
		
		$query = $this->db->query("SELECT a.club_id,a.name as nama_club,a.logo as logo_club,competition,count(c.player_id) as squad,a.url
									FROM tbl_club a
									LEFT JOIN tbl_player c on a.club_id = c.club_id
									LEFT JOIN tbl_liga d on a.id_liga = d.id_liga
									WHERE a.name not in ('ebenktestlagijgndidelete') and a.active = 1 ".$compt."
									GROUP BY a.name ASC limit ".$limitnum.",12")->result_array();
		// print_r ($query);
		
		echo "<div class='ep2box fl-l pd-t-20'>";		
				foreach($query as $main){
				echo '<a href="'.base_url().'eyeprofile/klub_detail/'.$main['url'].'" style="text-decoration:unset;color:#424242;">'.'<div class="box-content ep2 fl-l">';
							if($main['logo_club'] == ""){
								$main['logo_club'] = "7288LOGO UNTUK APLIKASI.jpg";
							}
						echo '<img src="'.imgUrl().'/systems/club_logo/'.$main['logo_club'].'" alt="">';
						echo '<div class="detail">';
							echo '<h2>'.$main['nama_club'].'</h2>';
							echo '<h3>'.$main['competition'].'</h3>';
							echo "<table>
								<tr>
									<td>Squad</td>";
									echo "<td>: ".$main['squad']."</td>";
								echo "</tr>
								<tr>";
									echo "<td>Manager</td>";
									echo "<td>: ".getManager($main['club_id'])."</td>";
								echo "</tr>
							</table>
						</div>
					</div>
				</a>";
				}
            echo "</div>";
	}
	
	public function get_list_karir_klub($klub_id){
		$requestData= $_REQUEST;
		$res = $this->Eyeprofile_model->get_list_karir_klub($requestData,urldecode($klub_id));
		return $res;
	}
}
