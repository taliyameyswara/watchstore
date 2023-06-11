<?php
require_once 'Database.php';
$db = new Database();
include "uploadFoto.php";

$id = $_POST['tid'];
$nama = $_POST['tnama'];
$hrg = $_POST['tharga'];
$pajak = $_POST['tpajak'];
$keterangan = $_POST['tketerangan'];
$jml = $_POST['tjumlah'];
$foto_lama = $_POST['foto_lama'];

$qry = true;
$flagFoto = true;

if(isset($_POST['ubah_foto'])){
    if(upload_foto($_FILES['foto'])){
        $foto = $_FILES["foto"]["name"];
        $hasil = $db->updProduk($id,$nama,$hrg,$jml,$keterangan,$foto,$pajak);
    }else{
        $qry = false;
        echo "Foto gagal diupload <br>";
    }
}else{
    $hasil = $db->updProduk($id,$nama,$hrg,$jml,$keterangan,$foto,$pajak);	  
	$flagFoto=false;
}

if($qry == true){
    if($hasil){
        if(is_file("img/".$foto_lama) && ($flagFoto==true)) // jika gambar ada
        unlink("img/".$foto_lama);

        header("location:list-product.php?page=manage");
    }else{
        echo "New records failed";
    }
}
?>