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
								<td>: <?= $nama ?></td>
							</tr>
							<tr class="no-border">
								<td>Alamat Pengiriman</td>
								<td>: <?= $alamat ?></td>
							</tr>
							<tr class="no-border">
								<td>Metode Pengiriman</td>
								<td>: <?= $metod ?></td>
							</tr>
							<tr class="no-border">
								<td>Kontak</td>
								<td>: <?= $kontak ?></td>
								<td ></td>
								<td >Email</td>
								<td >: <?= $email ?></td>
							</tr>
							<tr class="no-border">
								<td></td>
								<td></td>
								<td></td>
								<td>Status</td>
								<td <?php if (strcmp($status,"Belum dibayar")==0) {
									echo 'class="merah"';
								}else{echo '';}?>><?= $status ?></td>
							</tr>
						</table>
					</div>
				<!-- 	<?= var_dump(strcmp($status,"Belum dibayar"));?> -->
    
    <div class="row">
    	<div class="col-md-6">
    		<div class="paneledit panel-default">
    			<div class="panel-heading">
    				<h3 class="panel-title"><strong>Rangkuman Order</strong></h3>
    			</div>
    			<div class="panel-body">
    				<div class="table-responsive">
    					<table class="table table-condensed">
    						<thead>
                                <tr>
        							<td><strong>Item</strong></td>
        							<td class="text-center"><strong>Harga</strong></td>
        							<td class="text-center"><strong>Kuantitas</strong></td>
        							<td class="text-right"><strong>Total</strong></td>
                                </tr>
    						</thead>
    						<tbody>
    							<!-- foreach ($order->lineItems as $line) or some such thing here -->
    						<?php
    						$tot1 = 0;
    						 foreach ($barang as $b) { ?>
    							<tr>
    								<td><?= $b->judul ?></td>
    								<td class="text-center">IDR <?= number_format($b->harga,2) ?></td>
    								<td class="text-center"><?= $b->kuantitas ?></td>
    								<?php $tot =($b->harga)*($b->kuantitas); $tot1 = $tot1 + ($b->harga)*($b->kuantitas);?>
    								<td class="text-right">IDR <?= number_format($tot,2) ?></td>
    							</tr>
                            <?php } ?>
    							<tr>
    								<td class="thick-line"></td>
    								<td class="thick-line"></td>
    								<td class="thick-line text-center"><strong>Subtotal</strong></td>
    								<td class="thick-line text-right">IDR <?= number_format($tot1,2) ?></td>
    							</tr>
    						</tbody>
    					</table>
    				</div>
    			</div>
    		</div>
    	</div>
    </div>

					<p>Silahkan Melakukan Pembayaran Melalui:</p>
					<div class="col-md-4">
						<div class="demo-grid">
							<img height=50px width=50px src="https://www.alamatbank.com/wp-content/uploads/2014/11/logo-bni-300x250.gif"/>
							<p><strong>0635482462</strong></p>
							<p>Incik Zairina</p>
						</div>
					</div>
					<br /><br />
					<h4>Simpan kode order untuk konfirmasi Pembayaran. Batas pembayaran adalah 1x24 jam</h4>

					<?php if (strcmp($status,"Belum dibayar")!=0) {
						echo '';
					}else{
						echo '<a href="'.base_url().'Home_Dashboard/confirm'.$kode.'"><button class="btn btn-primary">Konfirmasikan Pembayaran</button></a>';
					}?>
					
				</div>
			</div>
			</div>
		    </div>
        </div>
    <div>