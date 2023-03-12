<?php
include "koneksi.php";
if ($_POST['tahun']=="all"){
	$query=$conn->query("select * from pembayaran inner join petugas ON petugas.id_petugas = pembayaran.id_petugas inner join siswa ON siswa.nisn = pembayaran.nisn inner join kelas ON kelas.id_kelas = siswa.id_kelas inner join spp ON spp.id_spp = pembayaran.id_spp");
}else{
	$tahun = $_POST['tahun'];
	if($_POST['bulan']=="all"){
		$query=$conn->query("select * from pembayaran inner join petugas ON petugas.id_petugas = pembayaran.id_petugas inner join siswa ON siswa.nisn = pembayaran.nisn inner join kelas ON kelas.id_kelas = siswa.id_kelas inner join spp ON spp.id_spp = pembayaran.id_spp where pembayaran.tahun_dibayar='$tahun'");
	}else{
		$bulan = $_POST['bulan'];
		if($_POST['id_kelas']=="all"){
		$query=$conn->query("select * from pembayaran inner join petugas ON petugas.id_petugas = pembayaran.id_petugas inner join siswa ON siswa.nisn = pembayaran.nisn inner join kelas ON kelas.id_kelas = siswa.id_kelas inner join spp ON spp.id_spp = pembayaran.id_spp where pembayaran.tahun_dibayar='$tahun' and pembayaran.bulan_dibayar='$bulan'");
		}else{
			$id_kelas = $_POST['id_kelas'];
			$query=$conn->query("select * from pembayaran inner join petugas ON petugas.id_petugas = pembayaran.id_petugas inner join siswa ON siswa.nisn = pembayaran.nisn inner join kelas ON kelas.id_kelas = siswa.id_kelas inner join spp ON spp.id_spp = pembayaran.id_spp where pembayaran.tahun_dibayar='$tahun' and pembayaran.bulan_dibayar='$bulan' and siswa.id_kelas='$id_kelas'");
		}
	}		
}
?>
<script>
	window.print();
</script>
<!DOCTYPE html>
<html>
<head>
	<title>Cetak Laporan SPP</title>
	<style type="text/css">
		table{
			width: 100%;
			text-align: center;
			background-color: black;
		}
		.header{
			font-size: 30px;
			padding: 20px 0px 20px 0px;
			background-color: white;
		}
		.hdtb{
			font-size: 14px;
			background-color: white;
			padding: 5px;
			height: 50px;
		}
	</style>

</head>
<body>
<table>
	<tr>
		<td colspan="8" class="header">Laporan Pembayaran SPP SMK Negri 1 Patumbak</td>
	</tr>
	<tr class="hdtb">
		<th width="4">No</th>
		<th width="10">NISN</th>
		<th width="29">Nama</th>
		<th width="10">Kelas</th>
		<th width="11">Tanggal Bayar</th>
		<th width="13">Bulan Dibayar</th>
		<th width="10">Tahun Dibayar</th>
		<th width="11">Jumlah Pembayaran</th>
	</tr>
	<?php
	$i=1;
	while($data = $query->fetch_array()){
	?>
	<tr class="hdtb">
		<td width="4"><?php echo $i;?></th>
		<td width="10"><?php echo $data['nisn'];?></td>
		<td width="29"><?php echo $data['nama'];?></td>
		<td width="10"><?php echo $data['nama_kelas'];?></td>
		<td width="11"><?php echo $data['tgl_bayar'];?></td>
		<td width="13"><?php echo $data['bulan_dibayar'];?></td>
		<td width="10"><?php echo $data['tahun_dibayar'];?></td>
		<td width="11"><?php echo $data['jumlah_bayar'];?></td>
	</tr>
	<?php
	$i++;
	}	
	?>		
</table>
</body>
</html>