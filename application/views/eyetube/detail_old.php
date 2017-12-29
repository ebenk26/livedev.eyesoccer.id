<?php
$eyetube_id=$eyetube_id;
		$date1=date("Y-m-d H:i:s",strtotime("-15 minutes",time()));
		$date2=date("Y-m-d H:i:s");

		$cekview=$this->db->query("SELECT * FROM tbl_view WHERE visit_date>='".$date1."' AND visit_date<='".$date2."' AND type_visit='view' AND place_visit='eyetube' AND place_id='".$eyetube_id."' AND session_ip='".$_SESSION["ip"]."' LIMIT 1")->row_array();
		if($cekview<1)
		{
		$this->db->query("UPDATE tbl_eyetube SET tube_view=tube_view+1 WHERE eyetube_id='".$eyetube_id."'");
		$this->db->query("INSERT INTO tbl_view (visit_date,type_visit,place_visit,place_id,session_ip) values ('".$date2."','view','eyetube','".$eyetube_id."','".$_SESSION["ip"]."')");
		}

		
		
		
$cmd=$this->db->query("select a.*,b.fullname from tbl_eyetube a INNER JOIN tbl_admin b ON b.admin_id=a.admin_id where eyetube_id='$eyetube_id' LIMIT 1");
$row=$cmd->row_array();
		
		
?>
<script type='text/javascript' src='//platform-api.sharethis.com/js/sharethis.js#property=596cf64cb69de60011989f08&product=inline-share-buttons' async='async'></script>

<title><?php if($row['title']!="")
{
  echo $row['title']." - ";
}

?>Eyesoccer</title>
<meta name="twitter:card" content="summary" />
<meta name="twitter:username" content="@sobatjudjo" />
<meta name="twitter:site" content="@eyesoccer_id" />
<meta name="twitter:title" content="<?=$row['title']?>" />
<meta name="twitter:description" content="<?=substr(strip_tags($row['description']),0,100);?>" />
<meta name="twitter:image" content="<?=base_url()?>systems/eyetube_storage/<?php print $row['thumb']; ?>" />
<meta property="og:title" content="<?=$row['title']?>" />
<meta property="og:url" content="<?=base_url()?>eyetube_detail?eyetube_id=<?=$row['eyetube_id']?>" />
<meta property="og:type" content="article" />
<meta property="og:image" content="<?=base_url()?>systems/eyetube_storage/<?=$row['thumb']; ?>" />
<meta property="og:description" content="<?=substr(strip_tags($row['description']),0,100);?>" />




<style>
/*.img-detail{
    float: left;
    margin: 0 20px 20px 0;
    width: 150px;
    height: 150px;
}*/

.detail {
    text-align: justify;
    text-indent: 5em;
}
@media only screen and (max-width: 768px) {
  #emoji {
    font-size: x-small;
  }
}
</style>

<br>

