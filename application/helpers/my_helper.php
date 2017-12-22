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
/* definisi variable */
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

function getOngkir($tujuan,$berat)
{
    $berat_kg = 0;

    if ($berat <= 1400)
    {
        $berat_kg = 1;
    }
    else
    if ($berat > 1400 && $berat <= 2400)
    {
        $berat_kg = 2;
    }
    else
    if ($berat > 2400 && $berat <= 3400)
    {
        $berat_kg = 3;
    }
    else
    if ($berat > 3400 && $berat <= 4400)
    {
        $berat_kg = 4;
    }
    else
    if ($berat > 4400 && $berat <= 5400)
    {
        $berat_kg = 5;
    }
    else
    if ($berat > 5400 && $berat <=6400)
    {
        $berat_kg = 6;
    }
    else
    if ($berat > 6400 && $berat <= 7400)
    {
        $berat_kg = 7;
    }
    else
    if ($berat > 7400 && $berat <= 8400)
    {
        $berat_kg = 8;
    }
    else
    if ($berat > 8400 && $berat <= 9400)
    {
        $berat_kg = 9;
    }
    else
    if ($berat > 9400 && $berat <= 10400)
    {
        $berat_kg = 10;
    }

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