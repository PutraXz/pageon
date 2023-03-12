<?php 
session_start();
if($_SESSION['level']=="admin" or $_SESSION['level']=="petugas"){
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Aplikasi Spp - Data Transaksi</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap.min.css">
  <script src="jquery.min.js"></script>
  <script src="bootstrap.min.js"></script>
  <style>
    body {font-family: Arial, Helvetica, sans-serif;}

    /* Full-width input fields */
    input[type=text], input[type=password], input[type=number], input[list] {
      width: 100%;
      padding: 12px 20px;
      margin: 8px 0;
      display: inline-block;
      border: 1px solid #ccc;
      box-sizing: border-box;
    }

    select {
      width: 100%;
      padding: 12px 20px;
      margin: 8px 0;
      display: inline-block;
      border: 1px solid #ccc;
      box-sizing: border-box;
    }
    textarea {
      width: 100%;
      padding: 12px 20px;
      margin: 8px 0;
      display: inline-block;
      border: 1px solid #ccc;
      box-sizing: border-box;
    }

    /* Set a style for all buttons */
    button {
      background-color: #04AA6D;
      color: white;
      padding: 14px 20px;
      margin: 8px 0;
      border: none;
      cursor: pointer;
      width: 100%;
    }

    button:hover {
      opacity: 0.8;
    }

    /* Extra styles for the cancel button */
    .cancelbtn {
      width: auto;
      padding: 10px 18px;
      background-color: #f44336;
    }

    /* Center the image and position the close button */
    .imgcontainer {
      text-align: center;
      margin: 24px 0 12px 0;
      position: relative;
    }

    img.avatar {
      width: 40%;
      border-radius: 50%;
    }

    .container {
      padding: 16px;
    }

    span.psw {
      float: right;
      padding-top: 16px;
    }

    /* The Modal (background) */
    .modal {
      display: none; /* Hidden by default */
      position: fixed; /* Stay in place */
      z-index: 1; /* Sit on top */
      left: 0;
      top: 0;
      width: 100%; /* Full width */
      height: 100%; /* Full height */
      overflow: auto; /* Enable scroll if needed */
      background-color: rgb(0,0,0); /* Fallback color */
      background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
      padding-top: 60px;
    }

    /* Modal Content/Box */
    .modal-content {
      background-color: #fefefe;
      margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
      border: 1px solid #888;
      width: 80%; /* Could be more or less, depending on screen size */
    }

    /* The Close Button (x) */
    .close {
      position: absolute;
      right: 25px;
      top: 0;
      color: #000;
      font-size: 35px;
      font-weight: bold;
    }

    .close:hover,
    .close:focus {
      color: red;
      cursor: pointer;
    }

    /* Add Zoom Animation */
    .animate {
      -webkit-animation: animatezoom 0.6s;
      animation: animatezoom 0.6s
    }

    @-webkit-keyframes animatezoom {
      from {-webkit-transform: scale(0)} 
      to {-webkit-transform: scale(1)}
    }
      
    @keyframes animatezoom {
      from {transform: scale(0)} 
      to {transform: scale(1)}
    }

    /* Change styles for span and cancel button on extra small screens */
    @media screen and (max-width: 300px) {
      span.psw {
         display: block;
         float: none;
      }
      .cancelbtn {
         width: 100%;
      }
    }
    /* Remove the navbar's default margin-bottom and rounded borders */ 
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }
    
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 450px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      padding-top: 20px;
      background-color: #D8D9CF;
      height: 100%;
    }
    
    /* Set black background color, white text and some padding */
    footer {
      background-color:#D8D9CF;
      color: white;
      padding: 15px;
    }
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height:auto;} 
    }
    table {
      font-family: arial, sans-serif;
      border-collapse: collapse;
      width: 100%;
    }

    td, th {
      border: 1px solid #dddddd;
      text-align: left;
      padding: 8px;
    }

    tr:nth-child(even) {
      background-color: #D8D9CF;
    }
  </style>
</head>
<body>
<?php
include "login.php";
?>
<nav class="navbar navbar-inverse">
<div class="container-fluid">
<div class="navbar-header">
  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>                        
  </button>
</div>
  <?php
  include "menu.php";
  ?>
