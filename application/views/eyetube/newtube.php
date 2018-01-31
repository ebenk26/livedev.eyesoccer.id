
<div class="container bluehover">
<div class="col-lg-12 col-md-12">
<div class="hidden-md hidden-lg"><img src="<?=base_url()?>systems/eyeads_storage/<?php print $array[3][3]; ?>" class="img img-responsive" style="padding-top:10px;padding-left:5px;padding-right:5px;"></div>
<h4 id="t100" style="padding-top:20px;"><i class="fa fa-play-circle-o fa-lg"></i> EYETUBE</h4></div>
</div>

<div class="container bluehover">
<div class="col-lg-8 col-md-8">
<div class="row">

<div class="col-lg-12 col-md-12">
  <div id="myCarousel1" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
     <?php
		$cmd11=$this->db->query("select * from tbl_eyetube where eyetube_id order by eyetube_id desc limit 0,4");
		$active="1";
		foreach($cmd11->result_array() as $row11){
		  if($active=="1")
		  {
			$active="active";
		  }
		  else{
			$active="";
		  }
echo '<div class="item '.$active.'" >
<div class="set100">
      <a href="'.base_url().'eyetube/detail/'.$row11['eyetube_id'].'">
        <img src="'.base_url().'systems/eyetube_storage/'.$row11['thumb'].'" class="img-polaroid thumbnail2" alt="Lights" style="width:100% !important;margin: 0 auto;">
      </a>
    </div>
</div>';
}
?>
    </div>
  </div> 
</div>

<div class="col-lg-12 col-md-12"><br>
<ul class="nav nav-tabs nav-justified">
  <li class="active mytab1"><a data-toggle="tab" hreff="#mn100" class="mytab" totab="mytab1">JADWAL</a></li>
  <li class="mytab1"><a data-toggle="tab" hreff="#mn101" class="mytab" totab="mytab1">LIVE</a></li>
  <li class="mytab1"><a data-toggle="tab" hreff="#mn102" class="mytab" totab="mytab1">HASIL</a></li>
  <li class="mytab1"><a data-toggle="tab" hreff="#mn103" class="mytab" totab="mytab1">KLASEMEN</a></li>
</ul> 
<div class="tab-content">
  <div id="mn100" class="tab-pane fade in active mytab1"><br>
  <div class="dropdown">
  <button class="btn btn-primary dropdown-toggle btn btn-block dropclick" todrop="mydropdown" type="button" data-toggle="dropdown" style="background:#F5E934;border:solid #F5E934 1px;border-radius:0px;color:#3d3d3d;cursor:pointer" id="t103">PILIH KOMPETISI LIGA&ensp;
  <span class="caret" style="float:right;margin-top:8px;"></span></button>
  <ul class="dropdown-menu dropdown-menu-left mydropdown" style="cursor:pointer;">
    <li><a data-target="#myCarousel2" data-slide-to="0" class="active mydroplist" todrop="mydropdown">LIGA 1 INDONESIA</a></li>
    <li><a data-target="#myCarousel2" data-slide-to="1" class="mydroplist" todrop="mydropdown">LIGA INGGRIS</a></li>
    <li><a data-target="#myCarousel2" data-slide-to="2" class="mydroplist" todrop="mydropdown">LIGA SPANYOL</a></li>
    <li><a data-target="#myCarousel2" data-slide-to="3" class="mydroplist" todrop="mydropdown">LIGA JERMAN</a></li>
    <li><a data-target="#myCarousel2" data-slide-to="4" class="mydroplist" todrop="mydropdown">LIGA ITALY</a></li>
	<li><a data-target="#myCarousel2" data-slide-to="5" class="mydroplist" todrop="mydropdown">LIGA PERANCIS</a></li>	
  </ul>
  </div>    
  <div id="myCarousel2" class="carousel slide" data-ride="carousel" data-interval="false">
  <div class="carousel-inner">
    <div class="item active">
    <div style="background:#273746;padding:10px;color:#ffffff;" class="text-center" id="t103">LIGA 1 INDONESIA</div><br>
	<div id="bbm">
    <?php
	
    $jadwal=$this->db->query("SELECT a.*,c.club_id as club_id_a,d.club_id as club_id_b,c.logo as logo_a,d.logo as logo_b,c.name as club_a,d.name as club_b FROM tbl_jadwal_event a LEFT JOIN tbl_event b ON b.id_event=a.id_event INNER JOIN tbl_club c ON c.club_id=a.tim_a INNER JOIN tbl_club d ON d.club_id=a.tim_b where b.title like '%Liga 1%' AND a.jadwal_pertandingan>='".date("Y-m-d H:i:s")."' order by jadwal_pertandingan ASC");
	
$jdpertandingan="";
if($jadwal->num_rows()<1)
{
	echo ' <h5 class="text-center" id="t104">Belum ada Jadwal Pertandingan lainnya</h5>';
}
foreach($jadwal->result_array() as $data){

    print '
    <div style="background:#273764;padding:5px;color:#ffffff;" class="text-center" id="t104">'.date("d M Y",strtotime($data["jadwal_pertandingan"])).' | '.$data["lokasi_pertandingan"].'</div>
    <div style="padding-top:10px;"></div>
    <div class="col-xs-12">
    <div class="col-xs-5 text-right" style="padding:0px;">
    <div class="media">
	<div class="media-body"><small>'.$data["club_a"].'</small></div>
      <div class="media-right" style="padding:0px;">
        <img src="'.base_url().'systems/club_logo/'.$data["logo_a"].'" class="media-object" style="width:35px;height:35px;">
      </div>
    </div>     
    </div>
	
    <div class="col-xs-2" style="text-align: center;padding: 0px; background:#cccccc; ">
	<b><small>'.date("H:i",strtotime($data["jadwal_pertandingan"])).' WIB</small></b>	
	</div>
    <div class="col-xs-5" style="padding:0px;">
    <div class="media">
    <div class="media-left">
      <img src="'.base_url().'systems/club_logo/'.$data["logo_b"].'" class="media-object" style="width:35px;height:35px;">
    </div>
    <div class="media-body"><small>'.$data["club_b"].'</small></div>
    </div>     
    </div>	
    </div><div style="clear:left;"></div><br>';
	
    }
    ?>
	</div>
    </div>
    <div class="item">
    <div style="background:#273746;padding:10px;color:#ffffff;" class="text-center" id="t103">LIGA INGGRIS</div><br>
	<div id="bbm">
     <?php
	
    $jadwal=$this->db->query("SELECT a.*,c.club_id as club_id_a,d.club_id as club_id_b,c.logo as logo_a,d.logo as logo_b,c.name as club_a,d.name as club_b FROM tbl_jadwal_event a LEFT JOIN tbl_event b ON b.id_event=a.id_event INNER JOIN tbl_club c ON c.club_id=a.tim_a INNER JOIN tbl_club d ON d.club_id=a.tim_b where b.title like '%English Premier League%' AND a.jadwal_pertandingan>='".date("Y-m-d H:i:s")."' order by jadwal_pertandingan ASC");
	
	$jdpertandingan="";
	if($jadwal->num_rows()<1)
	{
		echo ' <h5 class="text-center" id="t104">Belum ada Jadwal Pertandingan lainnya</h5>';
	}
	foreach($jadwal->result_array() as $data){
    print '
    <div style="background:#273764;padding:10;color:#ffffff;" class="text-center" id="t104">'.date("d M Y",strtotime($data["jadwal_pertandingan"])).' | '.$data["lokasi_pertandingan"].'</div>
    <div style="padding-top:10px;"></div>
    <div class="col-xs-12">
    <div class="col-xs-5 text-right" style="padding:0px;">
    <div class="media">
	<div class="media-body"><small>'.$data["club_a"].'</small></div>
      <div class="media-right">
        <img src="'.base_url().'systems/club_logo/'.$data["logo_a"].'" class="media-object" style="width:35px;height:35px;">
      </div>
    </div>     
    </div>
	
    <div class="col-xs-2" style="text-align:center; padding: 0px; background:#cccccc; ">
	<b><small>'.date("H:i",strtotime($data["jadwal_pertandingan"])).' WIB</small></b>	
	</div>
    <div class="col-xs-5" style="padding:0px;">
    <div class="media">
    <div class="media-left">
      <img src="'.base_url().'systems/club_logo/'.$data["logo_b"].'" class="media-object" style="width:35px;height:35px;">
    </div>
    <div class="media-body"><small>'.$data["club_b"].'</small></div>
    </div>     
    </div>	
    </div><br><br>';
    }
    ?>
	</div>
    </div>
    <div class="item">
    <div style="background:#273746;padding:10px;color:#ffffff;" class="text-center" id="t103">LIGA SPANYOL</div><br>
	<div id="bbm">
   <?php
	
    $jadwal=$this->db->query("SELECT a.*,c.club_id as club_id_a,d.club_id as club_id_b,c.logo as logo_a,d.logo as logo_b,c.name as club_a,d.name as club_b FROM tbl_jadwal_event a LEFT JOIN tbl_event b ON b.id_event=a.id_event INNER JOIN tbl_club c ON c.club_id=a.tim_a INNER JOIN tbl_club d ON d.club_id=a.tim_b where b.title like '%Spanish%' AND a.jadwal_pertandingan>='".date("Y-m-d H:i:s")."' order by jadwal_pertandingan ASC");
	
