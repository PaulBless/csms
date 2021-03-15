<?php
if(isset($_POST["country"])){
    // Capture selected country
    $country = $_POST["country"];
     
    // Define country and city array
    $countryArr = array(
                    "usa" => array("Select", "Amsterdam","New York", "Los Angeles", "California", "Pensylvania", "Connecticut"),
                    "india" => array("Select","Mumbai", "New Delhi", "Bangalore", "Noida", "Chennai", "Uttar Pradesh"),
                    "uk" => array("Select","London", "Manchester", "Brighton", "Liverpool", "Everton"),
                    "ghana" => array("Select", "Accra", "Kumasi", "Takoradi", "Tamale","Cape Coast", "Bolgatanga", "Koforidua")
                );
     
    // Display city dropdown based on country name
    if($country !== 'Select here'){
        foreach($countryArr[$country] as $value){
            echo "<option>". $value . "</option>";
        }
    } 
}
?>