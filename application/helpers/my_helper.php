<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// if ( ! function_exists('test_method'))
// {
//     function word_limiter($str, $limit, $end_char)
//     {
    
//     	if(trim($str) == ''){
//     		return $str;
//     	}


//     	preg_match('/^\s*+(?:\S++\s*+){1,'.(int) $limit.'}/', $str, $matches);

//     	if(strlen($str) == strlen($matches[0])){
//     		$end_char = '';
//     	}
//     	return rtrim($matches[0]).$end_char;
//     }  
// }

if( ! function_exists('relative_time'))
{
    function relative_time($datetime)
    {
        $CI =& get_instance();
        $CI->lang->load('date');

        if(!is_numeric($datetime))
        {
            $val = explode(" ",$datetime);
           $date = explode("-",$val[0]);
           $time = explode(":",$val[1]);
           $datetime = mktime($time[0],$time[1],$time[2],$date[1],$date[2],$date[0]);
        }

        $difference = time() - $datetime;
        $periods = array("second", "minute", "hour", "day", "week", "month", "year", "decade");
        $lengths = array("60","60","24","7","4.35","12","10");

        if ($difference > 0) 
        { 
            $ending = $CI->lang->line('date_ago');
        } 
        else 
        { 
            $difference = -$difference;
            $ending = $CI->lang->line('date_to_go');
        }
        for($j = 0; $difference >= $lengths[$j]; $j++)
        {
            $difference /= $lengths[$j];
        } 
        $difference = round($difference);

        if($difference != 1) 
        { 
            $period = strtolower($CI->lang->line('date_'.$periods[$j].'s'));
        } else {
            $period = strtolower($CI->lang->line('date_'.$periods[$j]));
        }

        return "$difference $period $ending";
    }
}
//sw:begin
/* DEFINE */
define('CSSPATH',base_url().'assets/eyeme/css/');
define('JSPATH',base_url().'assets/eyeme/js/');
define('sIMGPATH',base_url().'assets/eyeme/img/');
define('MEURL',base_url().'eyeme/');
define('MEIMG',base_url().'img/eyeme/');
define('EYEMEPATH',base_url().'eyeme/');
define('MEPROFILE',base_url().'eyeme/profile/');
define('DPIC',sIMGPATH.'user-discover.png');
define('NOW',date('Y-m-d G:i:s'));

function p($arr){
    echo '<pre>';
     print_r($arr);
    echo '</pre>';

}
function cryptPass($str){
    return md5($str);
}
function inputSecure($input){
    $input = trim(strip_tags(str_replace("'",'',$input)));
    
    return $input;
}
function getDistance($time1,$time2){
    $distance =  strtotime($time1) - strtotime($time2);
    return $distance;

}
function getTime($timeStamp){
    $timeString = ""; 
    $day       = floor($timeStamp / (3600 * 24));
    $hours     = floor(($timeStamp % (3600 * 24)) / 3600 );
    $minute    = (floor($timeStamp) / 60) % 60;
    $secon     = floor($timeStamp % 60);

    if($day  > 0){
        $timeString  .= $day.' Hari yang lalu';
    }
    elseif($hours > 0 AND $day <= 0 ){
        $timeString .= $hours.' Jam Yang lalu';
    }
    elseif($minute > 0 AND $hours <= 0 AND $day <= 0 ){
        $timeString  .= $minute.' Menit yang lalu';
    }
   else{
        $timeString = $secon.' Detik Yang lalu';
    }
    return array('day' => $day,'hours'=> $hours,'minute'=> $minute,'secon'=>$secon,'timeString' => $timeString);
}

if ( ! function_exists('image_resize'))
{
    function image_resize($width, $height, $crop=0, $src, $dst='')
    {
        if(!list($w, $h) = getimagesize($src)) return "Unsupported picture type!";
        
        if($w < $width || $h < $height)
        {
            if($w < $h){
                $width = $height = $w;
            }else{
                $width = $height = $h;
            }
        }
              
        $dirName = 'thumb'; 
        $exp        = explode('/',$src);
        $img        = $exp[count($exp)-1]; // image name
        
        array_splice($exp,-1);
        $cropPath   = implode('/',$exp).'/'.$dirName; // folder path for crop
        $cropDst    =$cropPath.'/'.$img;
        
        $dst = $dst == '' ? $cropDst : $dst;
        
        #check dir exist for thumb
        $dirExist = is_dir($cropPath);
        if(!$dirExist){mkdir($cropPath);}       
    
        $type = strtolower(substr(strrchr($src,"."),1));
        if($type == 'jpeg') $type = 'jpg';
        switch($type){
            case 'bmp': $img = imagecreatefromwbmp($src); break;
            case 'gif': $img = imagecreatefromgif($src); break;
            case 'jpg': $img = imagecreatefromjpeg($src); break;
            case 'png': $img = imagecreatefrompng($src); break;
            default : return "Unsupported picture type!";
        }
        
        // resize
        if($crop){
            if($w < $width or $h < $height) return "Picture is too small!";
            $ratio = max($width/$w, $height/$h);
            $h = $height / $ratio;
            $x = ($w - $width / $ratio) / 2;
            $w = $width / $ratio;
        }else{
            if($w < $width and $h < $height) return "Picture is too small!";
            $ratio = min($width/$w, $height/$h);
            $width = $w * $ratio;
            $height = $h * $ratio;
            $x = 0;
        }
        
        $new = imagecreatetruecolor($width, $height);
        
        // preserve transparency
        if($type == "gif" or $type == "png"){
            imagecolortransparent($new, imagecolorallocatealpha($new, 0, 0, 0, 127));
            imagealphablending($new, false);
            imagesavealpha($new, true);
        }
        
        imagecopyresampled($new, $img, 0, 0, $x, 0, $width, $height, $w, $h);
        
        switch($type){
            case 'bmp': imagewbmp($new, $dst); break;
            case 'gif': imagegif($new, $dst); break;
            case 'jpg': imagejpeg($new, $dst); break;
            case 'png': imagepng($new, $dst); break;
        }
        
        #echo '<br><b>'.$type.'</b><br>';
        return true;
    }
}
//sw:end
function getOngkir($tujuan,$berat)
{
    $berat_kg   = $berat / 1000;

    $berat_fix  = round($berat_kg);

    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => "http://apiv2.jne.co.id:10101/tracing/api/pricedev",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => "username=MATABOLA&api_key=4703a7e30643c286460874b14feab0d9&from=CGK10000&thru=$tujuan&weight=$berat_kg",
        CURLOPT_HTTPHEADER => array(
            "content-type: application/x-www-form-urlencoded",
            "accept: application/json"
        ),
    ));

    $response   = curl_exec($curl);
    $err        = curl_error($curl);

    curl_close($curl);

    if ($err) {
      return "cURL Error #:" . $err;
    } else {
      // echo $response;
      return json_decode($response);
    }
}

function imgUrl()
{
    return "https://www.eyesoccer.id/";
}

function load_top_avatar()
{
	$CI =& get_instance();
	$prof_pic=$CI->db->query("SELECT b.pic FROM tbl_member a left join tbl_gallery b ON b.id_gallery=a.profile_pic WHERE id_member='".$_SESSION["id_member"]."'")->row()->pic;
	
	return $prof_pic;
}

function load_top_name()
{
	$CI =& get_instance();
	$prof_name=$CI->db->query("SELECT a.name FROM tbl_member a left join tbl_gallery b ON b.id_gallery=a.profile_pic WHERE id_member='".$_SESSION["id_member"]."'")->row()->name;
	
	return $prof_name;
}