<!DOCTYPE html>
<html>
<head>
	<title>Export Data</title>
</head>
<body>
	<style type="text/css">
	body{
		font-family: sans-serif;
	}
	table{
		margin: 20px auto;
		border-collapse: collapse;
	}
	table th,
	table td{
		border: 1px solid #3c3c3c;
		padding: 3px 8px;

	}
	a{
		background: blue;
		color: #fff;
		padding: 8px 10px;
		text-decoration: none;
		border-radius: 2px;
	}
	</style>

    <?php
    $dn = date('d-m-Y');
	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=export-data-$dn.xls");
	?>

	<!-- <center>
		<h1>Export Data Ke Excel Dengan PHP <br/> www.malasngoding.com</h1>
	</center> -->

	<table border="1">
		<tr>
			<th>No</th>
			<th>Order Input</th>
			<th>SC</th>
			<th>WFM ID</th>
			<th>Customer Name</th>
			<th>Address</th>
			<th>Phone</th>
			<th>STO</th>
			<th>Status</th>
			<th>Technician</th>
			<th>Timestamp</th>
		</tr>
        <?php 

        include('../koneksi.php');

		//jika kita klik cari, maka yang tampil query cari ini
		if(isset($_GET['wo_cari'])) {
			//menampung variabel kata_cari dari form pencarian
			$wo_cari = $_GET['wo_cari'];

			//jika hanya ingin mencari berdasarkan kode_produk, silahkan hapus dari awal OR
			//jika ingin mencari 1 ketentuan saja query nya ini : SELECT * FROM produk WHERE kode_produk like '%".$kata_cari."%' 
			$query = "SELECT id_wo, order_input, sc_no, wfm_id, customer_name, customer_address, customer_phone, sto_name, status, teknisi_name, timestamp 
			FROM work_order 
			JOIN m_sto ON work_order.sto_id=m_sto.id_sto 
			JOIN m_status ON work_order.status_id=m_status.id_status 
			JOIN m_teknisi ON work_order.teknisi_id=m_teknisi.id_teknisi 
			WHERE sc_no 
			like '%".$wo_cari."%' OR wfm_id like '%".$wo_cari."%' OR customer_name like '%".$wo_cari."%' ORDER BY id_wo ASC
			";
			// $query = "SELECT * FROM work_order WHERE sc_no 
			// like '%".$wo_cari."%' OR wfm_id like '%".$wo_cari."%' OR customer_name like '%".$wo_cari."%' ORDER BY id_wo ASC
			// ";
		} else {
			//jika tidak ada pencarian, default yang dijalankan query ini
			$query = "SELECT * FROM work_order ORDER BY id_wo ASC";
		}
					
		$result = mysqli_query($koneksi, $query);

		if(!$result) {
			die("Query Error : ".mysqli_errno($koneksi)." - ".mysqli_error($koneksi));
		}
		//kalau ini melakukan foreach atau perulangan
		while ($d = mysqli_fetch_assoc($result)) {

		// // koneksi database
		// $koneksi = mysqli_connect("localhost","root","","pegawai");

		// // menampilkan data pegawai
		// $data = mysqli_query($koneksi,"select * from data_pegawai");
		$no = 1;
		// while($d = mysqli_fetch_array($data)){
		?>
		<tr>
			<td><?php echo $no++; ?></td>
			<td><?php echo $d['order_input']; ?></td>
			<td><?php echo $d['sc_no']; ?></td>
			<td><?php echo $d['wfm_id']; ?></td>
			<td><?php echo $d['customer_name']; ?></td>
			<td><?php echo $d['customer_address']; ?></td>
			<td><?php echo $d['customer_phone']; ?></td>
			<td><?php echo $d['sto_name']; ?></td>
			<td><?php echo $d['status']; ?></td>
			<td><?php echo $d['teknisi_name']; ?></td>
			<td><?php echo $d['timestamp']; ?></td>
		</tr>
		<?php 
		}
		?>
	</table>
</body>
</html>