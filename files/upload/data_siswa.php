<?php
session_start();
if(@$_SESSION['level']=="admin"){
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap.min.css">
  <script src="jquery.min.js"></script>
  <script src="bootstrap.min.js"></script>
  <style>
    body {font-family: Arial, Helvetica, sans-serif;}

    /* Full-width input fields */
    input[type=text], input[type=password], input[type=number], select, textarea {
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
      background-color: #f1f1f1;
      height: 100%;
    }
    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
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
      background-color: #dddddd;
    }
  </style>
</head>
<body>
    <?php 
    include 'login.php';
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
    include 'menu.php';
    ?>
  </div>
</nav>
  
<div class="container-fluid text-center">    
  <div class="row content">
    <div class="col-sm-2 sidenav">
      <p><a href="#"onclick="document.getElementById('tambah').style.display='block'">Tambah Data</a></p>

    </div>
    <div class="col-sm-8 text-left">
      <?php 
      if(isset($_POST['edit'])){
        $nisn = $_POST['nisn'];
        $nis = $_POST['nis'];
        $nama = $_POST['nama'];
        $id_kelas = $_POST['id_kelas'];
        $alamat = $_POST['alamat'];
        $no_telp = $_POST['no_telp'];
        $id_spp = $_POST['id_spp'];
        $query = $conn->query("update siswa set nis='$nis', nama='$nama', id_kelas='$id_kelas', alamat='$alamat', no_telp='$no_telp', id_spp='$id_spp' where nisn='$nisn'");
          echo"
          <script>
          alert('Data Berhasil Diedit');
          window.location.href='data_siswa.php';
          </script>
          ";
      };
      ?>
      <h2>Data Siswa</h2>
        <table>
          <tr>
            <th>No</th>
            <th>Nisn</th>
            <th>Nis</th>
            <th>Nama</th>
            <th>Nama Kelas</th>
            <th>Alamat</th>
            <th>No Telp</th>
            <th>Tahun</th>
            <th>Aksi</th>
          </tr>
          <?php
          $no = 1;
          $page = @$_GET['page'];
          if($page == 'hapus'){
            $nisn = $_GET['nisn'];
            $conn->query("delete from siswa where nisn='$nisn'");
            echo"
            <script>
            alert('Data Berhasil Dihapus');
            window.location.href='data_siswa.php';
            </script>
            ";
          }
          $query = $conn->query("select * from siswa INNER JOIN kelas ON siswa.id_kelas = kelas.id_kelas INNER JOIN spp ON siswa.id_spp = spp.id_spp");
          while($data = $query->fetch_array()){
          ?>
          <tr>
            <td><?= $no++ ?></td>
            <td><?= $data['nisn'] ?></td>
            <td><?= $data['nis'] ?></td>
            <td><?= $data['nama'] ?></td>
            <td><?= $data['nama_kelas'] ?></td>
            <td><?= $data['alamat'] ?></td>
            <td><?= $data['no_telp'] ?></td>
            <td><?= $data['tahun'] ?></td>
            <td>
              <div id="edit-<?= $data['nisn'] ?>" class="modal">
                <form class="modal-content animate" method="post">
                  <div class="imgcontainer">
                    <span onclick="document.getElementById('edit-<?= $data['nisn'] ?>').style.display='none'" class="close" title="Close Modal">&times;</span>
                  </div>

                  <div class="container-fluid">
                    <input type="hidden" name="nisn" value="<?= $data['nisn'] ?>">
                        <label for="nis"><b>Nis</b></label>
                        <input type="number" placeholder="Enter Nis" name="nis" required value="<?= $data['nis'] ?>">
                        
                        <label for="nama"><b>Nama</b></label>
                        <input type="text" placeholder="Enter Nama" name="nama" required value="<?= $data['nama'] ?>">

                        <label for=""><b>Pilih Kelas</b></label>
                        <select name="id_kelas" required>
                            <option value="<?= $data['id_kelas'] ?><?= $data['nama_kelas'] ?>"></option>  
                            <?php 
                                $q_kelas = $conn->query("select * from kelas");
                                while($kelas = $q_kelas->fetch_array()){
                            ?>
                            <option value="<?= $kelas['id_kelas']?>"><?= $kelas['nama_kelas']?></option>
                            <?php   
                                }
                            ?>
                        </select>
                        
                        <label for="alamat"><b>Alamat</b></label>
                        <textarea name="alamat" placeholder="Enter Alamat" required value="<?= $data['alamat'] ?>"></textarea>
                        
                        <label for="notelp"><b>No Telp</b></label>
                        <input type="number" placeholder="Enter No Telp" name="no_telp" required value="<?= $data['no_telp'] ?>">

                        <label for=""><b>Pilih Spp</b></label>
                        <select name="id_spp" required>
                            <option value="<?= $data['id_app'] ?><?= $data['tahun'] ?>"></option>
                            <?php 
                                $q_spp = $conn->query("select * from spp");
                                while($spp = $q_spp->fetch_array()){
                            ?>
                            <option value="<?= $spp['id_spp']?>"><?= $spp['tahun']?></option>
                            <?php   
                            }
                            ?>
                        </select>

                    <button type="submit" name="edit">Edit</button>
                  </div>

                  <div class="container-fluid" style="background-color:#f1f1f1">
                    <button type="button" onclick="document.getElementById('edit-<?= $data['nisn'] ?>').style.display='none'" class="cancelbtn">Cancel</button>
                  </div>
                </form>
              </div>
                <a href="#"onclick="document.getElementById('edit-<?= $data['nisn'] ?>').style.display='block'">Edit</a> |
                <a href="data_siswa.php?page=hapus&nisn=<?= $data['nisn'] ?>" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini??');">Hapus</a>
            </td>
            <?php } ?>
          </tr>
      
        </table>
        <?php 
            include 'koneksi.php';
            if(isset($_POST['tambah'])){
                $nisn = $_POST['nisn'];
                $nis = $_POST['nis'];
                $nama = $_POST['nama'];
                $id_kelas = $_POST['id_kelas'];
                $alamat = $_POST['alamat'];
                $no_telp = $_POST['no_telp'];
                $id_spp = $_POST['id_spp'];
                $query = $conn->query("insert into siswa set nisn='$nisn', nis='$nis', nama='$nama', id_kelas='$id_kelas', alamat='$alamat', no_telp='$no_telp', id_spp='$id_spp'");          echo"
                    <script>
                    alert('Data Berhasil Ditambahkan');
                    window.location.href='data_siswa.php';
                    </script>
                ";
            }
        ?> 

        <div id="tambah" class="modal">
            <form class="modal-content animate" method="post">
                <div class="imgcontainer">
                    <span onclick="document.getElementById('tambah').style.display='none'" class="close" title="Close Modal">&times;</span>
                </div>

                <div class="container-fluid">
                    <input type="hidden" name="nisn" value="<?= $data['nisn'] ?>">
                    <label for="nisn"><b>Nisn</b></label>
                    <input type="number" placeholder="Enter Nisn" name="nisn" required>

                    <label for="nis"><b>Nis</b></label>
                    <input type="number" placeholder="Enter Nis" name="nis" required>
                    
                    <label for="nama"><b>Nama</b></label>
                    <input type="text" placeholder="Enter Nama" name="nama" required>

                    <label for=""><b>Pilih Kelas</b></label>
                    <select name="id_kelas" required>
                        <?php 
                            $q_kelas = $conn->query("select * from kelas");
                            while($kelas = $q_kelas->fetch_array()){
                        ?>
                        <option value="<?= $kelas['id_kelas']?>"><?= $kelas['nama_kelas']?></option>
                        <?php   
                            }
                        ?>
                    </select>
                    
                    <label for="alamat"><b>Alamat</b></label>
                    <textarea name="alamat" placeholder="Enter Alamat" required></textarea>
                    
                    <label for="notelp"><b>No Telp</b></label>
                    <input type="number" placeholder="Enter No Telp" name="no_telp" required>

                    <label for=""><b>Pilih Kelas</b></label>
                    <select name="id_spp" required>
                        <?php 
                            $q_spp = $conn->query("select * from spp");
                            while($spp = $q_spp->fetch_array()){
                        ?>
                        <option value="<?= $spp['id_spp']?>"><?= $spp['tahun']?></option>
                        <?php   
                        }
                        ?>
                    </select>

                    <button type="submit" name="tambah">Tambah</button>
                </div>

                <div class="container-fluid" style="background-color:#f1f1f1">
                    <button type="button" onclick="document.getElementById('tambah').style.display='none'" class="cancelbtn">Cancel</button>
                </div>
            </form>
        </div>

      <script>
      // Get the modal
      var modal = document.getElementById('tambah');

      // When the user clicks anywhere outside of the modal, close it
      window.onclick = function(event) {
          if (event.target == modal) {
              modal.style.display = "none";
          }
      }
      </script>
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

<footer class="container-fluid text-center">
  <p>Footer Text</p>
</footer>

</body>
</html>
<?php 
}else{
  echo"
    <script>
    alert('Anda Tidak Memiliki Akses !!');
    window.location.href='index.php';
    </script>
  ";
}

?>