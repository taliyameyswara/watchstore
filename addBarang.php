<h5 class="card-title">Form Tambah Barang</h5>
    <form class="row g-3" action="insertBarang.php" method = "post" enctype="multipart/form-data">

        <div class="col-12">
            <label for="tnama" class="form-label">Nama Barang</label>
            <input type="text" class="form-control" id="tnama" name="tnama">
        </div>
        <div class="col-12">
            <label for="tnama" class="form-label">Harga</label>
            <input type="text" class="form-control" id="tharga" name="tharga">
        </div>
        <div class="col-12">
            <label for="tnama" class="form-label">Pajak</label>
            <input type="text" class="form-control" id="tpajak" name="tpajak">
        </div>
        <div class="col-12">
            <label for="tjumlah" class="form-label">Jumlah stok</label>
            <input type="text" class="form-control" id="tjumlah" name="tjumlah">
        </div>
        <div class="col-12">
            <label for="tketerangan" class="form-label">Keterangan</label>
            <input type="text" class="form-control" id="tketerangan" name="tketerangan">
        </div>
        <div class="col-12">
            <label for="foto" class="form-label">Foto Barang</label>
            <input type="file" class="form-control" id="foto" name="foto">
        </div>

        <div class="text-end">
        <input type="submit" value="Simpan" class="btn btn-primary"> <br>
        </div>
    </form>