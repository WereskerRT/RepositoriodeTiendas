<?php
    include("database.php");
    $con = connection(); 
    
    $id = $_GET['id'];
    $sql = "DELETE FROM products WHERE id = '$id'";

    $query = mysqli_query($con, $sql);
    
    if ($query) {
    header("Location: user.php");
    }
?>