<?php
$database = new Database();
if (isset($_POST['create'])) {
	$data = [
		'nim' => $_POST['nim'],
		'nama' => $_POST['nama'],
		'alamat' => $_POST['alamat']
	];
	$database->insert("data_mahasiswa", $data);
	header("location: home");
}

$form = new Form("", "create");
$form->addField("nim", "Nim");
$form->addField("nama", "Nama");
$form->addField("alamat", "Alamat");
$form->displayForm();