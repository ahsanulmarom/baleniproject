<?php $this->load->view("user/headfoot/headerlogin")?>
<link href="<?php echo base_url()?>assets/css/profileuser.css" rel="stylesheet" type="text/css" media="all">
		<div class="container">
			<div class="row mb40">
    		<div class="chute chute-center text-center">
			<div class="col-md-12 mb5">
				<div class="demo-grid">
					<strong>Silahkan lihat dan konfirmasi detil pesananmu</strong>
					<div class="secdiri table-responsive">
						<table class="table table-condensed no-border" style="text-align: left">
							<tr class="no-border">
								<td>Nama Penerima</td>
								<td>: <?php echo $nama ?></td>
							</tr>
							<tr class="no-border">
								<td>Alamat Pengiriman</td>
								<td>: <?php echo $alamat ?></td>
							</tr>
							<tr class="no-border">
								<td>Kontak</td>
								<td>: <?= $kontak ?></td>
							</tr>
							<tr class="no-border">
								<td>Tanggal Pengiriman</td>
								<td>: <?php echo $tanggalkirim ?></td>
							</tr>
						</table>
					</div>
    
    <div class="row">
    	<div class="col-md-12">
    		<div class="paneledit panel-default">
    			<div class="panel-heading">
    				<h3 class="panel-title"><strong>Rangkuman Order</strong></h3>
    			</div>
    			<div class="panel-body">
    				<div class="table-responsive">
    					<table class="table table-condensed">
    						<thead>
                                <tr>
        							<td><strong>Menu</strong></td>
        							<td class="text-center"><strong>Harga</strong></td>
        							<td class="text-center"><strong>Kuantitas</strong></td>
        							<td class="text-right"><strong>Total</strong></td>
                                </tr>
    						</thead>
    						<tbody>
    							<!-- foreach ($order->lineItems as $line) or some such thing here -->
    						<?php
    						$tot1 = 0;
    						if(!empty($barang)) {
    						 foreach($barang as $b) { ?>
    							<tr>
    								<td><?php echo $b->nama ?></td>
    								<td class="text-center">IDR <?= number_format($b->harga,2) ?></td>
    								<td class="text-center"><?= $b->kuantitas ?></td>
    								<?php $tot =($b->harga)*($b->kuantitas);  $tot1 = $tot1 + ($b->harga)*($b->kuantitas);?>
    								<td class="text-right">IDR <?= number_format($tot,2) ?></td>
    							<?php }
                            	} ?>
    							</tr>
    							<tr>
    								<td>Kode Unik</td>
    								<td class="text-center">IDR <?php echo number_format($kode,2) ?></td>
    								<td class="text-center">1</td>
    								<td class="text-right">IDR <?php echo number_format($kode,2) ?></td>
    							</tr>
    							<tr>
    								<td class="thick-line"></td>
    								<td class="thick-line"></td>
    								<td class="thick-line text-center"><strong>Subtotal</strong></td>
    								<td class="thick-line text-right">IDR <?= number_format($tot1+$kode,2) ?></td>
    							</tr>
    						</tbody>
    					</table>
    				</div>
    			</div>
    		</div>
    	</div>
    </div>

					<p>Silahkan Melakukan Pembayaran Melalui:</p>
					<div class="col-md-12">
						<div class="demo-grid">
							<img height=50px width=50px src="https://www.alamatbank.com/wp-content/uploads/2014/11/logo-bni-300x250.gif"/>
							<p><strong>0635482462</strong></p>
							<p>Incik Zairina</p>
						</div>
					</div>
					<br /><br />
					<h4>Segera lakukan pembayaran. Batas pembayaran adalah ......</h4>

					<?php if (strcmp($status,"Menunggu Pembayaran")!=0) {
						echo '';
					}else{
						echo '<a href="'.base_url().'Home_Dashboard/confirm/'.$kode.'"><button class="btn btn-primary">Konfirmasikan Pembayaran</button></a>';
					}?>
					
				</div>
			</div>
			</div>
		    </div>
        </div>
    <div>

    	<?php $this->load->view("user/headfoot/footer")?>