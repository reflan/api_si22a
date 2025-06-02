<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, DELETE, PUT");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

include "../conn.php";

$npm = $_POST['text_npm'];

//isi query delete
$sql = "DELETE FROM tbl_mahasiswa WHERE npm = '$npm'";
$result = $connect->query($sql);

echo json_encode(array(
    "success" => $result
));

?>