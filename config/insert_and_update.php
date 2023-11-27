<?php
require_once '../koneksi/koneksi.php';

$nama_depan = isset($_POST['ndepan']) ? $_POST['ndepan'] : '';
$nama_belakang = isset($_POST['nbelakang']) ? $_POST['nbelakang'] : '';
$email = isset($_POST['mail']) ? $_POST['mail'] : '';
$password = isset($_POST['pwd']) ? $_POST['pwd'] : '';
$photo_name = isset($_FILES['filePhoto']['name']) ? $_FILES['filePhoto']['name'] : '';
$photo_tmp = isset($_FILES['filePhoto']['tmp_name']) ? $_FILES['filePhoto']['tmp_name'] : '';


if (!empty($_POST['id'])){
//kalau id tidak kosong, uptade
try{
    move_uploaded_file($photo_tmp, '../photo/'. $photo_name);

    $sql = 'UPDATE `data_pendaftar` SET `nama_depan` = ?, `nama_belakang` = ?, `email`= ?, `password` = ?, `photo` = ? WHERE id = ?';

$qonnect = $database_connection->prepare($sql);

$qonnect->execute([$nama_depan, $nama_belakangnama, $email, shal($password)

, 'photo/'. $photo_name, $_POST['id']]);

echo "Data updated successfully!";

} catch (PDOException $err) {

die("Error updating data: ". Serr->getMessage());
}

}else{
// kalau kosong,insert
try{

move_uploaded_file($photo_tmp, '../photo/'. $photo_name);

$sql = 'INSERT INTO `data_pendaftar` (`nama_depan`, `nama_belakang`, `email`, `password`, `photo`) VALUES (?, ?, ?, ?, ?)';


$qonnect = $database_connection->prepare($sql);

$qonnect->execute([$nama_depan, $nama_belakang, $email, sha1($password), 'photo/'.$photo_name]);


echo "Data inserted successfully!";

} catch (PDOException $err) {

die("Error inserting data: ". Serr->getMessage());
}
}

?>