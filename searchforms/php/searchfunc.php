
 <html>
    <head>
        <title> Search Results</title></head>
</head>
<body>
<?php
   $eid = $_POST['id'];
   $dname="";
   $gender="";
   $email="";
   $expertiseid="";
$db=mysqli_connect("localhost","group17","troopsstuck","group17");
if(mysqli_connect_errno()){
    echo "Failed to connect". mysqli_connect_error();
}
parse_str($eid, $output);
$parsedid=$output['ID'];
$getdataquery= "SELECT * FROM Doctor WHERE eid='$parsedid'";
$result= mysqli_query($db,$getdataquery);
while($row= mysqli_fetch_array($result)){
    $dname=$row['dname'];
    $gender=$row['gender'];
    $email=$row['email'];
    $expertiseid=$row['eid'];
    echo "<a href='doctor_search_detail.php?dname=$dname&gender=$gender&email=$email&eid=$expertiseid'>
    <br>Doctor name:" . $row['dname'] . "<br>
    Gender:" . $row['gender'] ."<br>
    Email:" . $row['email'] ."<br>
    eid:" . $row['eid']."</a><br><br>";

}

?>



</body>
</html>
 
   
   




