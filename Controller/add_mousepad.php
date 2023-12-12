<?php
// Connect to the database
require '../Include/database.php';

// Backend
if (isset($_POST["submit"])) {
    $pos = $_POST['merk'];
    $rip = query("SELECT * FROM merk WHERE merk_id = $pos");

    if (addmousepad($_POST) > 0) {
        header("Location: ../View/admin.php");
        exit;
    } else {
        echo mysqli_error($conn);
    }
}

function addmousepad($add)
{
    global $conn;

    $hrga = query("SELECT * FROM harga");
    $ktbln = query("SELECT * FROM ketebalan");
    $jhtn = query("SELECT * FROM jahitan");
    $bhn = query("SELECT * FROM bahan");

    $merk = $add["merk"];
    $tipe = $add["tipe"];
    $ukuran = $add["ukuran"];
    $ukuranName = $add["ukuran_name"];
    $harga = $add["harga"];
    $jahitan = $add["jahitan"];
    $ketebalan = $add["ketebalan"];
    $bahan = $add["bahan"];

    
    
    for ($a = 0; $a < count($hrga); $a++) {
        if ($harga >= $hrga[$a]['min_harga'] && $harga <= $hrga[$a]['max_harga']) {
            $harga_id = $hrga[$a]['harga_id'];
        }
    }
    for ($a = 0; $a < count($ktbln); $a++) {
        if ($ketebalan >= $ktbln[$a]['min_ketebalan'] && $ketebalan <= $ktbln[$a]['max_ketebalan']) {
            $ketebalan_id = $ktbln[$a]['ketebalan_id'];
        }
    }
    for ($a = 0; $a < count($jhtn); $a++) {
        if ($jahitan == $jhtn[$a]['jahitan_id']) {
            $jahitanName = $jhtn[$a]['min_jahitan'];
        }
    }
    for ($a = 0; $a < count($bhn); $a++) {
        if ($bahan == $bhn[$a]['bahan_id']) {
            $bahanName = $bhn[$a]['min_bahan'];
        }
    }

    $img = cekimg();
    if (!$img) {
        return false;
    }

    mysqli_query($conn, "INSERT INTO mousepad VALUES ('','$ukuran','$bahan','$ketebalan_id','$jahitan','$harga_id', '$merk', '$tipe', '$harga','$img','$ukuranName','$bahanName','$ketebalan','$jahitanName')");
}

function cekimg()
{
    global $rip;
    $fileName = $_FILES['img']['name'];
    $tmpName = $_FILES['img']['tmp_name'];
    $error = $_FILES['img']['error'];

    // Pemeriksaan jenis file yang dimasukkan
    $valimg = ['jpg', 'jpeg', 'png'];
    $eksimg = explode('.', $fileName);
    $eksimg = strtolower(end($eksimg));

    // Pemeriksaan data gambar pada database
    if ($error === 4) {
        $newFileName = "default.png";
    } else {
        if (!in_array($eksimg, $valimg)) {
            echo "
                <script>
                    alert('Jenis file yang diupload bukan gambar!');
                </script>
                ";
            return false;
        }

        // Melewati tahap pemeriksaan dan generate nama baru untuk gambar
        $newFileName = uniqid();
        $newFileName .= '.';
        $newFileName .= $eksimg;
        move_uploaded_file($tmpName, '../Assets Mousepad/' . $rip[0]['merk_name'] . '/' . $newFileName);
    }
    return $newFileName;
}
