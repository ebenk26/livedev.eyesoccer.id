<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
    
class Excurl {
    
    /**
     * Default options for every request
     * @static
     */
    public static $curlOptions = array();
    
    function reqDataInfo($url, $cred = '', $data = array())
    {
        $ch = curl_init($url);
        $items = array(
            CURLOPT_URL => $url,
            CURLOPT_USERPWD => $cred
        );
        
        if(count($data) > 0)
        {
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        }
        curl_setopt($ch, CURLOPT_USERPWD, $cred);
        
        ob_start();
            $response = curl_exec($ch);
            $contents = ob_get_contents();
        ob_end_clean();
        $info = curl_getinfo($ch);

        $errno = curl_errno($ch);
        $error = curl_error($ch);
        curl_close($ch);
        
        return array('response' => $response, 'contents' => $contents, 'errno' => $errno, 'error' => $error, 'info' => $info);//return 
    }

    function reqData($url, $cred = '', $data = array())
    {	
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        
        if(count($data) > 0)
        {
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        }
        
        // Optional, delete this line if your API is open
        curl_setopt($ch, CURLOPT_USERPWD, $cred);
        
        $buffer = curl_exec($ch);
        curl_close($ch);
        
        return $buffer;
    }
    
    function reqOAuth2($url, $cred = '',  $data = '')
    {
        $ch = curl_init();
        
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_USERPWD, $cred);
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
        
        if($data != '')
        {
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($ch, CURLOPT_POST, true);
            
            $split = explode(".", $url);
            if(isset($split[1]) AND $split[1] == 'rajaongkir')
            {
                curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                    'content-type: application/x-www-form-urlencoded',
                    "key: $cred"
                ));
            } else {
                curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
                curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                    'Content-Type: application/json',
                    'Accept: application/json',
                    'Authorization: Basic ' . base64_encode($cred)
                ));
            }
        } else {
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                "key: $cred"
            ));
        }
        
        //curl_setopt($ch, CURLOPT_POST, true);
        //curl_setopt($ch, CURLOPT_POSTFIELDS, "grant_type=client_credentials");
        
        $result = curl_exec($ch);
        curl_close($ch);
        
        return $result;
    }
    
    function remoteCall($url, $cred = '',  $data = '')
    {
    	$ch = curl_init();
    	$curl_options = array(
    	    CURLOPT_URL => $url,
    	    CURLOPT_HTTPHEADER => array(
    		'Content-Type: application/json',
    		'Accept: application/json',
    		'Authorization: Basic ' . base64_encode($cred)
    	    ),
                CURLOPT_SSL_VERIFYPEER => false,
    	    CURLOPT_RETURNTRANSFER => true
    	);
            
    	if(count(Excurl::$curlOptions))
    	{
    	    // We need to combine headers manually, because it's array and it will no be merged
    	    if (Excurl::$curlOptions[CURLOPT_HTTPHEADER])
    	    {
    		$mergedHeders = array_merge($curl_options[CURLOPT_HTTPHEADER], Excurl::$curlOptions[CURLOPT_HTTPHEADER]);
    		$headerOptions = array(
    		    CURLOPT_HTTPHEADER => $mergedHeders
    		);
    	    } else {
    		$mergedHeders = array();
    	    }
                
    	    $curl_options = array_replace_recursive($curl_options, Excurl::$curlOptions, $headerOptions);
    	}
            
    	if(is_array($data))
    	{
    	    $curl_options[CURLOPT_POST] = 1;
                $curl_options[CURLOPT_POSTFIELDS] = ($data) ? json_encode($data) : '';
    	}
            
    	curl_setopt_array($ch, $curl_options);
    	$result = curl_exec($ch);
    	$info = curl_getinfo($ch);
            
    	// curl_close($ch);
            
    	if($result === FALSE)
    	{
    	    throw new Exception('CURL Error: ' . curl_error($ch) , curl_errno($ch));
    	} else {
    	    return $result;
    	}
    }
    
}