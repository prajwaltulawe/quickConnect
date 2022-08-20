<?php

    if($_SESSION['loggedin'] = true ){
        $server = "localhost";
        $username = "root";
        $password = "";
        $database = "instaProfileVisits";
        $connectionquery = mysqli_connect($server, $username, $password, $database);
        
        $getDataSqlQuery = "SELECT * FROM `instaprofilevisits`;";
        $result = mysqli_query($connectionquery, $getDataSqlQuery);
    } else {
        header("location: adminLogin.php");
    }

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css"/>
    <style>
      body {
        width: 100%;
        margin: auto;
        margin-top: 5%;
        font-family: "Courier New", Courier, monospace;
      }
    </style>
    <title>Visitors List</title>
  </head>
  <body>

    <?php
        if( $_SESSION['loggedin'] = true ){
            echo "
            <table id='table_id' class='display'>
            <thead>
                <tr>
                <th>ID</th>
                <th>Date</th>
                <th>Time</th>
                <th>IP</th>
                <th>Continent</th>
                <th>Country</th>
                <th>Region</th>
                <th>City</th>
                <th>Zip</th>
                <th>Latitude</th>
                <th>Longitude</th>
                <th>ISP</th>
                <th>As No.</th>
                <th>As Name</th>
                <th>App Name</th>
                <th>Platform</th>
                <th>Product</th>
                <th>User Agent</th>
                </tr>
            </thead>

            <tbody>";
                while($row = mysqli_fetch_assoc($result)){
                    echo "
                    <tr>
                        <td>".$row['id']."</td>
                        <td>".$row['visitedDate']."</td>
                        <td>".$row['visitedTime']."</td>
                        <td>".$row['ip']."</td>
                        <td>".$row['continent']."</td>
                        <td>".$row['country']."</td>
                        <td>".$row['regionName']."</td>
                        <td>".$row['city']."</td>
                        <td>".$row['zip']."</td>
                        <td>".$row['lat']."</td>
                        <td>".$row['lon']."</td>
                        <td>".$row['isp']."</td>
                        <td>".$row['asNum']."</td>
                        <td>".$row['asname']."</td>
                        <td>".$row['appName']."</td>
                        <td>".$row['platform']."</td>
                        <td>".$row['product']."</td>
                        <td>".$row['userAgent']."</td>
                    </tr>";
                }
            echo "    
            </tbody>
            </table>";
        }
    ?>

  </body>

  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.js"></script>
  <script>
    $(document).ready(function () {
      $("#table_id").DataTable({});
    });
  </script>
</html>
