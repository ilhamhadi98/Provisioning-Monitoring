      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>
            Copyright &copy; Fulfilment Monitoring 
                <?php $d=date('Y'); echo $d; ?> | 
            
                <?php
                $start = microtime(true);
                $end = microtime(true);
                $creationtime = ($end - $start);
                printf("Page created in %.6f seconds.", $creationtime);
                ?>
            
            </span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->