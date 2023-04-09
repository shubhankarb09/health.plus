<html>

<head>
    <title> >Expertise Results</title>
</head>
</head>

<body>
    <?php
$id = 0;
$ename = $_POST['ename'];
$dbuname = $_POST['uname'];
$dbpassword = $_POST['dbpw'];

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
    $query = "INSERT INTO Expertise(expertiseid ,ename) VALUES (NULL,'$ename')";
    if (!mysqli_query($odb, $query)) {
        die("Error : you do not have access to Write to the database." . mysqli_error($db));
    }
    echo "1 record added succesfully";
    $getdataquery = "SELECT * FROM Expertise ORDER BY expertiseid DESC";
    $result = mysqli_query($odb, $getdataquery);
    while ($row = mysqli_fetch_array($result)) {
        echo "<br>Expertise:" . $row['ename'] . "<br>";
    }

} else {
    die("User Authorization failed. Either username or password or both were incorrect");

}

?>


</body>

</html>