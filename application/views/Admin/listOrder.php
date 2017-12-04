<!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i>   List of Order</div>
        <div class="card-body">
          <div class="table-responsive">
            <?php
              if($this->session->flashdata('success')){
                echo '<div class="alert alert-success alert-dismissable">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Success!</strong> '.$this->session->flashdata('success').'.
              </div>';
            } ?>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Kode Pesan</th>
                  <th>Pemesan</th>
                  <th>Tanggal Pesan</th>
                  <th colspan=2>Menu Pesanan</th>
                  <th>Alamat Kirim</th>
                  <th>Tanggal Kirim</th>
                  <th>Harga Total</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
                <?php
                if(!empty($orderan)) {
                  foreach ($orderan as $o) { ?>
                <tr>
                  <td><?php echo $o['kode_order'] ?></td>
                  <td><?php echo $o['usercustomer'] ?></td>
                  <td><?php echo $o['tanggalorder'] ?></td>
                  <td><?php echo $o['nama'] ?> </td><td><?php echo $o['kuantitas'] ?></td>
                  <td><?php echo $o['alamat']; ?></td>
                  <td><?php echo $o['tanggalkirim']; ?></td>
                  <td><?php echo $o['totalbayar']; ?></td>
                  <td><?php echo $o['status']; ?>
                    <?php if($o['status'] == 'Belom Dikonfirmasi') {?>
                    <br>
                    <a href="<?php echo site_url('admin/Dashboard/terimaorders/' . $o['kode_order']) ?>" style="width: auto" data-toggle="tooltip" title="Terima Pesanan" 
                    class="btn btn-primary" onclick="javascript:confirmationTerima($(this));return false;"><i class="fa fa-fw fa-check"></i></a>
                    <a href="<?php echo site_url('admin/Dashboard/tolakorders/' . $o['kode_order']) ?>" style="width: auto" data-toggle="tooltip" title="Tolak Pesanan" 
                    class="btn btn-danger" onclick="javascript:confirmationTolak($(this));return false;"><i class="fa fa-fw fa-close"></i></a>
                <?php } else if($o['status'] == 'Pesanan Dalam Proses') { ?>
                <br>
                    <a href="<?php echo site_url('admin/Dashboard/antarorders/' . $o['kode_order']) ?>" style="width: auto" data-toggle="tooltip" title="Antar Pesanan" 
                    class="btn btn-primary" onclick="javascript:confirmationTerima($(this));return false;"><i class="fa fa-fw fa-car"></i></a>
                    <a href="<?php echo site_url('admin/Dashboard/tolakorders/' . $o['kode_order']) ?>" style="width: auto" data-toggle="tooltip" title="Batalkan Pesanan" 
                    class="btn btn-danger" onclick="javascript:confirmationTolak($(this));return false;"><i class="fa fa-fw fa-trash"></i></a>
                <?php } else if($o['status'] == 'Pembayaran Telah Dilakukan') { ?>
                <br>
                    <a href="<?php echo site_url('admin/Dashboard/antarorders/' . $o['kode_order']) ?>" style="width: auto" data-toggle="tooltip" title="Antar Pesanan" 
                    class="btn btn-primary" onclick="javascript:confirmationTerima($(this));return false;"><i class="fa fa-fw fa-reply"></i></a>
                    <a href="<?php echo site_url('admin/Dashboard/tolakorders/' . $o['kode_order']) ?>" style="width: auto" data-toggle="tooltip" title="Batalkan Pesanan" 
                    class="btn btn-danger" onclick="javascript:confirmationTolak($(this));return false;"><i class="fa fa-fw fa-trash"></i></a>
                <?php } else if($o['status'] == 'Pesanan Dalam Pengantaran') { ?>
                    <br>
                    <a href="<?php echo site_url('admin/Dashboard/doneorders/' . $o['kode_order']) ?>" style="width: auto" data-toggle="tooltip" title="Selesaikan Pesanan" 
                    class="btn btn-primary" onclick="javascript:confirmationTerima($(this));return false;"><i class="fa fa-fw fa-flag-checkered"></i></a>
                  <?php }
                  }
                }
                ?>
                </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
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

<script type="text/javascript">
  function confirmationTerima(anchor){
   var conf = confirm('Are you sure want to accept this order?');
   if(conf)
      window.location=anchor.attr("href");
  }
</script>

<script type="text/javascript">
  function confirmationTolak(anchor){
   var conf = confirm('Are you sure want to reject this order?');
   if(conf)
      window.location=anchor.attr("href");
  }
</script>

<script type="text/javascript">
  function confirmationDelete(anchor){
   var conf = confirm('Are you sure want to delete this record?');
   if(conf)
      window.location=anchor.attr("href");
  }
</script>