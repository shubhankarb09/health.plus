
 <html>
    <head>
        <title> Search Results</title></head>
</head>
<body>
<?php
   $patientid = $_POST['id'];
$bookdate='';
$timeofday='';
$preferreddoctor='';

$db=mysqli_connect("localhost","group17","troopsstuck","group17");
if(mysqli_connect_errno()){
    echo "Failed to connect". mysqli_connect_error();
}
$pidstack=array();
$cidstack=array();
$eidstack=array();
$bookdatestack=array();
$timeofdaystack=array();
$assigneddoctorstack=array();
parse_str($patientid, $output);
$parsedid=$output['ID'];

$getappointmentsquery= "SELECT * FROM Appointment WHERE patientid='$parsedid'";
$result= mysqli_query($db,$getappointmentsquery);
while($row= mysqli_fetch_array($result)){
 array_push($pidstack,$row['patientid']);
 array_push($cidstack,$row['clinicid']);
 array_push($eidstack,$row['expertiseid']);
 array_push($bookdatestack,$row['bookdate']);
 array_push($timeofdaystack,$row['timeofday']);
 array_push($assigneddoctorstack,$row['assigneddoctor']);
}

for($i=0;$i<count($pidstack);$i++){

    $pnameresult= mysqli_query($db,
    "SELECT pname FROM Patient WHERE patientid='$pidstack[$i]'");
    $pnamerow=mysqli_fetch_array($pnameresult);

    $cnameresult= mysqli_query($db,
    "SELECT cname FROM Clinic WHERE clinicid='$cidstack[$i]'");
    $cnamerow=mysqli_fetch_array($cnameresult);

    $enameresult= mysqli_query($db,
    "SELECT ename FROM Expertise WHERE expertiseid='$eidstack[$i]'");
    $enamerow=mysqli_fetch_array($enameresult);
    
    echo "<a href='patient_search_detail.php?pname=$pnamerow[0]&cname=$cnamerow[0]&ename=$enamerow[0]
    &bookdate=$bookdatestack[$i]&timeofday=$timeofdaystack[$i]&assigneddoctor=$assigneddoctorstack[$i]'>"
    .$pnamerow[0]."<br>".
    $cnamerow[0]."<br>".$enamerow[0]."<br>".$bookdatestack[$i]."<br>".$timeofdaystack[$i]."<br>".
    $assigneddoctorstack[$i]."<br><br></a>";
}
?>



</body>
</html>
 
   
   




