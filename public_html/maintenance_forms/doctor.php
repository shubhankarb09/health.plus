<html>
    <head>
        <title> Doctor Results</title></head>
</head>
<body>
<?php
    $dbuname = $_POST['uname'];
    $dbpassword = $_POST['dbpw'];
    $fullname = $_POST['fullname'];
    $address = $_POST['address'];
    $dateofbirth = $_POST['dateofbirth'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];
    $expertiseid= $_POST['expertise'];
    $clinicid= $_POST['clinic'];
    $monitorstatus=0;

    $db = mysqli_connect("localhost", "group17admin", "AboveInside", "group17");
    if(mysqli_connect_errno()){
    echo "Failed to connect". mysqli_connect_error();
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
     $query= "INSERT INTO Doctor(doctorid ,clinicid, dname, eid, dateofbirth, gender, email,
    userpassword,accesstoken) 
    VALUES (NULL,$clinicid, '$fullname',$expertiseid, '$dateofbirth','$gender','$email','$password','$password')";
    if(!mysqli_query($odb,$query)){
        die('Error : you do not have access to Write to the database.'. mysqli_error($db));
    }
    echo "1 record added succesfully";
    $getdataquery= "SELECT * FROM Doctor ORDER BY doctorid DESC";
    $result= mysqli_query($odb,$getdataquery);
    while($row= mysqli_fetch_array($result)){
        echo "<br>Doctor name:" . $row['dname'] . "<br>
        Date of Birth:" . $row['dateofbirth'] ."<br>
        Gender:" . $row['gender'] ."<br>
        Email:" . $row['email'] ."<br>
        Clinic:" . $row['clinicid']  ."<br><br>";
    }
}else{
    die("User Authorization failed. Either username or password or both were incorrect");

}


?>


</body>
</html>
 