$jdpertandingan="";
if($jadwal->num_rows()<1)
{
	echo ' <h5 class="text-center" id="t104">Belum ada Jadwal Pertandingan lainnya</h5>';
}
foreach($jadwal->result_array() as $data){

    print '
    <div style="background:#273764;padding:10;color:#ffffff;" class="text-center" id="t104">'.date("d M Y",strtotime($data["jadwal_pertandingan"])).' | '.$data["lokasi_pertandingan"].'</div>
    <div style="padding-top:10px;"></div>
    <div class="col-xs-12">
    <div class="col-xs-5 text-right" style="padding:0px;">
    <div class="media">
	<div class="media-body"><small>'.$data["club_a"].'</small></div>
      <div class="media-right">
        <img src="'.base_url().'systems/club_logo/'.$data["logo_a"].'" class="media-object" style="width:35px;height:35px;">
      </div>
    </div>     
    </div>
	
    <div class="col-xs-2" style="text-align:center; padding: 0px; background:#cccccc; ">
	<b><small>'.date("H:i",strtotime($data["jadwal_pertandingan"])).' WIB</small></b>	
	</div>
    <div class="col-xs-5" style="padding:0px;">
    <div class="media">
    <div class="media-left">
      <img src="'.base_url().'systems/club_logo/'.$data["logo_b"].'" class="media-object" style="width:35px;height:35px;">
    </div>
    <div class="media-body"><small>'.$data["club_b"].'</small></div>
    </div>     
    </div>	
    </div><br><br>';
    }
    ?>
	</div>
    </div>    
    <div class="item">
    <div style="background:#273746;padding:10px;color:#ffffff;" class="text-center" id="t103">LIGA JERMAN</div><br>
	<div id="bbm">
     <?php
	
    $jadwal=$this->db->query("SELECT a.*,c.club_id as club_id_a,d.club_id as club_id_b,c.logo as logo_a,d.logo as logo_b,c.name as club_a,d.name as club_b FROM tbl_jadwal_event a LEFT JOIN tbl_event b ON b.id_event=a.id_event INNER JOIN tbl_club c ON c.club_id=a.tim_a INNER JOIN tbl_club d ON d.club_id=a.tim_b where b.title like '%bundesliga%' AND a.jadwal_pertandingan>='".date("Y-m-d H:i:s")."' order by jadwal_pertandingan ASC");
	
$jdpertandingan="";
if($jadwal->num_rows()<1)
{
	echo ' <h5 class="text-center" id="t104">Belum ada Jadwal Pertandingan lainnya</h5>';
}
foreach($jadwal->result_array() as $data){

    print '
    <div style="background:#273764;padding:10;color:#ffffff;" class="text-center" id="t104">'.date("d M Y",strtotime($data["jadwal_pertandingan"])).' | '.$data["lokasi_pertandingan"].'</div>
    <div style="padding-top:10px;"></div>
    <div class="col-xs-12">
    <div class="col-xs-5 text-right" style="padding:0px;">
    <div class="media">
	<div class="media-body"><small>'.$data["club_a"].'</small></div>
      <div class="media-right">
        <img src="'.base_url().'systems/club_logo/'.$data["logo_a"].'" class="media-object" style="width:35px;height:35px;">
      </div>
    </div>     
    </div>
	
    <div class="col-xs-2" style="text-align:center; padding: 0px; background:#cccccc; ">
	<b><small>'.date("H:i",strtotime($data["jadwal_pertandingan"])).' WIB</small></b>	
	</div>
    <div class="col-xs-5" style="padding:0px;">
    <div class="media">
    <div class="media-left">
      <img src="'.base_url().'systems/club_logo/'.$data["logo_b"].'" class="media-object" style="width:35px;height:35px;">
    </div>
    <div class="media-body"><small>'.$data["club_b"].'</small></div>
    </div>     
    </div>	
    </div><br><br>';
    }
    ?></div>
    </div>
    <div class="item">
    <div style="background:#273746;padding:10px;color:#ffffff;" class="text-center" id="t103">LIGA ITALY</div><br>
	<div id="bbm">
     <?php
	
    $jadwal=$this->db->query("SELECT a.*,c.club_id as club_id_a,d.club_id as club_id_b,c.logo as logo_a,d.logo as logo_b,c.name as club_a,d.name as club_b FROM tbl_jadwal_event a LEFT JOIN tbl_event b ON b.id_event=a.id_event INNER JOIN tbl_club c ON c.club_id=a.tim_a INNER JOIN tbl_club d ON d.club_id=a.tim_b where b.title like '%seri a%' AND a.jadwal_pertandingan>='".date("Y-m-d H:i:s")."' order by jadwal_pertandingan ASC");
	
