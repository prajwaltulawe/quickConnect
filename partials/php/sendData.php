<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "instaprofilevisits";

    $connectionquery = mysqli_connect($server, $username, $password, $database);
    $ip = $_POST["ip"] ?? "";
    $continent = $_POST["continent"] ?? "";
    $country = $_POST["country"] ?? "";
    $regionName = $_POST["regionName"] ?? "";
    $city = $_POST["city"] ?? "";
    $zip = $_POST["zip"] ?? "";
    $lat = $_POST["lat"] ?? "";
    $lon = $_POST["lon"] ?? "";
    $isp = $_POST["isp"] ?? "";
    $as = $_POST["as"] ?? "";
    $asname = $_POST["asname"] ?? "";
    $appName = $_POST["appName"] ?? "";
    $platform = $_POST["platform"] ?? "";
    $product = $_POST["product"] ?? "";
    $userAgent = $_POST["userAgent"] ?? "";
    
    $sql = "INSERT INTO `instaprofilevisits` 
            (`ip`, `continent`, `country`, `regionName`, `city`, `zip`, `lat`, `lon`, `isp`, `asNum`, `asname`, `appName`, `platform`, `product`, `userAgent`) 
            VALUES 
            ('$ip', '$continent', '$country', '$regionName', '$city', '$zip', '$lat', '$lon', '$isp', '$as', '$asname', '$appName', '$platform','$product', '$userAgent');";
    $result = mysqli_query($connectionquery, $sql);
    echo $sql;
    
    if ($result){
    }
    else{
    }
}
?>