<?php

    // $url = "http://localhost/interview/sekanisystem/endpoints/write.php";


    function ApiCalls($method, $url, $data){
        $curl = curl_init();
        if($method == "POST"){
            curl_setopt($curl, CURLOPT_POST, 1);
            if ($data) curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        }else{
            curl_setopt($client,CURLOPT_RETURNTRANSFER,true);
        }
    
        // OPTIONS:
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
           'Content-Type: application/json',
        ));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        // EXECUTE:
        $result = curl_exec($curl);
        if(!$result){die("Connection Failure");}
        curl_close($curl);
        return $result;
     }
	
	


?>