$jdpertandingan="";
if($jadwal->num_rows()<1)
{
	echo ' <h5 class="text-center" id="t104">Belum ada Jadwal Pertandingan lainnya</h5>';
}
foreach($jadwal->result_array() as $data){

    print '
    <div style="background:#273764;padding:10;color:#ffffff;" class="text-center" id="t104">'.date("d M Y",strtotime($data["jadwal_pertandingan"])).' | '.$data["lokasi_pertandingan"].'</div>
    <div style="padding-top:10px;"></div>
    <div class="col-xs-12">
    <div class="col-xs-5 text-right" style="padding:0px;">
    <div class="media">
	<div class="media-body"><small>'.$data["club_a"].'</small></div>
      <div class="media-right">
        <img src="'.base_url().'systems/club_logo/'.$data["logo_a"].'" class="media-object" style="width:35px;height:35px;">
      </div>
    </div>     
    </div>
	
    <div class="col-xs-2" style="text-align:center; padding: 0px; background:#cccccc; ">
	<b><small>'.date("H:i",strtotime($data["jadwal_pertandingan"])).' WIB</small></b>	
	</div>
    <div class="col-xs-5" style="padding:0px;">
    <div class="media">
    <div class="media-left">
      <img src="'.base_url().'systems/club_logo/'.$data["logo_b"].'" class="media-object" style="width:35px;height:35px;">
    </div>
    <div class="media-body"><small>'.$data["club_b"].'</small></div>
    </div>     
    </div>	
    </div><br><br>';
    }
    ?>
	</div>
    </div>

<div class="item">
    <div style="background:#273746;padding:10px;color:#ffffff;" class="text-center" id="t103">LIGA PERANCIS</div><br>
	<div id="bbm">
     <?php
	
    $jadwal=$this->db->query("SELECT a.*,c.club_id as club_id_a,d.club_id as club_id_b,c.logo as logo_a,d.logo as logo_b,c.name as club_a,d.name as club_b FROM tbl_jadwal_event a LEFT JOIN tbl_event b ON b.id_event=a.id_event INNER JOIN tbl_club c ON c.club_id=a.tim_a INNER JOIN tbl_club d ON d.club_id=a.tim_b where b.title like '%Ligue 1%' AND a.jadwal_pertandingan>='".date("Y-m-d H:i:s")."' order by jadwal_pertandingan ASC");
	
$jdpertandingan="";
if($jadwal->num_rows()<1)
{
	echo ' <h5 class="text-center" id="t104">Belum ada Jadwal Pertandingan lainnya</h5>';
}
foreach($jadwal->result_array() as $data){

    print '
    <div style="background:#273764;padding:10;color:#ffffff;" class="text-center" id="t104">'.date("d M Y",strtotime($data["jadwal_pertandingan"])).' | '.$data["lokasi_pertandingan"].'</div>
    <div style="padding-top:10px;"></div>
    <div class="col-xs-12">
    <div class="col-xs-5 text-right" style="padding:0px;">
    <div class="media">
	<div class="media-body"><small>'.$data["club_a"].'</small></div>
      <div class="media-right">
        <img src="'.base_url().'systems/club_logo/'.$data["logo_a"].'" class="media-object" style="width:35px;height:35px;">
      </div>
    </div>     
    </div>
	
    <div class="col-xs-2" style="text-align:center; padding: 0px; background:#cccccc; ">
	<b><small>'.date("H:i",strtotime($data["jadwal_pertandingan"])).' WIB</small></b>	
	</div>
    <div class="col-xs-5" style="padding:0px;">
    <div class="media">
    <div class="media-left">
      <img src="'.base_url().'systems/club_logo/'.$data["logo_b"].'" class="media-object" style="width:35px;height:35px;">
    </div>
    <div class="media-body"><small>'.$data["club_b"].'</small></div>
    </div>     
    </div>	
    </div><br><br>';
    }
    ?>
	</div>
    </div>	
  </div>
  </div>
  </div> 
   
