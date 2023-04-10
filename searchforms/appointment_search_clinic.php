
    <?php
                if(isset($_POST['search'])){
                    $q = filter_input(INPUT_POST, "q");
                    $db=mysqli_connect("localhost","group17","troopsstuck","group17");
                    if(mysqli_connect_errno()){
                        echo "Failed to connect". mysqli_connect_error();
                    }  
                    $getpatientdataquery= "SELECT * FROM Clinic WHERE cname LIKE '%$q%'";

                    $result= mysqli_query($db,$getpatientdataquery);
                    while($row= mysqli_fetch_array($result)){
                        //displays the results as individual list when searched
                        $response .= "<li>". "ID=". $row['clinicid'].", ".$row['cname']."</li>";
                    }
                    $response .="</ul>";
                    exit($response);

                }

      ?> 
<html>

<head>
    <meta name="viewport" content="with=device-width" ,initial-scale=1.0">
    <title>Search Clinic appointment Form</title>
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
        <h1>Search appointments for the Clinic!<span>Please select the clinic and date to search all the
                appointments</span></h1>
        <form action="php/appointment_searchclinic.php" method="post">

            <div class="section"><span>1</span>Select patient:</div>
            <input type="search" placeholder="Enter Clinic Name:" id="patientname" name="id">
            <div id="response" name="patientid"></div>
            <script>  //  use ajax to send selected entru to php
                 $(document).ready(function(){
                    $("#patientname").keyup(function(){
                        var query = $("#patientname").val();
                        if(query.length > 0){
                            $.ajax(
                                {
                                    url:'appointment_search_clinic.php',
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
            <label for="start">Select date:</label>

            <input type="date" id="date" name="selecteddate" value="2022-11-02" min="2022-11-02" max="2022-12-02">

            <div class="button-section">
                <input type="submit" name="Search" />
            </div>
        </form>
    </div>

</body>

</html>