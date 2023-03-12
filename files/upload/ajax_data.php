<?php 
include "koneksi.php";
$page = $_GET['page'];
if($page=="nisn"){
$nisn = $_POST['nisn'];
$t_data = $conn->query("select siswa.id_spp, siswa.nama, kelas.nama_kelas, spp.nominal from siswa INNER JOIN kelas ON kelas.id_kelas = siswa.id_kelas INNER JOIN spp ON spp.id_spp = siswa.id_spp where siswa.nisn = '$nisn'")->fetch_array();
?>
    <label for="nama"><b>Nama</b></label>
    <input type="text" value="<?php echo $t_data['nama'];?>" disabled>

    <label for="kelas"><b> Pilih Kelas</b></label>
    <input type="text" value="<?php echo $t_data['nama_kelas'];?>" disabled>

    <label for="bln_dibayar"><b>Bulan Dibayar</b></label>
    <select name="bulan_dibayar" required>
      <option value="Januari">Januari</option>
      <option value="Februari">Februari</option>
      <option value="Maret">Maret</option>
      <option value="April">April</option>
      <option value="Mei">Mei</option>
      <option value="Juni">Juni</option>
      <option value="Juli">Juli</option>
      <option value="Agustus">Agustus</option>
      <option value="September">September</option>
      <option value="Oktober">Oktober</option>
      <option value="November">November</option>
      <option value="Desember">Desember</option>
    </select>

    <label for="thn_dibayar"><b>Tahun Dibayar</b></label>
    <select name="tahun_dibayar" required>
      <?php 
      $tahun = date('Y');
      for ($i=$tahun-3; $i<=$tahun+3 ; $i++) { 
      ?>
      <option value="<?php echo $i;?>"><?php echo $i;?></option>
      <?php
      }
      ?>
    </select>

    <label for="jumlah_bayar"><b>Jumlah Yang Harus DiBayar</b></label>
    <input type="text" name="jumlah_bayar" value="<?php echo $t_data['nominal'];?>" readonly>
    <input type="hidden" name="id_spp" value="<?php echo $t_data['id_spp'];?>">

<?php  
}else if($page=="bulan"){
  if ($_POST['bulan']=="all") {
    echo "<button type='submit' name='generate'>Generate Laporan</button>";
  }else{
?>
<select name="id_kelas">
  <option value="">Pilih Kelas</option>
  <option value="all">ALL</option>
  <?php
    $q_kelas = $conn->query("select * from kelas");
    while($d_kelas = $q_kelas->fetch_array()){
      echo "<option value='$d_kelas[id_kelas]'>$d_kelas[nama_kelas]</option>";
    } 
  ?>
</select>
<?php  
  echo "<button type='submit' name='generate'>Generate Laporan</button>";
  }
}else if($page=="laporan"){
  if($_POST['tahun']=="all"){
    echo "<button type='submit' name='generate'>Generate Laporan</button>";
  }else{
?>
  <select name="bulan" required="" id="bulan">
    <option value="">Pilih Bulan</option>
    <option value="all">ALL</option>
    <option value="Januari">Januari</option>
    <option value="Februari">Februari</option>
    <option value="Maret">Maret</option>
    <option value="April">April</option>
    <option value="Mei">Mei</option>
    <option value="Juni">Juni</option>
    <option value="Juli">Juli</option>
    <option value="Agustus">Agustus</option>
    <option value="September">September</option>
    <option value="Oktober">Oktober</option>
    <option value="November">November</option>
    <option value="Desember">Desember</option>
  </select>  
  <div id="tampil-kelas">
    </div>
      <script type="text/javascript" src="jquery.min.js"></script>
      <script type="text/javascript">
          $('#bulan').change(function() { 
            var bulan = $(this).val(); 
            $.ajax({
            type: 'POST', 
            url: 'ajax_data.php?page=bulan', 
            data: 'bulan=' + bulan, 
            success: function(response) { 
            $('#tampil-kelas').html(response); 
          }
        });
      });
      </script>
<?php
}
}
?> 