<div id="mn101" class="tab-pane fade in mytab1"><br>
  <div class="dropdown">
  <button class="btn btn-primary dropdown-toggle btn btn-block" type="button" data-toggle="dropdown" style="background:#F5E934;border:solid #F5E934 1px;border-radius:0px;color:#3d3d3d" id="t103">PILIH KOMPETISI LIGA&ensp;
  <span class="caret" style="float:right;margin-top:8px;"></span></button>
  <ul class="dropdown-menu dropdown-menu-left" style="cursor:pointer;">
    <li><a data-target="#myCarousel3" data-slide-to="0" class="active">LIGA 1 INDONESIA</a></li>
    <li><a data-target="#myCarousel3" data-slide-to="1">LIGA INGGRIS</a></li>
    <li><a data-target="#myCarousel3" data-slide-to="2">LIGA SPANYOL</a></li>
    <li><a data-target="#myCarousel3" data-slide-to="3">LIGA JERMAN</a></li>
    <li><a data-target="#myCarousel3" data-slide-to="4">LIGA ITALY</a></li>
	<li><a data-target="#myCarousel3" data-slide-to="5">LIGA PERANCIS</a></li>
  </ul>
  </div>    
  <div id="myCarousel3" class="carousel slide" data-ride="carousel" data-interval="false">
  <div class="carousel-inner">
    <div class="item active">
    <div style="background:#273746;padding:10px;color:#ffffff;" class="text-center" id="t103">LIGA 1 INDONESIA</div>
	<div id="bbm">
		<?php
		$jadwal=$this->db->query("SELECT a.*,c.club_id as club_id_a,d.club_id as club_id_b,c.logo as logo_a,d.logo as logo_b,c.name as club_a,d.name as club_b FROM tbl_jadwal_event a LEFT JOIN tbl_event b ON b.id_event=a.id_event INNER JOIN tbl_club c ON c.club_id=a.tim_a INNER JOIN tbl_club d ON d.club_id=a.tim_b where a.live_pertandingan!='' AND b.title like '%liga 1%' AND a.jadwal_pertandingan>='".date("Y-m-d H:i:s")."' order by jadwal_pertandingan ASC");
			$jdpertandingan="";
			if($jadwal->num_rows()<1)
			{
				echo ' <h5 class="text-center" id="t104">Belum ada Pertandingan Live lainnya</h5>';
			}
			foreach($jadwal->result_array() as $data){
			$jampertandingan=strtotime($data["jadwal_pertandingan"]);
			$jamsekarang=strtotime(date("Y-m-d H:i:s"));
			$pertandingan=$jamsekarang-$jampertandingan;
			$menit=floor($pertandingan/60);

			$sec=($pertandingan-($menit*60));
			if($menit<10 && $menit>0)
			{
				$menit='0'.$menit;
			}
			if($menit>=90)
			{
				$menit='90';
				$sec="00";
			}
			if($menit<0)
			{
				$menit='00';
				$sec="00";
			}
			print '
			<h5 id="t102">'.$data["club_a"].' VS '.$data["club_b"].'</h5>
			<small id="t103">'.date("d M Y - H:i:s",strtotime($data["jadwal_pertandingan"])).' WIB | '.$data["lokasi_pertandingan"].'</small><div class="pull-right" style="background:#E7251C;padding-top:3px;padding-bottom:3px;padding-left:9px;padding-right:9px;width:auto;;color:#fff;"><i>LIVE di '.$data["live_pertandingan"].'</i></div>
			<hr style="margin-top:5px;"></hr>';
			}
			?>
			</div>
    </div>
    <div class="item">
    <div style="background:#273746;padding:10px;color:#ffffff;" class="text-center" id="t103">LIGA INGGRIS</div>
	<div id="bbm">
		<?php
		$jadwal=$this->db->query("SELECT a.*,c.club_id as club_id_a,d.club_id as club_id_b,c.logo as logo_a,d.logo as logo_b,c.name as club_a,d.name as club_b FROM tbl_jadwal_event a LEFT JOIN tbl_event b ON b.id_event=a.id_event INNER JOIN tbl_club c ON c.club_id=a.tim_a INNER JOIN tbl_club d ON d.club_id=a.tim_b where a.live_pertandingan!='' AND b.title like '%english%' AND a.jadwal_pertandingan>='".date("Y-m-d H:i:s")."' order by jadwal_pertandingan ASC");
			$jdpertandingan="";
			if($jadwal->num_rows()<1)
			{
				echo ' <h5 class="text-center" id="t104">Belum ada Pertandingan Live lainnya</h5>';
			}
			foreach($jadwal->result_array() as $data){
			$jampertandingan=strtotime($data["jadwal_pertandingan"]);
			$jamsekarang=strtotime(date("Y-m-d H:i:s"));
			$pertandingan=$jamsekarang-$jampertandingan;
			$menit=floor($pertandingan/60);

			$sec=($pertandingan-($menit*60));
			if($menit<10 && $menit>0)
			{
				$menit='0'.$menit;
			}
			if($menit>=90)
			{
				$menit='90';
				$sec="00";
			}
			if($menit<0)
			{
				$menit='00';
				$sec="00";
			}
			print '
			<h5 id="t102">'.$data["club_a"].' VS '.$data["club_b"].'</h5>
			<small id="t103">'.date("d M Y - H:i:s",strtotime($data["jadwal_pertandingan"])).' WIB | '.$data["lokasi_pertandingan"].'</small><div class="pull-right" style="background:#E7251C;padding-top:3px;padding-bottom:3px;padding-left:9px;padding-right:9px;width:auto;;color:#fff;"><i>LIVE di '.$data["live_pertandingan"].'</i></div>
			<hr style="margin-top:5px;"></hr>';
			}
			?>
			</div>
    </div>
    <div class="item">
    <div style="background:#273746;padding:10px;color:#ffffff;" class="text-center" id="t103">LIGA SPANYOL</div>
	<div id="bbm">
		<?php
		$jadwal=$this->db->query("SELECT a.*,c.club_id as club_id_a,d.club_id as club_id_b,c.logo as logo_a,d.logo as logo_b,c.name as club_a,d.name as club_b FROM tbl_jadwal_event a LEFT JOIN tbl_event b ON b.id_event=a.id_event INNER JOIN tbl_club c ON c.club_id=a.tim_a INNER JOIN tbl_club d ON d.club_id=a.tim_b where a.live_pertandingan!='' AND b.title like '%la liga%' AND a.jadwal_pertandingan>='".date("Y-m-d H:i:s")."' order by jadwal_pertandingan ASC");
			$jdpertandingan="";
			if($jadwal->num_rows()<1)
			{
				echo ' <h5 class="text-center" id="t104">Belum ada Pertandingan Live lainnya</h5>';
			}
			foreach($jadwal->result_array() as $data){
			$jampertandingan=strtotime($data["jadwal_pertandingan"]);
			$jamsekarang=strtotime(date("Y-m-d H:i:s"));
			$pertandingan=$jamsekarang-$jampertandingan;
			$menit=floor($pertandingan/60);

			$sec=($pertandingan-($menit*60));
			if($menit<10 && $menit>0)
			{
				$menit='0'.$menit;
			}
			if($menit>=90)
			{
				$menit='90';
				$sec="00";
			}
			if($menit<0)
			{
				$menit='00';
				$sec="00";
			}
			print '
			<h5 id="t102">'.$data["club_a"].' VS '.$data["club_b"].'</h5>
			<small id="t103">'.date("d M Y - H:i:s",strtotime($data["jadwal_pertandingan"])).' WIB | '.$data["lokasi_pertandingan"].'</small><div class="pull-right" style="background:#E7251C;padding-top:3px;padding-bottom:3px;padding-left:9px;padding-right:9px;width:auto;;color:#fff;"><i>LIVE di '.$data["live_pertandingan"].'</i></div>
			<hr style="margin-top:5px;"></hr>';
			}
			?>
			</div>
    </div>
    <div class="item">
    <div style="background:#273746;padding:10px;color:#ffffff;" class="text-center" id="t103">LIGA JERMAN</div>
	<div id="bbm">
		<?php
		$jadwal=$this->db->query("SELECT a.*,c.club_id as club_id_a,d.club_id as club_id_b,c.logo as logo_a,d.logo as logo_b,c.name as club_a,d.name as club_b FROM tbl_jadwal_event a LEFT JOIN tbl_event b ON b.id_event=a.id_event INNER JOIN tbl_club c ON c.club_id=a.tim_a INNER JOIN tbl_club d ON d.club_id=a.tim_b where a.live_pertandingan!='' AND b.title like '%bundesliga%' AND a.jadwal_pertandingan>='".date("Y-m-d H:i:s")."' order by jadwal_pertandingan ASC");
			$jdpertandingan="";
			if($jadwal->num_rows()<1)
			{
				echo ' <h5 class="text-center" id="t104">Belum ada Pertandingan Live lainnya</h5>';
			}
			foreach($jadwal->result_array() as $data){
			$jampertandingan=strtotime($data["jadwal_pertandingan"]);
			$jamsekarang=strtotime(date("Y-m-d H:i:s"));
			$pertandingan=$jamsekarang-$jampertandingan;
			$menit=floor($pertandingan/60);

			$sec=($pertandingan-($menit*60));
			if($menit<10 && $menit>0)
			{
				$menit='0'.$menit;
			}
			if($menit>=90)
			{
				$menit='90';
				$sec="00";
			}
			if($menit<0)
			{
				$menit='00';
				$sec="00";
			}
			print '
							<h5 id="t102">'.$data["club_a"].' VS '.$data["club_b"].'</h5>
			<small id="t103">'.date("d M Y - H:i:s",strtotime($data["jadwal_pertandingan"])).' WIB | '.$data["lokasi_pertandingan"].'</small><div class="pull-right" style="background:#E7251C;padding-top:3px;padding-bottom:3px;padding-left:9px;padding-right:9px;width:auto;;color:#fff;"><i>LIVE di '.$data["live_pertandingan"].'</i></div>
			<hr style="margin-top:5px;"></hr>';
			}
			?>
			</div>
    </div> 
	<div class="item">
    <div style="background:#273746;padding:10px;color:#ffffff;" class="text-center" id="t103">LIGA ITALY</div>
	<div id="bbm">
		<?php
		$jadwal=$this->db->query("SELECT a.*,c.club_id as club_id_a,d.club_id as club_id_b,c.logo as logo_a,d.logo as logo_b,c.name as club_a,d.name as club_b FROM tbl_jadwal_event a LEFT JOIN tbl_event b ON b.id_event=a.id_event INNER JOIN tbl_club c ON c.club_id=a.tim_a INNER JOIN tbl_club d ON d.club_id=a.tim_b where a.live_pertandingan!='' AND b.title like '%seri a%' AND a.jadwal_pertandingan>='".date("Y-m-d H:i:s")."' order by jadwal_pertandingan ASC");
			$jdpertandingan="";
			if($jadwal->num_rows()<1)
			{
				echo ' <h5 class="text-center" id="t104">Belum ada Pertandingan Live lainnya</h5>';
			}
			foreach($jadwal->result_array() as $data){
			$jampertandingan=strtotime($data["jadwal_pertandingan"]);
			$jamsekarang=strtotime(date("Y-m-d H:i:s"));
			$pertandingan=$jamsekarang-$jampertandingan;
			$menit=floor($pertandingan/60);

			$sec=($pertandingan-($menit*60));
			if($menit<10 && $menit>0)
			{
				$menit='0'.$menit;
			}
			if($menit>=90)
			{
				$menit='90';
				$sec="00";
			}
			if($menit<0)
			{
				$menit='00';
				$sec="00";
			}
			print '
							<h5 id="t102">'.$data["club_a"].' VS '.$data["club_b"].'</h5>
			<small id="t103">'.date("d M Y - H:i:s",strtotime($data["jadwal_pertandingan"])).' WIB | '.$data["lokasi_pertandingan"].'</small><div class="pull-right" style="background:#E7251C;padding-top:3px;padding-bottom:3px;padding-left:9px;padding-right:9px;width:auto;;color:#fff;"><i>LIVE di '.$data["live_pertandingan"].'</i></div>
			<hr style="margin-top:5px;"></hr>';
			}
			?>
			</div>
    </div>

