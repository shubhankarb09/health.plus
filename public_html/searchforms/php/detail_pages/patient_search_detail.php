
 <html>
    <head>
        <title> Search Results</title></head>
</head>
<body>
    <h1>Individual Patient Search Result Below:</h1><br>
<?php
  
  $pname=$_GET['pname'];
  $cname=$_GET['cname'];
  $ename=$_GET['ename'];
  $bookdate=$_GET['bookdate'];
  $timeofday=$_GET['timeofday'];
  $assigneddoctor=$_GET['assigneddoctor'];
  echo "Appointment for:".$pname."<br>";
  echo "Clinic:".$cname."<br>";
  echo "Assigned Doctor:".$assigneddoctor."<br>";
  echo "Date:".$bookdate."<br>";
  echo "Time:".$timeofday."<br>";
  echo "Expertise:".$ename."<br>";

?>



</body>
</html>
 
   
   





