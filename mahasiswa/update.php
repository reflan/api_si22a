<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, DELETE, PUT");
header("Access-Control-Allow-Headers: Content-Type, Authorization");


include "../conn.php";

$npm          = $_POST['text_npm'];
$nama         = $_POST['text_nama'];
$prodi        = $_POST['text_prodi'];

// isi query update
$sql = "UPDATE tbl_mahasiswa SET nama = '$nama', prodi = '$prodi' WHERE npm = '$npm'";

$result = $connect->query($sql);
echo json_encode(array(
    "success" => $result
));