<div class="item">
    <div style="background:#273746;padding:10px;color:#ffffff;" class="text-center" id="t103">LIGA PERANCIS</div>
	<div id="bbm">
		<?php
		$jadwal=$this->db->query("SELECT a.*,c.club_id as club_id_a,d.club_id as club_id_b,c.logo as logo_a,d.logo as logo_b,c.name as club_a,d.name as club_b FROM tbl_jadwal_event a LEFT JOIN tbl_event b ON b.id_event=a.id_event INNER JOIN tbl_club c ON c.club_id=a.tim_a INNER JOIN tbl_club d ON d.club_id=a.tim_b where a.live_pertandingan!='' AND b.title like '%ligue 1%' AND a.jadwal_pertandingan>='".date("Y-m-d H:i:s")."' order by jadwal_pertandingan ASC");
			$jdpertandingan="";
			if($jadwal->num_rows()<1)
			{
				echo ' <h5 class="text-center" id="t104">Belum ada Pertandingan Live lainnya</h5>';
			}
			foreach($jadwal->result_array() as $data){
			$jampertandingan=strtotime($data["jadwal_pertandingan"]);
			$jamsekarang=strtotime(date("Y-m-d H:i:s"));
			$pertandingan=$jamsekarang-$jampertandingan;
			$menit=floor($pertandingan/60);

			$sec=($pertandingan-($menit*60));
			if($menit<10 && $menit>0)
			{
				$menit='0'.$menit;
			}
			if($menit>=90)
			{
				$menit='90';
				$sec="00";
			}
			if($menit<0)
			{
				$menit='00';
				$sec="00";
			}
			print '
							<h5 id="t102">'.$data["club_a"].' VS '.$data["club_b"].'</h5>
			<small id="t103">'.date("d M Y - H:i:s",strtotime($data["jadwal_pertandingan"])).' WIB | '.$data["lokasi_pertandingan"].'</small><div class="pull-right" style="background:#E7251C;padding-top:3px;padding-bottom:3px;padding-left:9px;padding-right:9px;width:auto;;color:#fff;"><i>LIVE di '.$data["live_pertandingan"].'</i></div>
			<hr style="margin-top:5px;"></hr>';
			}
			?>
			</div>
    </div>	
  </div>
  </div>
  </div>
  
  <div id="mn102" class="tab-pane fade in mytab1"><br>
  <div class="dropdown">
  <button class="btn btn-primary dropdown-toggle btn btn-block" type="button" data-toggle="dropdown" style="background:#F5E934;border:solid #F5E934 1px;border-radius:0px;color:#3d3d3d" id="t103">PILIH KOMPETISI LIGA&ensp;
  <span class="caret" style="float:right;margin-top:8px;"></span></button>
  <ul class="dropdown-menu dropdown-menu-left" style="cursor:pointer;">
    <li><a data-target="#myCarousel4" data-slide-to="0" class="active">LIGA 1 INDONESIA</a></li>
    <li><a data-target="#myCarousel4" data-slide-to="1" class="active">LIGA INGGRIS</a></li>
    <li><a data-target="#myCarousel4" data-slide-to="2">LIGA SPANYOL</a></li>
	<li><a data-target="#myCarousel4" data-slide-to="3">LIGA JERMAN</a></li>
	<li><a data-target="#myCarousel4" data-slide-to="4">LIGA ITALY</a></li>
	<li><a data-target="#myCarousel4" data-slide-to="5">LIGA PERANCIS</a></li>
	
  </ul>
  </div>    
  <div id="myCarousel4" class="carousel slide" data-ride="carousel" data-interval="false">
  <div class="carousel-inner">
    <div class="item active">
    <div style="background:#273746;padding:10px;color:#ffffff;" class="text-center" id="t103">LIGA 1 INDONESIA</div>
    <div id="bbm">
	<?php
		$jadwal=$this->db->query("SELECT a.*,c.club_id as club_id_a,d.club_id as club_id_b,c.logo as logo_a,d.logo as logo_b,c.name as club_a,d.name as club_b FROM tbl_jadwal_event a LEFT JOIN tbl_event b ON b.id_event=a.id_event INNER JOIN tbl_club c ON c.club_id=a.tim_a INNER JOIN tbl_club d ON d.club_id=a.tim_b where b.title like '%Liga 1%' AND a.jadwal_pertandingan<='".date("Y-m-d H:i:s")."' order by jadwal_pertandingan DESC");
	
$jdpertandingan="";
if($jadwal->num_rows()<1)
{
	echo ' <h5 class="text-center" id="t104">Belum ada Score Pertandingan lainnya</h5>';
}
foreach($jadwal->result_array() as $data){
    print '
	<h5 class="text-center" id="t104">'.date("d M Y",strtotime($data["jadwal_pertandingan"])).'</h5>
    <div style="padding-top:10px;"></div>
    <div class="col-xs-12" style="border:solid #a9a9a9 1px;padding:3px;">
    <div class="col-xs-5 text-right" style="padding:0px;">
    <div class="media">
      <div class="media-body"><smal>'.$data["club_a"].'</small></div>
      <div class="media-right">
        <img src="'.base_url().'systems/club_logo/'.$data["logo_a"].'" class="media-object" style="width:35px;height:35px;">
      </div>
    </div>     
    </div>
	
    <div class="col-xs-2" style="text-align: center;padding: 0px; ">
	<b>'.$data["score_a"].' - '.$data["score_b"].'</b>	
	</div>
    <div class="col-xs-5">
    <div class="media">
    <div class="media-left">
      <img src="'.base_url().'systems/club_logo/'.$data["logo_b"].'" class="media-object" style="width:35px;height:35px;">
    </div>
    <div class="media-body"><small>'.$data["club_b"].'</small></div>
    </div>     
    </div>
    </div><br><br>';
    }
    ?>
    </div>
    </div>
    <div class="item">
    <div style="background:#273746;padding:10px;color:#ffffff;" class="text-center" id="t103">LIGA INGGRIS</div>
	<div id="bbm">
