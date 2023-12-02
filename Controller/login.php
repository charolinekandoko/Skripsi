<?php
    // Connect to the database
    require '../Include/database.php';

    // Backend
    if (isset($_POST["login"])){
        $email    = $_POST["email"];
        $password = $_POST["password"];

        $result = mysqli_query($conn, "SELECT * FROM admin WHERE email = '$email'");
        
        if(mysqli_num_rows($result) === 1){
            $row = mysqli_fetch_assoc($result);

            if (password_verify($password, $row["password"])){
            $_SESSION ["login"]= true ;
            $_SESSION['admin_id'] = $row['admin_id'];

            header("Location: admin.php");
            exit();
            }
        }
        $error = true;
    }
?>