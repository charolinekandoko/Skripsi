<?php
// Connect to the database
require '../Include/database.php';

// Backend
$id = $_GET['id'];
$mousepad = query("SELECT * FROM mousepad WHERE mousepad_id=$id")[0];

if (isset($_POST["edit"])) {
    $pos = $_POST['merk'];
    $rip = query("SELECT * FROM merk WHERE merk_id = $pos");

    if (edit($_POST) > 0) {
        header("Location: ../View/admin.php");
        exit;
    } else {
        echo mysqli_error($conn);
    }
}

function edit($mousepad)
{
    global $conn;
    global $id;

    $hrga = query("SELECT * FROM harga");
    $ktbln = query("SELECT * FROM ketebalan");
    $jhtn = query("SELECT * FROM jahitan");
    $bhn = query("SELECT * FROM bahan");

    $merk = $mousepad["merk"];
    $tipe = $mousepad["tipe"];
    $ukuran = $mousepad["ukuran"];
    $ukuranName = $mousepad["ukuran_name"];
    $harga = $mousepad["harga"];
    $jahitan = $mousepad["jahitan"];
    $ketebalan = $mousepad["ketebalan"];
    $bahan = $mousepad["bahan"];
    
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

    $old_img = $mousepad["cek"];
    if($_FILES["img"] ["error"] === 4){
        $mousepad_img =  $old_img;
    } else{
        $mousepad_img = cekimg();
    }

    mysqli_query($conn, "UPDATE mousepad SET ukuran_id = '$ukuran' , bahan_id = '$bahan' , ketebalan_id = '$ketebalan_id' , jahitan_id = '$jahitan', harga_id = '$harga_id', merk_id = '$merk', mousepad_name = '$tipe', mousepad_harga = '$harga', mousepad_img = '$mousepad_img', ukuran = '$ukuranName', bahan = '$bahanName', ketebalan = '$ketebalan', jahitan = '$jahitanName' WHERE mousepad_id = '$id' ");

    return mysqli_affected_rows($conn);
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