<?php
    $jadwal=$this->db->query("SELECT a.*,c.club_id as club_id_a,d.club_id as club_id_b,c.logo as logo_a,d.logo as logo_b,c.name as club_a,d.name as club_b FROM tbl_jadwal_event a LEFT JOIN tbl_event b ON b.id_event=a.id_event INNER JOIN tbl_club c ON c.club_id=a.tim_a INNER JOIN tbl_club d ON d.club_id=a.tim_b where b.title like '%english%' AND a.jadwal_pertandingan<='".date("Y-m-d H:i:s")."' order by jadwal_pertandingan DESC");
	
$jdpertandingan="";
if($jadwal->num_rows()<1)
{
	echo ' <h5 class="text-center" id="t104">Belum ada Score Pertandingan lainnya</h5>';
}
foreach($jadwal->result_array() as $data){
    print '
	<h5 class="text-center" id="t104">'.date("d M Y",strtotime($data["jadwal_pertandingan"])).'</h5>
    <div style="padding-top:10px;"></div>
    <div class="col-xs-12" style="border:solid #a9a9a9 1px;padding:3px;">
    <div class="col-xs-5 text-right" style="padding:0px;">
    <div class="media row">
      <div class="media-body"><smal>'.$data["club_a"].'</small></div>
      <div class="media-right">
        <img src="'.base_url().'systems/club_logo/'.$data["logo_a"].'" class="media-object" style="width:35px;height:35px;">
      </div>
    </div>     
    </div>
	
    <div class="col-xs-2" style="text-align: center;padding: 0px; ">
	<b>'.$data["score_a"].' - '.$data["score_b"].'</b>
	</div>
    <div class="col-xs-5">
    <div class="media row">
    <div class="media-left">
      <img src="'.base_url().'systems/club_logo/'.$data["logo_b"].'" class="media-object" style="width:35px;height:35px;">
    </div>
    <div class="media-body"><small>'.$data["club_b"].'</small></div>
    </div>     
    </div>
    </div><br><br>';
    }
    ?>
	</div>
    </div>
    <div class="item">
    <div style="background:#273746;padding:10px;color:#ffffff;" class="text-center" id="t103">LIGA SPANYOL</div>
	<div id="bbm">
	<?php
    $jadwal=$this->db->query("SELECT a.*,c.club_id as club_id_a,d.club_id as club_id_b,c.logo as logo_a,d.logo as logo_b,c.name as club_a,d.name as club_b FROM tbl_jadwal_event a LEFT JOIN tbl_event b ON b.id_event=a.id_event INNER JOIN tbl_club c ON c.club_id=a.tim_a INNER JOIN tbl_club d ON d.club_id=a.tim_b where b.title like '%la Liga%' AND a.jadwal_pertandingan<='".date("Y-m-d H:i:s")."' order by jadwal_pertandingan DESC");
	
$jdpertandingan="";
if($jadwal->num_rows()<1)
{
	echo ' <h5 class="text-center" id="t104">Belum ada Score Pertandingan lainnya</h5>';
}
foreach($jadwal->result_array() as $data){
    print '
	<h5 class="text-center" id="t104">'.date("d M Y",strtotime($data["jadwal_pertandingan"])).'</h5>
    <div style="padding-top:10px;"></div>
    <div class="col-xs-12" style="border:solid #a9a9a9 1px;padding:3px;">
    <div class="col-xs-5 text-right" style="padding:0px;">
    <div class="media row">
      <div class="media-body"><smal>'.$data["club_a"].'</small></div>
      <div class="media-right">
        <img src="'.base_url().'systems/club_logo/'.$data["logo_a"].'" class="media-object" style="width:35px;height:35px;">
      </div>
    </div>     
    </div>
	
    <div class="col-xs-2" style="text-align: center;padding: 0; ">
	<b>'.$data["score_a"].' - '.$data["score_b"].'</b>
	</div>
    <div class="col-xs-5">
    <div class="media row">
    <div class="media-left">
      <img src="'.base_url().'systems/club_logo/'.$data["logo_b"].'" class="media-object" style="width:35px;height:35px;">
    </div>
    <div class="media-body"><small>'.$data["club_b"].'</small></div>
    </div>     
    </div>
    </div><br><br>';
    }
    ?>
	</div>
    </div>  
 <div class="item">
    <div style="background:#273746;padding:10px;color:#ffffff;" class="text-center" id="t103">LIGA JERMAN</div>
	<div id="bbm">
		<?php
    $jadwal=$this->db->query("SELECT a.*,c.club_id as club_id_a,d.club_id as club_id_b,c.logo as logo_a,d.logo as logo_b,c.name as club_a,d.name as club_b FROM tbl_jadwal_event a LEFT JOIN tbl_event b ON b.id_event=a.id_event INNER JOIN tbl_club c ON c.club_id=a.tim_a INNER JOIN tbl_club d ON d.club_id=a.tim_b where b.title like '%bundesliga%' AND a.jadwal_pertandingan<='".date("Y-m-d H:i:s")."' order by jadwal_pertandingan DESC");
	
$jdpertandingan="";
if($jadwal->num_rows()<1)
{
	echo ' <h5 class="text-center" id="t104">Belum ada Score Pertandingan lainnya</h5>';
}
foreach($jadwal->result_array() as $data){
    print '
	<h5 class="text-center" id="t104">'.date("d M Y",strtotime($data["jadwal_pertandingan"])).'</h5>
    <div style="padding-top:10px;"></div>
    <div class="col-xs-12" style="border:solid #a9a9a9 1px;padding:3px;">
    <div class="col-xs-5 text-right" style="padding:0px;">
    <div class="media row">
      <div class="media-body"><smal>'.$data["club_a"].'</small></div>
      <div class="media-right">
        <img src="'.base_url().'systems/club_logo/'.$data["logo_a"].'" class="media-object" style="width:35px;height:35px;">
      </div>
    </div>     
    </div>
	
    <div class="col-xs-2" style="text-align: center;padding: 0; ">
	<b>'.$data["score_a"].' - '.$data["score_b"].'</b>
	
	</div>
    <div class="col-xs-5">
    <div class="media row">
    <div class="media-left">
      <img src="'.base_url().'systems/club_logo/'.$data["logo_b"].'" class="media-object" style="width:35px;height:35px;">
    </div>
    <div class="media-body"><small>'.$data["club_b"].'</small></div>
    </div>     
    </div>
    </div><br><br>';
    }
    ?>
	</div>
    </div>	
 <div class="item">
    <div style="background:#273746;padding:10px;color:#ffffff;" class="text-center" id="t103">LIGA ITALY</div>
	<div id="bbm">
		<?php
    $jadwal=$this->db->query("SELECT a.*,c.club_id as club_id_a,d.club_id as club_id_b,c.logo as logo_a,d.logo as logo_b,c.name as club_a,d.name as club_b FROM tbl_jadwal_event a LEFT JOIN tbl_event b ON b.id_event=a.id_event INNER JOIN tbl_club c ON c.club_id=a.tim_a INNER JOIN tbl_club d ON d.club_id=a.tim_b where b.title like '%seri a%' AND a.jadwal_pertandingan<='".date("Y-m-d H:i:s")."' order by jadwal_pertandingan DESC");
	
