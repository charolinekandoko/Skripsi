<?php
    // Connect to the database
    
    require '../Include/database.php';
    $id= $_GET["id"];
    $mp= query("SELECT * FROM mousepad 
    JOIN merk ON mousepad.merk_id = merk.merk_id 
    WHERE mousepad.merk_id=$id");
?>