<div class="collapse navbar-collapse" id="myNavbar">
    <?php
    if(@$_SESSION['level']=="admin"){
    ?>
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>
        <li><a href="data_siswa.php">Data Siswa</a></li>
        <li><a href="data_petugas.php">Data Petugas</a></li>
        <li><a href="data_kelas.php">Data Kelas</a></li>
        <li><a href="data_spp.php">Data Spp</a></li>
        <li><a href="data_transaksi.php">Data Transaksi</a></li>
        <li><a href="#">History Pembayaran</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="logout.php">Logout</a></li>
      </ul>
      <?php }elseif(@$_SESSION['level']=="petugas"){ ?>
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>
        <li><a href="data_transksi.php">Data Transaksi</a></li>
        <li><a href="#">History Pembayaran</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="logout.php">Logout</a></li>
      </ul>
        <?php }else{ ?>
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>
        <li><a href="#">History Pembayaran</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#" onclick="document.getElementById('id01').style.display='block'"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
            <?php } ?>
    </div>