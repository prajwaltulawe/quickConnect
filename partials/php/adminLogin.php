<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "instaProfileVisits";
    $connectionquery = mysqli_connect($server, $username, $password, $database);

    $loginid = $_POST["loginid"];
    $password = $_POST["linpasssword"];
    $linsqlquery = "Select * from admin where loginid ='$loginid';";
    $result = mysqli_query($connectionquery, $linsqlquery);
    $pass = mysqli_fetch_assoc($result);
    if ($password == $pass['passwd']) {
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $loginid;
        header("location: showVisits.php");
    } else {
    }
}
?>

<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</head>

<body>
    <body>
        <div class="container" style="display: flex;flex-direction: column;align-items: center; padding-top: 6%;">
            <span class="mb-5" style="font-size: 2rem">Insta Profile Visitors</span>
            <form style="display: flex; display: contents;" action="adminLogin.php" method="POST">
                <div class="mb-3 col-md-4" style="font-size: 17px;line-height: 28px;">
                    <label for="exampleInputEmail1" class="form-label">Login id</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="loginid" aria-describedby="emailHelp" required>
                </div>
                <div class="mb-3 col-md-4" style="font-size: 17px;line-height: 28px;">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" id="exampleInputEmail1" name="linpasssword" aria-describedby="emailHelp" required>
                </div>
                <div class="mb-3 col-md-4" style="font-size: 10px;line-height: 17px; align-content: center;">
                    <label for="exampleInputPassword1" class="form-label"></label>
                    <button type="submit" class="btn btn-primary col-md-12">Login</button>
                </div>
            </form>
        </div>
    </body>
</html>