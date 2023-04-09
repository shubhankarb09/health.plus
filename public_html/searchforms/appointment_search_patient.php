
    <?php
                if(isset($_POST['search'])){
                    $q = filter_input(INPUT_POST, "q");
                    $db=mysqli_connect("localhost","group17","troopsstuck","group17");
                    if(mysqli_connect_errno()){
                        echo "Failed to connect". mysqli_connect_error();
                    }  
                    $getpatientdataquery= "SELECT * FROM Patient WHERE pname LIKE '%$q%'";

                    $result= mysqli_query($db,$getpatientdataquery);
                    while($row= mysqli_fetch_array($result)){
                        //displays the results as individual list when searched
                        $response .= "<li>". "ID=". $row['patientid'].", ".$row['pname']."</li>";
                    }
                    $response .="</ul>";
                    exit($response);

                }

      ?> 

<html>

<head>
    <meta name="viewport" content="with=device-width" ,initial-scale=1.0">
    <title>Search Patient appointment Form</title>
    <link rel="stylesheet" href="css/searchcss.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/jquery-1.12.4.js"></script>
    <script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700&display=swap"
        rel="stylesheet">
</head>

<body>

    <div class="form-style-10">
        <h1>Search Patient appointment !<span>Please select the patient to search all the appointments made by
                them</span></h1>
        <form action="php/appoinment_searchpatient.php" method="post">

            <div class="section"><span>1</span>Select patient:</div>
            <input type="search" placeholder="Enter Patient Name:" id="patientname" name="id">
            <div id="response" name="patientid"></div>

              <script>  //  use ajax to send selected entru to php
                 $(document).ready(function(){
                    $("#patientname").keyup(function(){
                        var query = $("#patientname").val();
                        if(query.length > 0){
                            $.ajax(
                                {
                                    url:'appointment_search_patient.php',
                                    method: "POST", 
                                    data: {
                                        search: 1,
                                        q: query
                                    },
                                    success: function(data){
                                        $("#response").html(data);
                                    },
                                    dataType: 'text'
                                }
                            )
                        }
                        
                    });

                    //update searchbox and auto-complete section when you click a suggestion
                    $(document).on('click', "li", function(){
                        var cur = $(this).text();
                        $("#patientname").val(cur);
                        $("#response").html("");
                    });
                 });
             </script>

            <div class="button-section">
                <input type="submit" name="Search" />


            </div>
        </form>
    </div>
   
</body>

</html>