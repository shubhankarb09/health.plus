<html>
<head>
        <meta name="viewport" content="with=device-width",initial-scale=1.0">                                                                   
        <title>Doctor Form</title>
        <link rel="stylesheet" href="patientform.css">  
        <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">                     
    </head>
<body>

<div class="form-style-10">
<h1>Doctor Sign Up !<span>Sign up as a doctor to see your upcoming appointments</span></h1>
<form action="doctor.php" method="post">
<div class="section"><span>1</span>DB</div>
    <div class="inner-wrap">
        <label>DB uname<input type="text" name="uname" /></label>
        <label>Password <input type="password" name="dbpw" /></label>
    </div>
<div class="section"><span>2</span>First Name & Address</div>
    <div class="inner-wrap">
        <label>Your Full Name <input type="text" name="fullname" /></label>
        <label>Address <textarea name="address"></textarea></label>        <label>Date of Birth <input type="text" name="dateofbirth" /></label>
        <label>Gender <textarea name="gender"></textarea></label>
    </div>

    <div class="section"><span>3</span>Email & Phone</div>
    <div class="inner-wrap">
        <label>Email Address <input type="email" name="email" /></label>
        <expertiselabel>Choose Expertise:</expertiselabel>
        <select name ="expertise"><?php
      $db=mysqli_connect("localhost","group17","troopsstuck","group17");
      if(mysqli_connect_errno()){
          echo "Failed to connect". mysqli_connect_error();
      }  
      $getexpdataquery= "SELECT * FROM Expertise;";
      $result= mysqli_query($db,$getexpdataquery);
      while($row= mysqli_fetch_array($result)){
        echo "<option value='".$row['expertiseid']."'>".$row['ename']."</option>";
      }
      ?>    </select>
    <expertiselabel>Choose Clinic:</expertiselabel>
    <select name ="clinic"><?php
      $db=mysqli_connect("localhost","group17","troopsstuck","group17");
      if(mysqli_connect_errno()){
          echo "Failed to connect". mysqli_connect_error();
      }  
      $getexpdataquery= "SELECT * FROM Clinic;";
      $result= mysqli_query($db,$getexpdataquery);
      while($row= mysqli_fetch_array($result)){
        echo "<option value='".$row['clinicid']."'>".$row['cname']."</option>";
      }
      ?>    </select>
</div>


    <div class="section"><span>4</span>Passwords</div>
        <div class="inner-wrap">
        <label>Password <input type="password" name="password" /></label>
        <label>Confirm Password <input type="password" name="confirmpassword" /></label>
    </div>
    <div class="button-section">
     <input type="submit" name="Sign Up" />
     <span class="privacy-policy">
     <input type="checkbox" name="field7">You agree to our Terms and Policy. 
     </span>
    </div>
</form>
</div>                                                                                                               
        
</body>
</html>
 