</div>
</nav>
<?php 
include "koneksi.php";
$page = @$_GET['page'];
if($page=="hapus"){
  if ($_SESSION['level']=="admin"){
    $id_pembayaran = $_GET['id'];
    $conn->query("delete from pembayaran where id_pembayaran='$id_pembayaran'"); 
  echo "
    <script>
    alert('Data Berhasil dihapus !!');
    window.location.href='data_transaksi.php';
    </script>
    ";
  }else{
  echo "
    <script>
    alert('Kamu Tidak Memiliki Akses Untuk Menghapus Data Ini !!');
    window.location.href='data_transaksi.php';
    </script>
    ";
  }
}
if(isset($_POST['simpan'])){
  $id_pembayaran = $_POST['id_pembayaran'];
  $id_petugas = $_POST['id_petugas'];
  $nisn = $_POST['nisn'];
  $tgl_bayar = $_POST['tgl_bayar'];
  $bulan_dibayar = $_POST['bulan_dibayar'];
  $tahun_dibayar = $_POST['tahun_dibayar'];
  $id_spp = $_POST['id_spp'];
  $jumlah_bayar = $_POST['jumlah_bayar'];
  $conn->query("update siswa set id_petugas='$id_petugas', nisn='$nisn', tgl_bayar='$tgl_bayar', bulan_dibayar='$bulan_dibayar', tahun_dibayar='$tahun_dibayar', id_spp='$id_spp', jumlah_bayar='$jumlah_bayar' where id_pembayaran='$id_pembayaran'");
echo "
    <script>
    alert('Data Berhasil disimpan !!');
    window.location.href='data_transaksi.php';
    </script>
    ";
}
?>
<div class="container-fluid text-center">    
<div class="row content">
<div class="col-sm-2 sidenav">
    <p><a href="#" onclick="document.getElementById('transaksi').style.display='block'">Entry Transaksi</a></p>
</div>
<div class="col-sm-8 text-left"> 
  <h1>Data Transaksi</h1>
    <p>
    <table>
      <tr>
        <th>No</th>
        <th>Nisn</th>
        <th>Nama</th>
        <th>Kelas</th>
        <th>Nominal Pembayaran</th>
        <th>Bulan Dibayar</th>
        <th>Tahun Dibayar</th>
        <th>Petugas</th>
        <th>Aksi</th>
        </tr>
        <?php 
        $no = 1;
        $query = $conn->query("select * from pembayaran inner join petugas ON petugas.id_petugas = pembayaran.id_petugas inner join siswa ON siswa.nisn = pembayaran.nisn inner join kelas ON kelas.id_kelas = siswa.id_kelas inner join spp ON spp.id_spp = pembayaran.id_spp");
        while($data = $query->fetch_array()){
        ?>
      <tr>
        <td><a href="#" onclick="document.getElementById('details-<?php echo $data['id_pembayaran'];?>').style.display='block'"><?php echo $no;?></td></a>
        <td><a href="#" onclick="document.getElementById('details-<?php echo $data['id_pembayaran'];?>').style.display='block'"><?php echo $data['nisn'];?></td></a>
        <td><a href="#" onclick="document.getElementById('details-<?php echo $data['id_pembayaran'];?>').style.display='block'"><?php echo $data['nama'];?></td></a>
        <td><a href="#" onclick="document.getElementById('details-<?php echo $data['id_pembayaran'];?>').style.display='block'"><?php echo $data['nama_kelas'];?></td></a>
        <td><a href="#" onclick="document.getElementById('details-<?php echo $data['id_pembayaran'];?>').style.display='block'"><?php echo $data['nominal'];?></td></a>
        <td><a href="#" onclick="document.getElementById('details-<?php echo $data['id_pembayaran'];?>').style.display='block'"><?php echo $data['bulan_dibayar'];?></td></a>
        <td><a href="#" onclick="document.getElementById('details-<?php echo $data['id_pembayaran'];?>').style.display='block'"><?php echo $data['tahun_dibayar'];?></td></a>
        <td><?php echo $data['nama_petugas'];?></td>      
        <td>
          <div id="details-<?php echo $data['id_pembayaran'];?>" class="modal">
            <div class="modal-content animate">          
              <div class="imgcontainer">
              <span onclick="document.getElementById('details-<?php echo $data['id_pembayaran'];?>').style.display='none'" class="close" title="Close Modal">&times;</span>
          </div>
          <div class="container-fluid">
              <label for="nisn"><b>NISN</b></label>
              <input disabled="disabled" type="text" value="<?php echo $data['nisn'];?>">

              <label for="nama"><b>Nama</b></label>
              <input disabled="disabled" type="text" value="<?php echo $data['nama'];?>">

              <label for="kelas"><b>Kelas</b></label>
              <input disabled="disabled" type="text" value="<?php echo $data['nama_kelas'];?>">

              <label for="tgl"><b>Tanggal DiBayar</b></label>
              <input disabled="disabled" type="text" value="<?php echo $data['tgl_bayar'];?>">

              <label for="bln"><b>Bulan DiBayar</b></label>
              <input disabled="disabled" type="text" value="<?php echo $data['bulan_dibayar'];?>">

              <label for="thn"><b>Tahun Bayar</b></label>
              <input disabled="disabled" type="text" value="<?php echo $data['tahun_dibayar'];?>">

              <label for="nominal"><b>Nominal Yang Harus Dibayar</b></label>
              <input disabled="disabled" type="text" value="<?php echo $data['nominal'];?>">

              <label for="jumlah"><b>Jumlah DiBayar</b></label>
              <input disabled="disabled" type="text" value="<?php echo $data['jumlah_bayar'];?>">

              <label for="ptgs"><b>Petugas</b></label>
              <input disabled="disabled" type="text" value="<?php echo $data['nama_petugas'];?>">

          </div>

          <div class="container-fluid" style="background-color:#f1f1f1">
              <button type="button" onclick="document.getElementById('details-<?php echo $data['id_pembayaran'];?>').style.display='none'" class="cancelbtn">Cancel</button>
                </div>
              </div>
            </div>
              <a onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data ini?')" href="data_transaksi.php?page=hapus&id=<?php echo $data['id_pembayaran'];?>">Hapus</a>
              </td>
              </tr>
              <?php 
              $no=$no+1;
              }
              ?>
            </table>
              </p>
            <hr>
          </div>
          <div class="col-sm-2 sidenav">
          <div class="well">
              <p>ADS</p>
          </div>
          <div class="well">
              <p>ADS</p>
          </div>
          </div>
          </div>
          </div>
