<?php
require_once 'Database.php';
$db = new Database();
$id = $_GET['id'];

$hasil = $db -> produk($id);

while ($row = $hasil -> fetch_assoc()){
    $nama = $row['nama'];
    $hrg = $row['hrg'];
    $pajak = $row['pajak'];
    $jml = $row['jml'];
    $keterangan = $row['keterangan'];
    $foto = $row['foto'];
}
?>

<h5 class="card-title">Edit Produk</h5>
    <form class="row g-3" action="updateBarang.php" method = "post" enctype="multipart/form-data">

        <div class="col-12">
            <label for="inputid" class="form-label">ID</label>
            <input type="text" class="form-control" id="tid" name="tid" value="<?= $id;?>" readonly>
        </div>
        <div class="col-12">    
            <label for="tnama" class="form-label">Nama Barang</label>
            <input type="text" class="form-control" id="tnama" name="tnama" value="<?= $nama;?>">
        </div>
        <div class="col-12">
            <label for="tnama" class="form-label">Harga</label>
            <input type="text" class="form-control" id="tharga" name="tharga" value="<?= $hrg;?>">
        </div>
        <div class="col-12">
            <label for="tnama" class="form-label">Jumlah Stok</label>
            <input type="text" class="form-control" id="tjumlah" name="tjumlah" value="<?= $jml;?>">
        </div>
        <div class="col-12">
            <label for="tnama" class="form-label">Pajak</label>
            <input type="text" class="form-control" id="tpajak" name="tpajak" value="<?= $pajak;?>">
        </div>
       
        <div class="col-12">
            <label for="tketerangan" class="form-label">Keterangan</label>
            <input type="text" class="form-control" id="tketerangan" name="tketerangan" value="<?= $keterangan;?>">
        </div>
        <div class="col-12">
            <label for="foto" class="form-label">Foto Barang</label>
            <input type="file" class="form-control" id="foto" name="foto">
            <input type="hidden" name="foto_lama" value="<?=$foto;?>"">
            <img src="img/<?php echo $foto; ?>" width="100px" height="150px" alt="">
        </div>
        <div class="col-12">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="ubah_foto" id="ubah_foto" >
                <label for="ubah_foto" class="form-check-label">Ceklis jika ingin mengubah foto</label>
            </div>
        </div>

        <div class="text-end">
        <input type="submit" value="Update" class="btn btn-primary">
        </div>
    </form>
