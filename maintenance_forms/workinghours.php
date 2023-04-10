
 <html>
    <head>
        <title> Clinic Results</title></head>
</head>
<body>
<?php
 $dbuname = $_POST['uname'];
 $dbpassword = $_POST['dbpw'];
 $clinicid = $_POST['clinic'];
    $week11 = $_POST['week11'];
    $week12 = $_POST['week12'];
    $week21 = $_POST['week21'];
    $week22 = $_POST['week22'];
    $week31 = $_POST['week31'];
    $week32 = $_POST['week32'];
    $week41 = $_POST['week41'];
    $week42 = $_POST['week42'];
    $week51 = $_POST['week51'];
    $week52 = $_POST['week52'];
    $week61 = $_POST['week61'];
    $week62 = $_POST['week62'];
    $week71 = $_POST['week71'];
    $week72 = $_POST['week72'];
    $monitorstatus=0;

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
         $query= "INSERT INTO WorkingHours(whid ,clinicid, dayofweek, starttime, endtime) 
        VALUES (NULL,$clinicid,'Sunday','$week11','$week12'),(NULL,$clinicid,'Monday','$week21','$week22'),(NULL,1,$clinicid,'$week31','$week32')
        ,(NULL,$clinicid,'Wednesday','$week41','$week42'),(NULL,$clinicid,'Thursday','$week51','$week52'),(NULL,1,$clinicid,'$week61','$week62')
        ,(NULL,$clinicid,'Saturday','$week71','$week72')";
        if(!mysqli_query($odb,$query)){
            die('Error : you do not have access to Write to the database.'. mysqli_error($db));
        }
        echo "1 record added succesfully";
        $getdataquery= "SELECT * FROM WorkingHours ORDER BY whid DESC";
        $result= mysqli_query($odb,$getdataquery);
        while($row= mysqli_fetch_array($result)){
            echo "<br>Clinic id:" . $row['clinicid'] . "<br>
            Day:" . $row['dayofweek'] ."<br>
            Start Time:" . $row['starttime'] ."<br>
            End Time:" . $row['endtime'] ."<br>
            <br>";
        }
    }else{
        die("User Authorization failed. Either username or password or both were incorrect");
    
    }
 

?>

</body>
</html>
 



