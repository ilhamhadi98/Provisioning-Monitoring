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
          <h1 class="h3 mb-2 text-gray-800">Orders</h1>
          <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>

          <?php 
          if(isset($_GET['pesan'])){
            $pesan = $_GET['pesan'];
            if($pesan == "input"){
              echo "Data berhasil di input.";
            }else if($pesan == "update"){
              echo "Data berhasil di update.";
            }else if($pesan == "hapus"){
              echo "Data berhasil di hapus.";
            }
          }
          ?>

          <a href="#" class="btn btn-primary btn-icon-split" data-toggle="modal" data-target="#AddModal">
            <span class="icon text-white-50">
              <i class="fas fa-pen"></i>
            </span>
            <span class="text">Add New Order</span>
          </a>
          <a href="#" class="btn btn-dark btn-icon-split" data-toggle="modal" data-target="#MultipleModal">
            <span class="icon text-white-50">
              <i class="fas fa-magic"></i>
            </span>
            <span class="text">Add Multiple Order</span>
          </a>
          <a href="#" class="btn btn-success btn-icon-split" data-toggle="modal" data-target="#ExportModal">
            <span class="icon text-white-50">
              <i class="fas fa-file-excel"></i>
            </span>
            <span class="text">Export To Xls</span>
          </a>
          <div class="my-4"></div>

          <!-- Circle Buttons -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Filters</h6>
            </div>
            <div class="card-body">
              <p>Use data filters to look up data specifically by date!</p>
              <!-- Circle Buttons (Default) -->
              <form action="">
                <div class="form-group row">
                <div class="col-sm-4 mb-3 mb-sm-0">
                    <input type="date" class="form-control form-control-user" placeholder="First Date">
                </div>
                <div class="col-sm-4">
                    <input type="date" class="form-control form-control-user" placeholder="Last Date">
                </div>
                <div class="col-sm-4">
                    <input type="#" value="Run" class="btn btn-primary btn-user btn-block disabled">
                </div>
                </div>
              </form>
            </div>
          </div>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data Tables WorkOrders</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Date</th>
                      <th>SC</th>
                      <th>WFM ID</th>
                      <th>Name</th>
                      <th>STO</th>
                      <th>Status</th>
                      <th>Technician</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>#</th>
                      <th>Date</th>
                      <th>SC</th>
                      <th>WFM ID</th>
                      <th>Name</th>
                      <th>STO</th>
                      <th>Status</th>
                      <th>Technician</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php 
                    include "../koneksi.php";
                    $no = 1;
                    // $data = mysqli_query($koneksi,"select * from work_order");
                    $data = mysqli_query($koneksi,"SELECT id_wo, order_input, sc_no, wfm_id, customer_name, sto_name, status, teknisi_name 
                    FROM work_order 
                    JOIN m_sto ON work_order.sto_id=m_sto.id_sto 
                    JOIN m_status ON work_order.status_id=m_status.id_status 
                    JOIN m_teknisi ON work_order.teknisi_id=m_teknisi.id_teknisi");
                    while($d = mysqli_fetch_array($data)){
                    ?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $d['order_input']; ?></td>
                      <td><?php echo $d['sc_no']; ?></td>
                      <td><?php echo $d['wfm_id']; ?></td>
                      <td><?php echo $d['customer_name']; ?></td>
                      <td><?php echo $d['sto_name']; ?></td>
                      <td><?php echo $d['status']; ?></td>
                      <td><?php echo $d['teknisi_name']; ?></td>
                      <td>
                        <div class="dropdown mb-4">
                          <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Dropdown
                          </button>
                          <div class="dropdown-menu animated--fade-in" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Detail</a>
                            <a class="dropdown-item" href="#">Update</a>
                            <a class="dropdown-item" href="#">Delete</a>
                          </div>
                        </div>
                      </td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
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

  <!-- Multiple Add WO Modal-->
  <div class="modal fade" id="MultipleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add New Multiple Order?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <p>
            Untuk menambahkan banyak <i>work order</i>, silahkan menggunakan format yang disediakan <a href="#">disini</a>.
          </p>
          <form action="#">
            <div class="mb-3">
              <input class="form-control form-control-sm" id="formFileSm" type="file">
            </div>
            <div class="modal-footer">
              <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
              <a class="btn btn-primary" href="#">Submit</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Single Add WO Modal-->
  <div class="modal fade" id="AddModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add New Order?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="#">Submit</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Export Modal-->
  <div class="modal fade" id="ExportModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Wanna to Export Data?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="">
            <div class="form-group row">
              <div class="col-sm-12 mb-3">
                <p class="modal-title mb-3" >First Date</p>
                  <input type="date" class="form-control form-control-user" placeholder="First Date">
              </div>
              <div class="col-sm-12">
                <p class="modal-title mb-3" >Last Date</p>
                  <input type="date" class="form-control form-control-user" placeholder="Last Date">
              </div>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="#">Export</a>
        </div>
      </div>
    </div>
  </div>

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