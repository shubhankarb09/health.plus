<html>
    <head>
        <title> Doctor Results</title></head>
</head>
<body>
<?php
  $username = $_POST['username'];
  $password = $_POST['password'];
  $db=mysqli_connect("localhost","group17","troopsstuck","group17");
  if(mysqli_connect_errno()){
    echo "Failed to connect". mysqli_connect_error();
}
$getdataquery= "SELECT * FROM usercredentials";
$result= mysqli_query($db, $getdataquery);
while ($row= mysqli_fetch_array($result)){
    if ($username==$row['username'] && $password==$row['password']){
        echo "Success";
        header('Location: maintenance.html');
    }else{
        echo "Error";

    }
}
?>


</body>
</html>
 