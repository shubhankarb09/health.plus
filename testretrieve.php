<?php
    $db= mysqli_connect("localhost","root","","test");
    if(mysqli_connect_errno()){
        echo "Failed to connect to MYSQL: " . mysqli_connect_error();
    }else{
        echo "Connected";
    }
        $sql= "SELECT * FROM Clinic";
    $result=mysqli_query($db,$sql);
    $names=mysqli_fetch_all($result,MYSQLI_ASSOC);

    if(mysqli_query($db, $query)){
        echo('Error: '. mysqli_error($db));
    }else{
        echo "Worked";
    }
    echo "here";
?>

<!DOCTYPE html>
<html>  
    <body>
    <h4 class="center grey-text">Pizzas!</h4>
    <div class="container">
        <div class="row">
            <?php foreach($names as $name){ ?>
                <div class="col s6 md3">
                <div class="card z-depth-0">
                <div class="card-content center">
                <h6><?php echo htmlspecialchars($name['ename']); ?><h6>
            </div>
            <div class="card-action right-align">
                <a class="brand-text" href="#">more info</a>
            </div>
            </div>
            </div>
                <?php } ?>
            </div>
            </div>
            </body>

</html>  