<?php 
if(isset($_POST['bayar'])){
  $id_petugas = $_SESSION['id_petugas'];
  $nisn = $_POST['nisn'];
  $tgl_bayar = date("Y-m-d");
  $bulan_dibayar = $_POST['bulan_dibayar'];
  $tahun_dibayar = $_POST['tahun_dibayar'];
  $id_spp = $_POST['id_spp'];
  $jumlah_bayar = $_POST['jumlah_bayar'];
  $c_pembayaran = $conn->query("select * from pembayaran where nisn='$nisn' and bulan_dibayar='$bulan_dibayar' and tahun_dibayar='$tahun_dibayar'")->num_rows;
  if($c_pembayaran>0){
    echo "
    <script>
    alert('Kamu Sudah Bayar !!');
    window.location.href='data_transaksi.php';
    </script>
    ";
  }else{
  $conn->query("insert into pembayaran set id_petugas='$id_petugas', nisn='$nisn', tgl_bayar='$tgl_bayar', bulan_dibayar='$bulan_dibayar', tahun_dibayar='$tahun_dibayar', id_spp='$id_spp', jumlah_bayar='$jumlah_bayar'");
   echo "
    <script>
    alert('Transaksi Berhasil !!');
    window.location.href='data_transaksi.php';
    </script>
    ";
  }
  }
 ?>      
    <div id="transaksi" class="modal">
      <form class="modal-content animate" method="post">
    <div class="imgcontainer">
      <span onclick="document.getElementById('transaksi').style.display='none'" class="close" title="Close Modal">&times;</span>
    </div>

    <div class="container-fluid">
      <label for="nisn"><b>NISN</b></label>
      <input list="nisn_list" name="nisn" id="nisn" required>
      <datalist id="nisn_list">
        <?php
        $q_nisn = $conn->query('select nisn from siswa');
        while($nisn = $q_nisn->fetch_array()){
        ?>
        <option value="<?php echo $nisn['nisn'];?>">
        <?php
        }
        ?>
      </datalist>
        <div id="details-pembayaran">
        </div>
        <script type="text/javascript" src="jquery.min.js"></script>
        <script type="text/javascript">
          $('#nisn').change(function() { 
            var nisn = $(this).val(); 
            $.ajax({
              type: 'POST', 
              url: 'ajax_data.php?page=nisn', 
              data: 'nisn=' + nisn, 
              success: function(response) { 
                $('#details-pembayaran').html(response); 
              }
            });
          });
        </script>

    <button type="submit" onclick="return confirm('Kamu Yakin Ingin Membayar?')" name="bayar">Bayar</button>
    </div>

    <div class="container-fluid" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('transaksi').style.display='none'" class="cancelbtn">Cancel</button>
    </div>
  </form>
</div>

<script>
// Get the modal
var modal = document.getElementById('bayar');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>

<footer class="container-fluid text-center">
  <p>Footer Text</p>
</footer>

</body>
</html>
<?php 
}
?>