<html>

<head>
    <title> Clinic Results</title>
</head>
</head>

<body>
    <?php
$dbuname = $_POST['uname'];
$dbpassword = $_POST['dbpw'];
$holidates = $_POST['holidates'];
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
if($monitorstatus>0){
    $odb = mysqli_connect("localhost", $dbuname, $dbpassword, "group17");
    if (mysqli_connect_errno()) {
        echo "Failed to connect" . mysqli_connect_error();
    }
     $query = "INSERT INTO Holidays(hid ,clinicid, dateofholiday, dayofweek) 
    VALUES (NULL,1,'$holidates','Friday')";
    if (!mysqli_query($odb, $query)) {
        die('Error : you do not have access to Write to the database.' . mysqli_error($db));
    }
    echo "1 new record added succesfully<br><br>";
    echo "Getting holidays data:";
    $getdataquery = "SELECT * FROM Holidays ORDER BY hid DESC";
    $result = mysqli_query($odb, $getdataquery);
    while ($row = mysqli_fetch_array($result)) {
        echo "<br>Clinic id:" . $row['clinicid'] . "
        <br>Date of Holiday: " . $row['dateofholiday'] .  "<br>";
    }

}else{
    die("User Authorization failed. Either username or password or both were incorrect");

}

?>


</body>

</html>