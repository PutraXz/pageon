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
    input[type=text], input[type=password], input[type=number], select {
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
        $tahun = $_POST['tahun'];
        $nominal = $_POST['nominal'];
        $id_spp = $_POST['id_spp'];
        $query = $conn->query("update spp set tahun='$tahun', nominal='$nominal' where id_spp='$id_spp'");
          echo"
          <script>
          alert('Data Berhasil Diedit');
          window.location.href='data_spp.php';
          </script>
          ";
      }
      ?>
      <h2>Data Spp</h2>
        <table>
          <tr>
            <th>No</th>
            <th>Tahun</th>
            <th>Nominal</th>
            <th>Aksi</th>
          </tr>
          <?php
          $no = 1;
          $page = @$_GET['page'];
          if($page == 'hapus'){
            $id_spp = $_GET['id'];
            $conn->query("delete from spp where id_spp='$id_spp'");
            echo"
            <script>
            alert('Data Berhasil Dihapus');
            window.location.href='data_spp.php';
            </script>
            ";
          }
          $query = $conn->query("select * from spp");
          while($data = $query->fetch_array()){
          ?>
          <tr>
            <td><?= $no++ ?></td>
            <td><?= $data['tahun'] ?></td>
            <td><?= $data['nominal'] ?></td>
            <td>
              <div id="edit-<?= $data['id_spp'] ?>" class="modal">
                <form class="modal-content animate" method="post">
                  <div class="imgcontainer">
                    <span onclick="document.getElementById('edit-<?= $data['id_spp'] ?>').style.display='none'" class="close" title="Close Modal">&times;</span>
                  </div>

                  <div class="container-fluid">
                    <input type="hidden" name="id_spp" value="<?= $data['id_spp'] ?>">
                    <label for="tahun"><b>Tahun</b></label>
                    <input type="number" placeholder="Enter tahun" name="tahun" required value="<?= $data['tahun'] ?>">

                    <label for="nominal"><b>Nominal</b></label>
                    <input type="number" placeholder="Enter nominal" name="nominal" required value="<?= $data['nominal'] ?>">

                    </select>

                    <button type="submit" name="edit">Edit</button>
                  </div>

                  <div class="container-fluid" style="background-color:#f1f1f1">
                    <button type="button" onclick="document.getElementById('edit-<?= $data['id_spp'] ?>').style.display='none'" class="cancelbtn">Cancel</button>
                  </div>
                </form>
              </div>
                <a href="#"onclick="document.getElementById('edit-<?= $data['id_spp'] ?>').style.display='block'">Edit</a> |
                <a href="data_spp.php?page=hapus&id=<?= $data['id_spp'] ?>" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini??');">Hapus</a>
            </td>
            <?php } ?>
          </tr>
      
        </table>
      <?php 
      include 'koneksi.php';
      if(isset($_POST['tambah'])){
        $tahun = $_POST['tahun'];
        $nominal = $_POST['nominal'];
        $query = $conn->query("insert into spp set tahun='$tahun', nominal='$nominal'");
          echo"
          <script>
          alert('Data Berhasil Ditambahkan');
          window.location.href='data_spp.php';
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
            <input type="hidden" name="id_spp" value="<?= $data['id_spp'] ?>">
            <label for="uname"><b>Tahun</b></label>
            <input type="number" placeholder="Enter tahun" name="tahun" required>

            <label for="psw"><b>Nominal</b></label>
            <input type="number" placeholder="Enter nominal" name="nominal" required>

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