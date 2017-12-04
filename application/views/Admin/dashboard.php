     <!-- Icon Cards-->
       <div class="row">

        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-primary o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-user"></i>
              </div>
              <div class="mr-5">
                <?php $num1 = $this->db->count_all_results('user');
              if(empty($num1)) {
                echo '0';
              } else {
                echo $num1;
              } ?> User Terdaftar
              </div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="<?php base_url()?>Dashboard/manageUser">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>

        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-warning o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-list"></i>
              </div>
              <div class="mr-5">
              <?php $num1 = $this->db->count_all_results('menu');
              if(empty($num1)) {
                echo '0';
              } else {
                echo $num1;
              } ?> Menu Terdaftarkan
              </div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="<?php base_url()?>Dashboard/manageMenu">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>

        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-success o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-shopping-cart"></i>
              </div>
              <div class="mr-5">
                <?php $num1 = $this->db->count_all_results('order');
              if(empty($num1)) {
                echo '0';
              } else {
                echo $num1;
              } ?> Pesanan Diterima
              </div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="<?php base_url()?>Dashboard/manageOrders">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>

        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-danger o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-coffee"></i>
              </div>
              <div class="mr-5">
                <?php 
            $query = $this->db->select_sum('kuantitas', 'Kuantitas');
            $query = $this->db->get('detil_order');
            $result = $query->result();
              if(empty($result[0]->Kuantitas)) {
                echo '0';
              } else {
                echo $result[0]->Kuantitas;
              } ?> Menu Terjual
              </div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="<?php base_url()?>Dashboard/manageOrders">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>

      </div>


      


    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright © Baleni 2017</small>
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