<div class="col-lg-8 col-md-8 header-iphone"> 
<a href="../" class="btn btn-info btn-sm">HOME</a>
<h5 id="t3"><?php print $row['title']; ?></a></h5>
<p id="p1">Editor <b><?=$row['fullname']?></b> - <?php print $row['createon']; ?> </p>
<video width="640" height="360" poster="<?=base_url()?>systems/eyetube_storage/<?php print $row['thumb']; ?>" controls controlsList="nodownload">
<source src="<?=base_url()?>systems/eyetube_storage/<?php print $row['video']; ?>" type="video/mp4"/></video>
<!--<source src="'.base_url().'systems/eyetube_storage/<?php print $row['video_mobile']; ?>" type="video/mp4"/></video>-->
<br>
<small class="hidden-lg hidden-md"><center><i class="fa fa-eye"></i> <?=$row['tube_view']?> | <a class="emoticon" type_emot="like"><i class="fa fa fa-heart"></i> <span class="replace_like"><?=$row['tube_like']?></span></a></center></small>
<small class="hidden-xs hidden-sm"><center><i class="fa fa-eye"></i> <?=$row['tube_view']?> | <a class="emoticon" type_emot="like"><i class="fa fa fa-heart"></i> <span class="replace_like"><?=$row['tube_like']?></span></a></center></small>
<p>
<?php print $row['description']; ?> 
</p><br>
<input type="hidden" id="eyetube_id22" value="<?=$eyetube_id?>" />
<h3>Bagaimana reaksi Anda tentang video ini?</h3>
<div class="row" id="emoji">
  <div class="col-xs-2 col-sm-2" style="padding:2px;">
  <!--<a href="<?=base_url()?>eyetube/detail/<?=$eyetube_id?>&smile=1"><img src="<?=base_url()?>img/emoticon/New_Senang_1158.png" class="img-responsive max-width: 100% height: auto"><center>Senang</center><center><?=$row['tube_smile']?></center></a>-->
  <a class="emoticon" type_emot="smile"><img src="<?=base_url()?>img/emoticon/New_Senang_1158.png" class="img-responsive max-width: 100% height: auto"><center>Senang</center><center class="replace_smile"><?=$row['tube_smile']?></center></a>
  </div>
  <div class="col-xs-2 col-sm-2" style="padding:2px;">
  <!--<a href="<?=base_url()?>eyetube/detail/<?=$eyetube_id?>&smile=1"><img src="<?=base_url()?>img/emoticon/New_Senang_1158.png" class="img-responsive max-width: 100% height: auto"><center>Senang</center><center><?=$row['tube_smile']?></center></a>-->
  <a class="emoticon" type_emot="shock"><img src="<?=base_url()?>img/emoticon/New_Terkejut_1158.png" class="img-responsive max-width: 100% height: auto"><center>Terkejut</center><center class="replace_shock"><?=$row['tube_shock']?></center></a>
  </div>
  <div class="col-xs-2 col-sm-2" style="padding:2px;">
  <!--<a href="<?=base_url()?>eyetube/detail/<?=$eyetube_id?>&smile=1"><img src="<?=base_url()?>img/emoticon/New_Senang_1158.png" class="img-responsive max-width: 100% height: auto"><center>Senang</center><center><?=$row['tube_smile']?></center></a>-->
  <a class="emoticon" type_emot="inspired"><img src="<?=base_url()?>img/emoticon/New_Terinspirasi_1158.png" class="img-responsive max-width: 100% height: auto"><center>Terinspirasi</center><center class="replace_inspired"><?=$row['tube_inspired']?></center></a>
  </div>
  <div class="col-xs-2 col-sm-2" style="padding:2px;">
  <!--<a href="<?=base_url()?>eyetube/detail/<?=$eyetube_id?>&smile=1"><img src="<?=base_url()?>img/emoticon/New_Senang_1158.png" class="img-responsive max-width: 100% height: auto"><center>Senang</center><center><?=$row['tube_happy']?></center></a>-->
  <a class="emoticon" type_emot="happy"><img src="<?=base_url()?>img/emoticon/New_Bangga_1158.png" class="img-responsive max-width: 100% height: auto"><center>Bangga</center><center class="replace_happy"><?=$row['tube_happy']?></center></a>
  </div>  
  <div class="col-xs-2 col-sm-2" style="padding:2px;">
  <!--<a href="<?=base_url()?>eyetube/detail/<?=$eyetube_id?>&smile=1"><img src="<?=base_url()?>img/emoticon/New_Senang_1158.png" class="img-responsive max-width: 100% height: auto"><center>Senang</center><center><?=$row['tube_smile']?></center></a>-->
  <a class="emoticon" type_emot="sad"><img src="<?=base_url()?>img/emoticon/New_Sedih_1158.png" class="img-responsive max-width: 100% height: auto"><center>Sedih</center><center class="replace_sad"><?=$row['tube_sad']?></center></a>
  </div>
  <div class="col-xs-2 col-sm-2" style="padding:2px;">
  <!--<a href="<?=base_url()?>eyetube/detail/<?=$eyetube_id?>&smile=1"><img src="<?=base_url()?>img/emoticon/New_Senang_1158.png" class="img-responsive max-width: 100% height: auto"><center>Senang</center><center><?=$row['tube_smile']?></center></a>-->
  <a class="emoticon" type_emot="fear"><img src="<?=base_url()?>img/emoticon/New_Takut_1158.png" class="img-responsive max-width: 100% height: auto"><center>Takut</center><center class="replace_fear"><?=$row['tube_fear']?></center></a>
  </div>    
</div>
<h6 id="t4">Bagikan</h6>
<hr></hr>
<div class="sharethis-inline-share-buttons"></div>

<br>
<h3>Komentar</h3>


<form method="post" enctype="multipart/form-data">
  <?php
    if(isset($_POST['opt1'])){
      $tanggal=date('d-m-Y H:i:s');
      $nama=addslashes($_POST['nama']);
      $email=addslashes($_POST['email']);
      $pesan=addslashes($_POST['pesan']);       
      $cmd=$this->db->query("insert into tbl_comment (eyetube_id,tanggal,nama,email,pesan) values ('$eyetube_id','$tanggal','$nama','$email','$pesan')");    

      }	
      ?>	
	<div class="form-group text-left" id="t1"><input type="text" name="nama" placeholder="nama" class="form-control" id="ipt1"></div>
  <div class="form-group text-left" id="t1"><input type="email" name="email" placeholder="email" class="form-control" id="ipt1" required></div>
  <div class="form-group text-left" id="t1"><textarea type="text" name="pesan" placeholder="isi pesan" class="form-control" id="ipt1" required></textarea></div>
  <div class="form-group" id="t1"><input type="submit" name="opt1" value="Kirim" class="btn5" id="btn1"></div><br><br>      