$jdpertandingan="";
if($jadwal->num_rows()<1)
{
	echo ' <h5 class="text-center" id="t104">Belum ada Score Pertandingan lainnya</h5>';
}
foreach($jadwal->result_array() as $data){
    print '
	<h5 class="text-center" id="t104">'.date("d M Y",strtotime($data["jadwal_pertandingan"])).'</h5>
    <div style="padding-top:10px;"></div>
    <div class="col-xs-12" style="border:solid #a9a9a9 1px;padding:3px;">
    <div class="col-xs-5 text-right" style="padding:0px;">
    <div class="media row">
      <div class="media-body"><smal>'.$data["club_a"].'</small></div>
      <div class="media-right">
        <img src="'.base_url().'systems/club_logo/'.$data["logo_a"].'" class="media-object" style="width:35px;height:35px;">
      </div>
    </div>     
    </div>
	
    <div class="col-xs-2" style="text-align: center;padding: 0; ">
	<b>'.$data["score_a"].' - '.$data["score_b"].'</b>
	
	</div>
    <div class="col-xs-5">
    <div class="media row">
    <div class="media-left">
      <img src="'.base_url().'systems/club_logo/'.$data["logo_b"].'" class="media-object" style="width:35px;height:35px;">
    </div>
    <div class="media-body"><small>'.$data["club_b"].'</small></div>
    </div>     
    </div>
    </div><br><br>';
    }
    ?>
	</div>
    </div>

<div class="item">
    <div style="background:#273746;padding:10px;color:#ffffff;" class="text-center" id="t103">LIGA PERANCIS</div>
	<div id="bbm">
		<?php
    $jadwal=$this->db->query("SELECT a.*,c.club_id as club_id_a,d.club_id as club_id_b,c.logo as logo_a,d.logo as logo_b,c.name as club_a,d.name as club_b FROM tbl_jadwal_event a LEFT JOIN tbl_event b ON b.id_event=a.id_event INNER JOIN tbl_club c ON c.club_id=a.tim_a INNER JOIN tbl_club d ON d.club_id=a.tim_b where b.title like '%ligue 1%' AND a.jadwal_pertandingan<='".date("Y-m-d H:i:s")."' order by jadwal_pertandingan DESC");
	
$jdpertandingan="";
if($jadwal->num_rows()<1)
{
	echo ' <h5 class="text-center" id="t104">Belum ada Score Pertandingan lainnya</h5>';
}
foreach($jadwal->result_array() as $data){
    print '
	<h5 class="text-center" id="t104">'.date("d M Y",strtotime($data["jadwal_pertandingan"])).'</h5>
    <div style="padding-top:10px;"></div>
    <div class="col-xs-12" style="border:solid #a9a9a9 1px;padding:3px;">
    <div class="col-xs-5 text-right" style="padding:0px;">
    <div class="media row">
      <div class="media-body"><smal>'.$data["club_a"].'</small></div>
      <div class="media-right">
        <img src="'.base_url().'systems/club_logo/'.$data["logo_a"].'" class="media-object" style="width:35px;height:35px;">
      </div>
    </div>     
    </div>
	
    <div class="col-xs-2" style="text-align: center;padding: 0; ">
	<b>'.$data["score_a"].' - '.$data["score_b"].'</b>
	
	</div>
    <div class="col-xs-5">
    <div class="media row">
    <div class="media-left">
      <img src="'.base_url().'systems/club_logo/'.$data["logo_b"].'" class="media-object" style="width:35px;height:35px;">
    </div>
    <div class="media-body"><small>'.$data["club_b"].'</small></div>
    </div>     
    </div>
    </div><br><br>';
    }
    ?>
	</div>
    </div>	
  </div>
  </div>
  </div>  
  <!--<div id="mn103" class="tab-pane fade in mytab1"><br><img src="<?=base_url()?>systems/eyeads_storage/9989-ligainggris.jpg" class="img img-responsive"></div> -->
  <div id="mn103" class="tab-pane fade in mytab1"><br>
  <div class="dropdown">
  <button class="btn btn-primary dropdown-toggle btn btn-block" type="button" data-toggle="dropdown" style="background:#F5E934;border:solid #F5E934 1px;border-radius:0px;color:#3d3d3d" id="t103">PILIH KOMPETISI LIGA&ensp;
  <span class="caret" style="float:right;margin-top:8px;"></span></button>
  <ul class="dropdown-menu dropdown-menu-left" style="cursor:pointer;">
    <li><a data-target="#myCarousel5" data-slide-to="0" class="active">LIGA 1 INDONESIA</a></li>
    <li><a data-target="#myCarousel5" data-slide-to="1">LIGA INGGRIS</a></li>
    <li><a data-target="#myCarousel5" data-slide-to="2">LIGA SPANYOL</a></li>
	<li><a data-target="#myCarousel5" data-slide-to="3">LIGA JERMAN</a></li>
	<li><a data-target="#myCarousel5" data-slide-to="4">LIGA ITALY</a></li>
	<li><a data-target="#myCarousel5" data-slide-to="5">LIGA PERANCIS</a></li>	
  </ul>
  </div>    
  <div id="myCarousel5" class="carousel slide" data-ride="carousel" data-interval="false">
  <div class="carousel-inner">
    <div class="item active">
    <div style="background:#273746;padding:10px;color:#ffffff;" class="text-center" id="t103">LIGA 1 INDONESIA</div>
	<?php
		$clasment=$this->db->query("SELECT * FROM tbl_clasment where title like '%Liga indonesia%' order by clasment_id");	
		$clpertandingan="";
		if($clasment->num_rows()<1)
		{
			echo ' <h5 class="text-center" id="t104">Belum ada Klasmen Pertandingan</h5>';
		}
		foreach($clasment->result_array() as $data){
    print '
        <img src="'.base_url().'systems/eyeads_storage/'.$data["pic"].'" class="media-object"">
      ';
    }
    ?>
    </div>
    <div class="item">
    <div style="background:#273746;padding:10px;color:#ffffff;" class="text-center" id="t103">LIGA INGGRIS</div><br>
	<center><iframe src="http://www.tablesleague.com/iframe?width=520&height=400&font_name=Tahoma&position=1&font_size=12&team_link=1&link_color=404040&games=1&wins=1&draws=1&lost=1&goals=1&goals_against=1&gd=1&points=1&next=1&form=1&font_size=12&font_color=000000&bg_color=FFFFFF&header_font_color=FFFFFF&header_bg_color=1fb9e4&bg_col=1fb9e4&font_color_col=FFFFFF&highlight=e3e3e3&hover=fff6bf&league_header=1&league=l_145&team=" width="520" height=400 frameborder="0" scrolling="no"></iframe></center>
    </div>
    <div class="item">
    <div style="background:#273746;padding:10px;color:#ffffff;" class="text-center" id="t103">LIGA SPANYOL</div><br>
	<center><iframe src="http://www.tablesleague.com/iframe?width=520&height=400&font_name=Tahoma&position=1&font_size=12&team_link=1&link_color=404040&games=1&wins=1&draws=1&lost=1&goals=1&goals_against=1&gd=1&points=1&next=1&form=1&font_size=12&font_color=000000&bg_color=FFFFFF&header_font_color=FFFFFF&header_bg_color=1fb9e4&bg_col=1fb9e4&font_color_col=FFFFFF&highlight=e3e3e3&hover=fff6bf&league_header=1&league=l_16515&team=" width="520" height=400 frameborder="0" scrolling="no"></iframe></center>
    </div>  
 <div class="item">
    <div style="background:#273746;padding:10px;color:#ffffff;" class="text-center" id="t103">LIGA JERMAN</div><br>
	<center><iframe src="http://www.tablesleague.com/iframe?width=520&height=400&font_name=Tahoma&position=1&font_size=12&team_link=1&link_color=404040&games=1&wins=1&draws=1&lost=1&goals=1&goals_against=1&gd=1&points=1&next=1&form=1&font_size=12&font_color=000000&bg_color=FFFFFF&header_font_color=FFFFFF&header_bg_color=1fb9e4&bg_col=1fb9e4&font_color_col=FFFFFF&highlight=e3e3e3&hover=fff6bf&league_header=1&league=l_179&team=" width="520" height=400 frameborder="0" scrolling="no"></iframe></center>
    </div>	
 <div class="item">
    <div style="background:#273746;padding:10px;color:#ffffff;" class="text-center" id="t103">LIGA ITALY</div><br>
		<center><iframe src="http://www.tablesleague.com/iframe?width=520&height=400&font_name=Tahoma&position=1&font_size=12&team_link=1&link_color=404040&games=1&wins=1&draws=1&lost=1&goals=1&goals_against=1&gd=1&points=1&next=1&form=1&font_size=12&font_color=000000&bg_color=FFFFFF&header_font_color=FFFFFF&header_bg_color=1fb9e4&bg_col=1fb9e4&font_color_col=FFFFFF&highlight=e3e3e3&hover=fff6bf&league_header=1&league=l_474&team=" width="520" height=400 frameborder="0" scrolling="no"></iframe></center>
    </div>	
	 <div class="item">
    <div style="background:#273746;padding:10px;color:#ffffff;" class="text-center" id="t103">LIGA PERANCIS</div><br>
		<center><iframe src="http://www.tablesleague.com/iframe?width=520&height=400&font_name=Tahoma&position=1&font_size=12&team_link=1&link_color=404040&games=1&wins=1&draws=1&lost=1&goals=1&goals_against=1&gd=1&points=1&next=1&form=1&font_size=12&font_color=000000&bg_color=FFFFFF&header_font_color=FFFFFF&header_bg_color=1fb9e4&bg_col=1fb9e4&font_color_col=FFFFFF&highlight=e3e3e3&hover=fff6bf&league_header=1&league=l_171&team=" width="520" height=400 frameborder="0" scrolling="no"></iframe></center>
    </div>
  </div>
  </div>
  </div>
