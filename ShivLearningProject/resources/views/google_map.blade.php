<?php
function getAddress($latitude,$longitude){
    if(!empty($latitude) && !empty($longitude)){
        //Send request and receive json data by address
        $geocodeFromLatLong = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?latlng=30.3752011,76.782122&sensor=false&key=AIzaSyBdsjb_RUMEkFt5eBE1iyaHrY-FVEiyMSI'); 
        $output = json_decode($geocodeFromLatLong);
        $status = $output->status;
        //Get address from json data
        $address = ($status=="OK")?$output->results[1]->formatted_address:'';
        //Return address of the given latitude and longitude
        if(!empty($address)){
            return $address;
        }else{
            return false;
        }
    }else{
        return false;   
    }
}

?>