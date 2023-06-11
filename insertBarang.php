<?php

require_once 'Database.php';
$db = new Database();
include "uploadFoto.php";

$nama = $_POST['tnama'];
$hrg = $_POST['tharga'];
$pajak = $_POST['tpajak'];
$keterangan = $_POST['tketerangan'];
$jml = $_POST['tjumlah'];

if(upload_foto($_FILES["foto"])){
    $foto = $_FILES["foto"]["name"];
    $hasil = $db->insProduk($nama,$hrg,$jml,$keterangan,$foto,$pajak);	  

    if($hasil){
        header("location:manage.php");
    }else{
        echo "New records failed";
    }
}else{
    echo "Sorry, there was an error uploading your file.";
}
header("location:list-product.php?page=manage");
?>