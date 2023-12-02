<?php
    // Connect to the database
    
    require '../Include/database.php';
    $id = $_GET ["id"];
    mysqli_query($conn, "DELETE FROM mousepad WHERE mousepad_id = $id");
    header("Location: ../View/admin.php");
?>
