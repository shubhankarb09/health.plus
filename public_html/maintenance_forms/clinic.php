<html>

<head>
    <title> Clinic Results</title>
</head>
</head>

<body>
    <?php
$dbuname = $_POST['uname'];
$dbpassword = $_POST['dbpw'];
$name = $_POST['name'];
$address = $_POST['address'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$password = $_POST['password'];
$confirmpassword = $_POST['confirmpassword'];
$monitorstatus = 0;

$db = mysqli_connect("localhost", "group17admin", "AboveInside", "group17");
if (mysqli_connect_errno()) {
    echo "Failed to connect" . mysqli_connect_error();
}
$userquery = "SELECT * FROM usercredentials";
$userqueryresult = mysqli_query($db, $userquery);
while ($row = mysqli_fetch_array($userqueryresult)) {
    if ($dbuname == $row['username'] && $dbpassword == $row['password']) {
        $monitorstatus++;
    }
}
if ($monitorstatus > 0) {
    $odb = mysqli_connect("localhost", $dbuname, $dbpassword, "group17");
    if (mysqli_connect_errno()) {
        echo "Failed to connect" . mysqli_connect_error();
    }
     $query = "INSERT INTO Clinic(clinicid ,cname, caddress, email, userpassword, accesstoken, expertiseid) 
    VALUES (NULL,'$name','$address','$email','$password','$password',1)";
    if (!mysqli_query($odb, $query)) {
        die('Error : you do not have access to Write to the database.' . mysqli_error($db));
    }
    echo "1 record added succesfully";

    $getdataquery = "SELECT * FROM Clinic ORDER BY clinicid DESC";
    $result = mysqli_query($odb, $getdataquery);
    while ($row = mysqli_fetch_array($result)) {
        echo "<br>Clinic name:" . $row['cname'] . "<br>
    Address:" . $row['caddress'] . "<br>
    Email:" . $row['email']  . "<br><br>";
    }

} else {
    die("User Authorization failed. Either username or password or both were incorrect");

}






?>

</body>

</html>