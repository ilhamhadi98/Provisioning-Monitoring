<?php 
session_start();
 
// cek apakah yang mengakses halaman ini sudah login
if($_SESSION['level']==""){
	header("location:index.php?pesan=gagal");
}else if($_SESSION['level']!="1"){
header("location:index.php?pesan=gagal");
}

include '../koneksi.php';
 
?>
<!DOCTYPE html>
<html lang="en">

<?php
// menghubungkan php dengan koneksi database
include '../template/head.php';
?>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <?php
    // menghubungkan php dengan koneksi database
    include 'menu.php';
    ?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <?php
        // menghubungkan php dengan koneksi database
        include 'top_bar.php';
        ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Hasil Pencarian Untuk : <?php echo $wo_cari = $_GET['wo_cari'];?></h1>
          <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>

          <a target="_blank" href="export_excel.php?wo_cari=<?php echo $_GET['wo_cari']; ?>" class="btn btn-success btn-icon-split">
            <span class="icon text-white-50">
              <i class="fas fa-file-excel"></i>
            </span>
            <span class="text">Export To Xls</span>
          </a>
		  <div class="my-4"></div>
		  
		  <!-- Content Row -->
		  <div class="row">
		  <div class="col-lg-12">

			<!-- Roitation Utilities -->
			<div class="card">
			<div class="card-header py-3">
				<h6 class="m-0 font-weight-bold text-primary">Work Order</h6>
			</div>
			<div class="card-body text-left">
				<!-- <div class="bg-primary text-white p-3 d-inline-block my-4">
					.rotate-15
				</div> -->
				<?php 
				//untuk meinclude kan koneksi
				include('../koneksi.php');

					//jika kita klik cari, maka yang tampil query cari ini
					if(isset($_GET['wo_cari'])) {
						//menampung variabel kata_cari dari form pencarian
						$wo_cari = $_GET['wo_cari'];

						//jika hanya ingin mencari berdasarkan kode_produk, silahkan hapus dari awal OR
						//jika ingin mencari 1 ketentuan saja query nya ini : SELECT * FROM produk WHERE kode_produk like '%".$kata_cari."%' 
						$query = "SELECT id_wo, order_input, sc_no, wfm_id, customer_name, customer_address, customer_phone, sto_name, status, teknisi_name 
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
					while ($row = mysqli_fetch_assoc($result)) {
				?>
				<h3 class="h3"><?php echo $row['customer_name']; ?></h3>
				<h5 class="h5 mb-3"><?php echo $row['customer_address']; ?></h5>
				
				<div class="">
                    <code><?php echo $row['customer_phone']; ?> | <?php echo $row['order_input']; ?> | <?php echo $row['sto_name']; ?> | <?php echo $row['status']; ?> | <?php echo $row['teknisi_name']; ?></code>
				</div>
				<span class="badge bg-light text-info mb-3">WFM ID : <?php echo $row['wfm_id']; ?></span>
				<span class="badge bg-light text-info mb-3">SC ID : <?php echo $row['sc_no']; ?></span>
				<hr>
				<?php
				}
				?>
			</div>
			</div>

			</div>
		  </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <?php
      // menghubungkan php dengan koneksi database
      include '../template/footer.php';
      ?>

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="../system/logout.php">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="../js/demo/datatables-demo.js"></script>

</body>

</html>
