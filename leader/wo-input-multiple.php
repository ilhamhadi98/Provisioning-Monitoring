

    <?php 

$connect = mysqli_connect("localhost", "dumet", "school", "test"); 

$query = "SELECT * FROM import ORDER BY id desc"; 

$result = mysqli_query($connect, $query); 

?> 

<!DOCTYPE html> 

<html> 

     <head> 

          <title>Cara Import File CSV ke Database MySQL Menggunakan PHP & Ajax</title> 

          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script> 

          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" /> 

          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 

     </head> 

     <body> 

          <div class="container" style="width:900px;"> 

               <h2 align="center">Import CSV File Data into MySQL Database using PHP & Ajax</h2>   

               <form id="import_csv" method="post" enctype="multipart/form-data"> 

                    <div class="col-md-3"> 

                         <br /> 

                         <label>Pilih File</label> 

                    </div> 

                    <div class="col-md-4"> 

                         <input type="file" name="data_csv" style="margin-top:15px;" /> 

                    </div> 

                    <div class="col-md-5"> 

                         <input type="submit" name="upload" id="upload" value="Upload" style="margin-top:10px;" class="btn btn-info" /> 

                    </div> 

                    <div style="clear:both"></div> 

               </form> 

               <br /><br /><br /> 

               <div class="table-responsive" id="tabledata"> 

                    <table class="table table-bordered"> 

                         <tr> 

                              <th width="5%">ID</th> 

                              <th width="25%">Nama</th> 

                              <th width="35%">Email</th> 

                         </tr> 

                         <?php while($row = mysqli_fetch_array($result)) { ?> 

                         <tr> 

                              <td><?php echo $row["id"]; ?></td> 

                              <td><?php echo $row["name"]; ?></td> 

                              <td><?php echo $row["email"]; ?></td>

                         </tr> 

                         <?php } ?> 

                    </table> 

               </div> 

          </div> 

     </body> 

</html> 

<script> 

     $(document).ready(function(){ 

          $('#import_csv').on("submit", function(e){ 

               e.preventDefault();

               $.ajax({ 

                    url:"import.php", 

                    method:"POST", 

                    data:new FormData(this), 

                    contentType:false,   

                    cache:false,           

                    processData:false,   

                    success: function(data){ 

                         if(data=='Error1'){  

                              alert("Format File Salah");

                         }else if(data == "Error2"){ 

                              alert("Silahkan Pilih File"); 

                         }else{ 

                              $('#tabledata').html(data); 

                         } 

                    } 

               }) 

          }); 

     }); 

</script> 
