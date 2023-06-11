<h5 class="card-title">Manajemen Produk</h5>
<p><a class="btn btn-dark" href="list-product.php?page=addBarang">Tambah Data</a></p>


<!-- Table with stripped rows -->
<table class="table datatable">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nama</th>
      <th scope="col">Jumlah</th>
      <th scope="col">Harga</th>
      <th scope="col">Pajak</th>
      <th scope="col">Foto</th>
      <th scope="col">Deskripsi</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
      $hasil = $db->produkAll();
      $no = 1;
      if($hasil -> num_rows>0){
        while($row = $hasil -> fetch_assoc()){
          ?>
          <tr>
            <th scope="row"><?php echo $no++?></th>
                <td><?php echo $row['nama']?></td>
                <td><?php echo $row['jml']?></td>
                <td>Rp<?php echo number_format($row['hrg'], 0, ',', '.')?></td>
                <td><?php echo $row['pajak']?>%</td>
                <td> <img src="img/<?php echo $row['foto']?>" class="img-fluid"></td>
                <td><?php echo $row['keterangan']?></td>
            <td>
            <a class='btn btn-primary' href='list-product.php?page=editBarang&id=<?php echo $row["id"]?>'>Edit </a>
            <a class='btn btn-danger' href='deleteBarang.php?id=<?php echo $row["id"]?>'>Hapus</a>
            </td>
          </tr>
          <?php
        }
      }else{
        ?>
        <tr><td colspan="7"></td></tr>
        <?php
      }
    ?>
  </tbody>
</table>