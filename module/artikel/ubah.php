<?php
$database = new Database();
$id = strpos(@$_REQUEST["mod"], "/") ? str_split(@$_REQUEST["mod"], strpos(@$_REQUEST["mod"], "/") + 1)[1] : @$_REQUEST['mod'];
$data = $database->get("data_mahasiswa", "where id=" . $id);

$database = new Database();
if (isset($_POST['update'])) {
    $data = [
        'nim' => $_POST["nim"],
        'nama' => $_POST['nama'],
        'alamat' => $_POST['alamat']
    ];
    $database->update("data_mahasiswa", $data, "id=" . $id);
    header("location: ../home");
}
if ($data == null) {
    header("location: ../error");
}

$form = new Form("", "update");
$form->addField("nim", "Nim", $data["nim"], "disabled");
$form->addField("nama", "Nama", $data["nama"]);
$form->addField("alamat", "Alamat", $data["alamat"]);
$form->displayForm();