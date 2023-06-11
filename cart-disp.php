<?php
// session_start();

//pemeriksaan session
if(isset($_SESSION['login'])){
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Daftar isi Cart</title>
</head>
<body>
<h5 class="card-title">Cart</h5>
<p>
<?php
    if(!empty($_SESSION['cart']['arrCart'])){
        ?>
        <a href='cart-remove.php' class='text-danger'><b>Kosongkan cart</b></a> |  
        <a href='list-product.php'><b>Kembali Belanja</b></a>
        <?php
    }
?>
</p>


<!-- Table with stripped rows -->
<table class="table datatable center">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nama</th>
      <th scope="col">Jumlah</th>
      <th scope="col">Harga</th>
      <th scope="col">Pajak</th>
      <th scope="col">Total (Harga+Pajak)</th>
    </tr>
  </thead>
  <tbody>
    <?php
    if(!empty($_SESSION['cart']['arrCart'])){
      $max=sizeof($_SESSION['cart']['arrCart']);
      $no = 1;
        for($i=0 ; $i < $max ; $i++){

          $hrg = $_SESSION['cart']['arrCart'][$i]['hrg'];
          $jml = $_SESSION['cart']['arrCart'][$i]['jml'];
          $pajak = $_SESSION['cart']['arrCart'][$i]['pajak'];

          echo "<tr><th scope='row'>".$no++."</th>";

            foreach($_SESSION['cart']['arrCart'][$i] as $key => $val){
             
                $tax = $hrg*$jml*$pajak/100;
                if($val == $hrg ){
                  echo "<td>Rp". number_format($hrg, 0, ',', '.') ."</td>";
                }else if($val == $pajak){
                  echo "<td>".$pajak."% = Rp" . number_format($tax, 0, ',', '.'). "</td>";
                }
                else{
                  echo "<td>".$val."</td>";
                }
            }
            //total harga setelah pajak
              $total = $jml*$hrg+$tax;
              echo "<td>Rp".number_format($total, 0, ',', '.')."</td>";
            
             
            echo "</tr>";
        }
        $jumlah = 0;
        foreach ($_SESSION['cart']['arrCart'] as $cart) {
          $jumlah = $jumlah + $cart['jml'];
        }

        $harga = 0;
        foreach ($_SESSION['cart']['arrCart'] as $cart) {
          $harga = $harga + $cart['hrg']*$cart['jml'];
        }

        $pajak = 0;
        foreach ($_SESSION['cart']['arrCart'] as $cart) {
          // hasil total pajak
          $pajak += ($cart['jml'] * $cart['hrg'])*$cart['pajak']/100;
        }

        $total = 0;
        foreach ($_SESSION['cart']['arrCart'] as $cart) {
            $total += $cart['jml'] * $cart['hrg'] + ($cart['jml'] * $cart['hrg'])*$cart['pajak']/100;;
        }
      
        echo "<tr><td></td>
        <td></td>
        <td>".$jumlah."</td>
        <td>Rp".number_format($harga, 0, ',', '.')."</td>
        <td>Rp".number_format($pajak, 0, ',', '.')."</td>
        <td>Rp".number_format($total, 0, ',', '.')."</td>
        </tr>";
       

        echo "<div class='alert alert-primary'> Total Belanja: <b>Rp". number_format($total, 0, ',', '.') ."<b/></div>";
    }
?>

  </tbody>
</table>


<!-- End Table with stripped rows -->
</body>
</html>

<?php
}else{
    //session belum ada artinya belum login
    header("location:loginsession.php");
}
?>