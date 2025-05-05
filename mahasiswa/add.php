<?php
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET, POST, DELETE, PUT");
    header("Access-Control-Allow-Headers: Content-Type, Authorization");

    include "../conn.php";

    $npm          = $_POST['text_npm'];
    $nama         = $_POST['text_nama'];
    $prodi        = $_POST['text_prodi'];
    
    // isi query untuk cek data mahasiswa by npm
    $sql1 = "SELECT * FROM tbl_mahasiswa WHERE npm = '$npm' ";

    $check = $connect->query($sql1);
    $reason = "";
    $success = true;

    if($check->num_rows > 0){
        $success = false;
        $reason = "npm sudah ada di database";
    }else{
        // query untuk insert data
        $sql2 = "INSERT INTO tbl_mahasiswa VALUES('$npm', '$nama', '$prodi')";
        
        $result = $connect->query($sql2);

        if(!$result){
            $success = false;
            $reason = "Gagal tambah data Mahasiswa";
        }
    }

    echo json_encode(array(
        "success" => $success,
        "reason" =>$reason,
));