</div>  
</div>

</div>
</div>
<div class="col-lg-4 col-md-4">
<div class="hidden-lg hidden-md"><br></div>
<img src="img/ronaldo.jpg" class="img img-responsive"><br>


<a href="<?=base_url()?>eyevent/el" id="a100"><h4 id="t100" style="padding-top:5px;"><img src="<?=base_url()?>img/icon_eyevent.png" class="img img-responsive" style="width:25px;height:30px;display:inline;"> EVENT LAINNYA</h4></a>

<?php
$cmd1=$this->db->query("select * from tbl_event where publish_on<='".date("Y-m-d H:i:s")."' order by publish_on desc  limit 5");
foreach($cmd1->result_array() as $row1){
$id_event=$row1['id_event']; 
  if(strstr($row1["thumb1"], "."))
  {
    $row1['pic']=$row1['thumb1'];
  }
print '

  <div class="media drop-shadow">
  
    <div class="media-left ">
      <a href="'.base_url().'eyevent/detail/'.$id_event.'"><img src="'.base_url().'systems/eyevent_storage/'.$row1['pic'].'" class="media-object " id="img4" ></a>
    </div>
    <div class="media-body ">
      <a href="'.base_url().'eyevent/detail/'.$id_event.'" id="a4" class=""><p class="media-heading">'.$row1['title'].'</p>
      <small id="set6"><i class="fa fa-clock-o"></i> '.$row1['publish_on'].'</small></a>
    </div>
  </div>
';
  
}
?>
</div>

<div class="col-lg-4 col-md-4">
<div class="hidden-lg hidden-md"></div><br>
<h4 id="t100" style="padding-top:5px;"><i class="fa fa-newspaper-o"></i> BERITA TERKINI</h4></a>

<?php
$cmd1=$this->db->query("select * from tbl_eyenews where publish_on<='".date("Y-m-d H:i:s")."' order by publish_on desc limit 5");
foreach($cmd1->result_array() as $row1){
$eyenews_id=$row1['eyenews_id']; 
  if(strstr($row1["thumb2"], "."))
  {
    $row1['pic']=$row1['thumb2'];
  }
print '

  <div class="media drop-shadow">
  
    <div class="media-left ">
      <a href="'.base_url().'eyenews/detail/'.$eyenews_id.'"><img src="'.base_url().'systems/eyenews_storage/'.$row1['pic'].'" class="media-object " id="img4" ></a>
    </div>
    <div class="media-body ">
      <a href="'.base_url().'eyenews/detail/'.$eyenews_id.'" id="a4" class=""><p class="media-heading">'.$row1['title'].'</p>
      <small id="set6"><i class="fa fa-clock-o"></i> '.$row1['createon'].'</small></a>
    </div>
  </div>
';  
}
?>

<h4 id="t100" style="padding-top:5px;"><i class="fa fa-play-circle-o fa-lg"></i> VIDEO TERBARU</h4></a>

<?php 
$cmd11=$this->db->query("select * from tbl_eyetube where active='1' order by eyetube_id desc limit 5");
foreach($cmd11->result_array() as $row11){
$eyetube_id=$row11['eyetube_id'];
print '
  <div class="media drop-shadow">
    <div class="media-left">
      <img src="'.base_url().'systems/eyetube_storage/'.$row11['thumb1'].'" class="media-object" id="img4">
    </div>
    <div class="media-body">
      <a href="'.base_url().'eyetube/detail/'.$eyetube_id.'" id="a4"><p class="media-heading">'.$row11['title'].'</p>
      <small id="set6"><i class="fa fa-clock-o"></i> '.$row1['createon'].'</small></a>
    </div>
  </div>
';  
}
?>
</div>

