<?php

include("model/Template.class.php");
include("model/DB.class.php");
include("model/Pasien.class.php");
include("model/TabelPasien.class.php");
include("view/TampilAddPasien.php");


$tp = new TampilAddPasien();
$data = $tp->tampil();
if (isset($_POST['submit'])) {
    //memanggil add
    $data = $tp->addPasien($_POST);
    header("location:index.php");
}