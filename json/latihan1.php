<?php 

// VIDEO 3 JSON
// MENIT 22.00

// $siswa = [
// 	[
// 		"nama"  => "Yuda Pratama",
// 		"umur"  => 17,
// 		"nisn"  => "0010259484",
// 		"email" => "yudapratama858@gmail.com"
// 	],
// 	[
// 		"nama"  => "Faiz Septiani",
// 		"umur"  => 17,
// 		"nisn"  => "0010259484",
// 		"email" => "faizseptiani.ff@gmail.com"
// 	]
// ];

$db = new PDO('mysql:host=localhost;dbname=db_bk','root','');
$ds = $db->prepare('SELECT * FROM tb_siswa');
$ds->execute();
$siswa = $ds->fetchAll(PDO::FETCH_ASSOC);
$data = json_encode($siswa);
echo $data;

?>