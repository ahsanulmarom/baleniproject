<?php $this->load->view('user/headfoot/headerlogin') ?>

<link href="<?php echo base_url()?>assets/css/profileuser.css" rel="stylesheet" type="text/css" media="all">
		<div class="container">
			<div class="row mb40">
    		<div class="chute chute-center text-center">
            <div class="col-md-2 mb5"></div>
            <div id="konf1">
			<div class="col-md-8 mb5">		
			<div class="demo-grid" style="padding:20px">
                <div id="konf">

              <?php
              if($this->session->flashdata('success')){
                echo '<div class="alert alert-success alert-dismissable">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Success!</strong> '.$this->session->flashdata('success').'.
              </div>';
            } elseif ($this->session->flashdata('error')) {
                echo '<div class="alert alert-danger alert-dismissable">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Waduh!</strong> '.$this->session->flashdata('error').'.
              </div>';
            } ?>
            
                <h1 style="color: #000000">Konfirmasi Pembayaran</h1>
				<form action="<?php echo base_url()."Order/saveBayar"?>" method="POST" enctype="multipart/form-data">
                            <table style="font-size: 12px" width="100%">
                                <tr>
                                    <td style="padding: 5px">Kode Order</td>
                                    <td style="padding: 5px"><input class="form-control" type="text" name="kode" value="<?php echo $kode ?>" readonly/></td>
                                </tr>
                                <tr>
                                    <td style="padding: 5px">Nama Pembayar</td>
                                    <td style="padding: 5px"><input class="form-control" type="text" name="namabayar" required/></td>
                                </tr>
                                <tr>
                                    <td style="padding: 5px">Total Pembayaran</td>
                                    <td style="padding: 5px"><input class="form-control" type="text" name="jumlahbayartotal" value="<?php echo 'Rp '.number_format($total,2) ?>" readonly/></td>
                                </tr>
                                <tr>
                                    <td style="padding: 5px">Jumlah Bayar</td>
                                    <td style="padding: 5px"><input class="form-control" type="text" name="jumlahbayar" required placeholder="Hanya Angka"/></td>
                                </tr>
                                <tr>
                                    <td style="padding: 5px">Bukti Bayar</td>
                                    <td style="padding: 5px"><input type="file" name="buktibayar" required ></td>
                                </tr>
                                <tr style="padding: 5px">
                                	<td></td>
                                    <td style="padding: 5px" colspan="2"><input class="btn btn-primary" type="submit" name="submit" value="Konfirmasikan" /></td>
                                </tr>
                            </table>
                </form>
                </div>
			</div>
			</div>
			</div>
		    </div>
			</div>
        </div>
        </div>
    <div>
<br><br><br><br><br>
<?php $this->load->view("user/headfoot/footer")?>