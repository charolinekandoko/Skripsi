<?php
// Connect to the database
require '../Include/database.php';

if(isset($_POST["search"])){
    session_start();
    $_SESSION["search"] = true;

    $mousepads = query("SELECT * FROM mousepad 
            JOIN harga ON mousepad.harga_id=harga.harga_id
            JOIN ukuran ON mousepad.ukuran_id=ukuran.ukuran_id
            JOIN bahan ON mousepad.bahan_id=bahan.bahan_id
            JOIN jahitan ON mousepad.jahitan_id=jahitan.jahitan_id
            JOIN ketebalan ON mousepad.ketebalan_id=ketebalan.ketebalan_id
            JOIN merk ON mousepad.merk_id=merk.merk_id
            ");

    // Min Max Bobot
    $minhargaBobot = query("SELECT MIN(harga.bobot_harga) as 'min_harga' FROM mousepad JOIN harga ON mousepad.harga_id=harga.harga_id");
    $maxukuranBobot = query("SELECT MAX(ukuran.bobot_ukuran) as 'max_ukuran' FROM mousepad JOIN ukuran ON mousepad.ukuran_id=ukuran.ukuran_id");
    $maxbahanBobot = query("SELECT MAX(bahan.bobot_bahan) as 'max_bahan' FROM mousepad JOIN bahan ON mousepad.bahan_id=bahan.bahan_id");
    $maxjahitanBobot = query("SELECT MAX(jahitan.bobot_jahitan) as 'max_jahitan' FROM mousepad JOIN jahitan ON mousepad.jahitan_id=jahitan.jahitan_id");
    $maxketebalanBobot = query("SELECT MAX(ketebalan.bobot_ketebalan) as 'max_ketebalan' FROM mousepad JOIN ketebalan ON mousepad.ketebalan_id=ketebalan.ketebalan_id");

    // SAW
    $bobot = [
        $_POST["harga"],
        $_POST["ukuran"],
        $_POST["bahan"],
        $_POST["jahitan"],
        $_POST["ketebalan"],
    ];

    // Normalisasi
    foreach($mousepads as $key => $mp){
        $r[$key]["mousepad_id"] = $mp["mousepad_id"];
        $r[$key]["mousepad_name"] = $mp["mousepad_name"];
        $r[$key]["mousepad_img"] = $mp["mousepad_img"];
        $r[$key]["mousepad_harga"] = $mp["mousepad_harga"];
        $r[$key]["mousepad_merk"] = $mp["merk_name"];

        $r[$key]["harga"] = $minhargaBobot[0]["min_harga"]/$mp["bobot_harga"];
        $r[$key]["ukuran"] = $mp["bobot_ukuran"]/$maxukuranBobot[0]["max_ukuran"];
        $r[$key]["bahan"] = $mp["bobot_bahan"]/$maxbahanBobot[0]["max_bahan"];
        $r[$key]["jahitan"] = $mp["bobot_jahitan"]/$maxjahitanBobot[0]["max_jahitan"];
        $r[$key]["ketebalan"] = $mp["bobot_ketebalan"]/$maxketebalanBobot[0]["max_ketebalan"];
    }

    // Nilai Preferensi (v)
    foreach($r as $key => $saw){
        $v[$key]["mousepad_id"] = $saw["mousepad_id"];
        $v[$key]["mousepad_name"] = $saw["mousepad_name"];
        $v[$key]["mousepad_img"] = $saw["mousepad_img"];
        $v[$key]["mousepad_harga"] = $saw["mousepad_harga"];
        $v[$key]["mousepad_merk"] = $saw["mousepad_merk"];
        $v[$key]["harga"] = $bobot[0] * $saw["harga"];
        $v[$key]["ukuran"] = $bobot[1] * $saw["ukuran"];
        $v[$key]["bahan"] = $bobot[2] * $saw["bahan"];
        $v[$key]["jahitan"] = $bobot[3] * $saw["jahitan"];
        $v[$key]["ketebalan"] = $bobot[4] * $saw["ketebalan"];

        $v[$key]["v"] = $v[$key]["harga"] + $v[$key]["bahan"] + $v[$key]["jahitan"] + $v[$key]["ketebalan"] + $v[$key]["ukuran"];
    }

    // Merge $v datas into array
    $v_total = array();
    foreach($v as $nul => $sum){
        $v_total[] = array_merge($v_total, $v);
    }

    $counter = 0;
    foreach($v_total as $v_sum){
        if($counter == 0){
            $saw_mousepads = $v_sum;
        }
        $counter++;
    }

    // Sorting
    foreach($saw_mousepads as $key => $value){
        $sort["v"][$key] = $value["v"];
    }
    array_multisort($sort["v"], SORT_DESC, $saw_mousepads);

    $result['saw_mousepads_10'] = array_slice($saw_mousepads, 0, 10);
    $_SESSION["saw_mousepads_10"] = $result['saw_mousepads_10'];

    header("Location: result_recommend.php");
    exit;
}
?>