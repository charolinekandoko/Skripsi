<?php
// Connect to the database
require '../Include/database.php';

// Backend
if(isset($_POST["submit"])){
    if(add($_POST) > 0){
        header("Location: admin.php");
    } else{
        echo "
        <script> 
            alert('Gagal menambahkan data admin terbaru!'); 
        </script>
        ";
    }
}

function add($detail){
    global $conn;

    $email = stripslashes($detail["email"]);
    $password = mysqli_real_escape_string($conn, $detail["password"]);

    $result = mysqli_query($conn, "SELECT email FROM admin WHERE email = '$email'");
    if(mysqli_fetch_assoc($result)){
        echo "<script>
                alert('Email telah terdaftar!');
            </script>";
        return false;
    }

    $password = password_hash($password, PASSWORD_DEFAULT);

    $tambah = mysqli_query($conn, "INSERT INTO admin VALUES('','$email', '$password')");
    return mysqli_affected_rows($conn);
}
?>