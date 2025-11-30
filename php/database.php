<?php
    function connection() {
        
    $db_server = "localhost";
    $db_user = "root";
    $db_password = "";

    $db_database = "omegaMart";

    $conn = mysqli_connect($db_server,$db_user, $db_password);
    
    mysqli_select_db($conn, $db_database);

        return $conn;
    }

?>