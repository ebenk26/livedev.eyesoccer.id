<?php 
require "../config/connect.php";
require "check_login.php";
require "insert_logs.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/SMTP.php';

$admin_id=$_GET["admin_id"];
$id_member_player=$_GET['id_member_player'];
$email_member=$_GET['email_member'];
$member_name=$_GET['member_name'];
$id_player=$_GET['id_player'];
// $cmd=mysqli_query($con,"delete from tbl_eyetube where eyetube_id='$eyetube_id'");

	$mail = new PHPMailer(true); 
	//Server settings
	$mail->SMTPDebug = 2;                                 // Enable verbose debug output
	$mail->isSMTP();                                      // Set mailer to use SMTP
	$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
	$mail->SMTPAuth = true;                               // Enable SMTP authentication
	$mail->Username = 'eyesoccerindonesia@gmail.com';                 // SMTP username
	$mail->Password = 'BolaSepak777#';                           // SMTP password
	$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
	$mail->Port = 465;                                    // TCP port to connect to

	//Recipients
	$mail->setFrom('info@eyesoccer.id', 'Info Eyesoccer');
	$mail->addAddress("$email_member");               // Name is optional
	$mail->addReplyTo('info@eyesoccer.id', 'Info Eyesoccer');
	$mail->addBCC('ebenk.rzq@gmail.com');

	//Content
	$mail->isHTML(true);                                  // Set email format to HTML
	$mail->Subject = 'Status Update Pemain';
	$mail->Body    = 'Kepada '.$member_name.',<br><br>
	Validasi Update Pemain anda diterima. Silahkan login ke https://www.eyesoccer.id dan akses member area anda.
	<br><br>
	Salam Eyesoccer';
	$mail->send();
	// echo 'Message has been sent';
	
	$result = mysqli_query($con,"SELECT * FROM tbl_tmp_player where player_id=".$id_player."");
	$set = "";
	while ($row = mysqli_fetch_assoc($result)) {
		foreach( $row as $field => $value) {
			if (end($row) !== $value) {
				if($field=="member_id"){
				
				}else if($field=="updateon"){
					$set .=$field."='".date('Y-m-d H:i:s')."',";
				}else if($field=="id"){
				
				}else if($field=="player_id"){
				
				}else if($field=="validation"){
				
				}else if($field=="newinsert"){
				
				}else if($field=="inserton"){
				
				}else if($field=="url"){
					$set .=$field."='".$value."'";
				}else{
					$set .=$field."='".$value."',";
				}
			}else{
				if($field=="member_id"){
				
				}else if($field=="updateon"){
					$set .=$field."='".date('Y-m-d H:i:s')."'";
				}else if($field=="id"){
				
				}else if($field=="player_id"){
				
				}else if($field=="validation"){
				
				}else if($field=="newinsert"){
				
				}else if($field=="inserton"){
				
				}else if($field=="url"){
					$set .=$field."='".$value."'";
				}else{
					$set .=$field."='".$value."'";
				}
			}
		}
	}
	$check1 = mysqli_query($con,"SELECT * FROM tbl_online_player where player_id=".$id_player."");
	// exit();
	$rowcountcheck1=mysqli_num_rows($check1);
	if($rowcountcheck1>0){
		$cmd=mysqli_query($con,"update tbl_player set ".$set." where player_id='$id_player'");
		$count=mysqli_affected_rows($con);
		if($count>0){
			mysqli_query($con,"update tbl_tmp_player set newinsert=0 where player_id=".$id_player."");
		}
	}
	
	$result = mysqli_query($con,"SELECT * FROM tbl_tmp_karir_player where player_id=".$id_player."");
	$set = "";
	$karir_id="";
	
	while ($rowkarir = mysqli_fetch_array($result)) {
		if($rowkarir['newinsert']==99){
			mysqli_query($con,"delete from tbl_tmp_karir_player where karir_id='".$rowkarir['karir_id']."'");
			mysqli_query($con,"delete from tbl_karir_player where karir_id='".$rowkarir['karir_id']."'");
		}
		mysqli_query($con,"update tbl_karir_player set bulan='".$rowkarir['bulan']."',tahun='".$rowkarir['tahun']."',klub='".$rowkarir['klub']."',turnamen='".$rowkarir['turnamen']."',negara='".$rowkarir['negara']."',jumlah_main='".$rowkarir['jumlah_main']."',no_pg='".$rowkarir['no_pg']."',pelatih='".$rowkarir['pelatih']."',timnas='".$rowkarir['timnas']."',updateon='".date('Y-m-d H:i:s')."' where karir_id='".$rowkarir['karir_id']."'");
		$count=mysqli_affected_rows($con);
		if($count>0){
			mysqli_query($con,"update tbl_tmp_karir_player set newinsert=0 where karir_id='".$rowkarir['karir_id']."'");
		}
		if($rowkarir['karir_id']==0){
			$sql = "insert into tbl_karir_player (player_id,bulan,tahun,klub,turnamen,negara,jumlah_main,no_pg,pelatih,timnas,createon) values ('".$id_player."','".$rowkarir['bulan']."','".$rowkarir['tahun']."','".$rowkarir['klub']."','".$rowkarir['turnamen']."','".$rowkarir['negara']."','".$rowkarir['jumlah_main']."','".$rowkarir['no_pg']."','".$rowkarir['pelatih']."','".$rowkarir['timnas']."','".date('Y-m-d H:i:s')."')";
			if (mysqli_query($con, $sql)) {
				$last_id = mysqli_insert_id($con);
				mysqli_query($con,"update tbl_tmp_karir_player set karir_id='".$last_id."',newinsert=0 where id='".$rowkarir['id']."'");
			}
		}
	}
	
// exit();
header("location:member_player_update?admin_id=$admin_id");

$_SESSION['admin_id']; 
?>