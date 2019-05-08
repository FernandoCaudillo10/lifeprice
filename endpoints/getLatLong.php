<?php
    function getLatLong($addresses){
        //step1
        $cSession = curl_init();
        
        $results = array();
        for($i=0; $i<count($addresses); $i++){
            str_replace(" ", "+", $addresses[i]);
            strtolower($addresses[i]);
            curl_setopt($cSession,CURLOPT_URL,"https://maps.googleapis.com/maps/api/geocode/json?address="+$addresses[i]+"&components=country:US"+
            "&key=AIzaSyAK6FgtutsSg1mD4qiwNsSYxWzP_C-XQbg");
            curl_setopt($cSession,CURLOPT_RETURNTRANSFER,true);
            curl_setopt($cSession,CURLOPT_HEADER, false);
            
            $results.push(curl_exec($cSession));
            $err = curl_error($cSession);
        }
        
        //step4
        curl_close($cSession);
        
        //step5
        echo $results;
    }
?>