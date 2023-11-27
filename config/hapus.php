<?php 
require_once '../koneksi/koneksi.php';
$id = isset($_POST['id']) ? $_POST['id'] :'';

try{
    $sql = 'DELETE FROM data_pendaftar WHERE id = ?';
    $qonnect = $database_connection->prepare($sql);
    $qonnect->execute([$id]);
    echo "Data Deleted Successfully!";
}catch (PDOException $err){
    die("Error Deleting DATA: " . $err->getMessage());
}

?>