</form>



<?php
$dataPerPage = 10;
if(isset($pg))
{
$noPage = $pg;
} 
else $noPage = 1;
$offset = ($noPage - 1) * $dataPerPage;
$result=$this->db->query("select * from tbl_comment where eyetube_id='$eyetube_id' order by comment_id desc limit 5");
foreach($result->result_array() as $data)
{
$tanggal=$data['tanggal'];
$nama=$data['nama'];  
$pesan=$data['pesan'];

print'
<div class="thumbnail"><b>'.$nama.'</b> <small>'.$tanggal.'</small><br>'.$pesan.'
</div>';
}
?>  


<!--
<div class="container">
<div class="fb-comments" data-href="http://localhost/eyesoccer/eyetube_detail?eyetube_id=$eyetube_id" data-numposts="5"></div>
</div>
-->
</div>

<div class="col-lg-4 col-md-4"><div class="hidden-xs hidden-sm"><br><br></div>
<?php
$cmd_ads1=$this->db->query("select * from tbl_ads where ads_id='24'");
$row_ads1=$cmd_ads1->row_array();
print '<img src="'.base_url().'systems/eyeads_storage/'.$row_ads1['pic'].'" class="img img-responsive hidden-md hidden-lg"><br>';
?>
<h1 id="t2"><i class="fa fa-play-circle-o fa-lg"></i> Video Lainnya</h1>
<hr></hr>
<?php 
$cmd1=$this->db->query("select * from tbl_eyetube where active='1' order by eyetube_id desc limit 5");
foreach($cmd1->result_array() as $row1){
$eyetube_id=$row1['eyetube_id'];
print '
  <div class="media drop-shadow">
    <div class="media-left">
      <img src="'.base_url().'systems/eyetube_storage/'.$row1['thumb1'].'" class="media-object" id="img4">
    </div>
    <div class="media-body">
      <a href="'.base_url().'eyetube/detail/'.$eyetube_id.'" id="a4"><p class="media-heading">'.$row1['title'].'</p>
      <small id="set6"><i class="fa fa-clock-o"></i> '.$row['createon'].'</small></a>
    </div>
  </div>
';  
}
?>

  <br><br>
<?php
$cmd_ads2=$this->db->query("select * from tbl_ads where ads_id='24'");
$row_ads2=$cmd_ads2->row_array();
print '<img src="'.base_url().'systems/eyeads_storage/'.$row_ads2['pic'].'" class="img img-responsive hidden-xs hidden-sm">';
?>
</div>
<script src="bs/jquery/jquery-3.2.1.min.js"></script>
<script src="bs/js/bootstrap.min.js"></script>
<script>
$(document).ready(function(){

    // hide .navbar first
    $(".gotop").hide();

    // fade in .navbar
    $(function () {
        $(window).scroll(function () {

                 // set distance user needs to scroll before we start fadeIn
            if ($(this).scrollTop() > 100) {
                $('.gotop').fadeIn();
            } else {
                $('.gotop').fadeOut();
            }
        });
    });

});
</script>
<script> 
$(document).ready(function(){
   $('video').bind('contextmenu',function() { return false; });
});
function openNav1() {document.getElementById("myNav1").style.width = "100%";}
function openNav2() {document.getElementById("myNav2").style.width = "100%";}
function closeNav1() {document.getElementById("myNav1").style.width = "0%";}  
function closeNav2() {document.getElementById("myNav2").style.width = "0%";}  
</script>
<script>
$(document).ready(function(){
  pw=parseInt($(".parent-image").width());
  cw=parseInt($(".child-image").width());
  perpc=(cw/pw)*100;
  if(perpc>=70)
  {
    $(".child-image").width(pw);
  }
//alert(perpc);
  $(".emoticon").click(function(){
   // alert("tes");
    id=$("#eyetube_id22").val();
    type=$(this).attr("type_emot");
    link="eyetube";
    $.ajax({

    type: "POST",
    data: { 'type':type,'id':id,'link':link},
    url: "<?=base_url()?>eyetube/emot/"+id,
    dataType: "json",
    success:function(data){
  
    $(".replace_"+type).empty().html(data.html);
    



    //alert(  $(".replace-"+replaced).html());


    }

    });
  })
}) 
</script>