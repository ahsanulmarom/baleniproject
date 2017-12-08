
<link href="<?php echo base_url()?>assets/css/profileuser.css" rel="stylesheet" type="text/css" media="all">
		<div class="container">
			<div class="row mb40">
    		<div class="chute chute-center text-center">
			<div class="col-md-12 mb5">
				<div class="demo-grid">
					<h2><strong>Terima kasih telah mempercayai kami</strong></h2>
					<h3>Kode order anda: <em><?php echo $kode; ?></em></h3>
					<p>Silahkan cek detail pembayaran anda dibawah ini.</p>
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
    							<tr>
    								<td style="border: none;"></td>
    								<td style="border: none;"></td>
    								<td class="no-line text-center"><strong>Ongkir</strong></td>
    								<td class="no-line text-right">IDR <?= number_format($ongkir,2); ?></td>
    							</tr>
    							<tr>
    								<td style="border: none;"></td>
    								<td style="border: none;"></td>
    								<?php $total = $tot1+$ongkir;?>
    								<td class="no-line text-center"><strong>Total</strong></td>
    								<td class="no-line text-right">IDR <?= number_format($total,2);?></td>
    							</tr>
    						</tbody>
    					</table>
    				</div>
    			</div>
    		</div>
    	</div>
    </div>

					<p>Pembayaran dapat dilakukan di</p>
					<div class="col-md-4">
						<div class="demo-grid">
							<img height=50px width=50px src="https://www.alamatbank.com/wp-content/uploads/2014/11/logo-bni-300x250.gif"/>
							<p><strong>0287171911</strong></p>
							<p>Delian Mahardika Candra</p>
						</div>
					</div>
					<div class="col-md-4">
						<div class="demo-grid">
							<img height=50px width=50px src="https://media.glassdoor.com/sqll/40419/bank-mandiri-squarelogo-1400178763868.png"/>
							<p><strong>130-00-0010947-3</strong></p>
							<p>Deliar Mahardika C</p>
						</div>
					</div>
					<div class="col-md-4">
						<div class="demo-grid">
							<img height=50px width=50px src="https://centralasialelang.com/imgBank/bank119.png"/>
							<p><strong>000501001641300</strong></p>
							<p>Deliar Mahardika C</p>
						</div>
					</div>
					<br /><br />
					<h4>Simpan kode order untuk konfirmasi Pembayaran. Batas pembayaran adalah 1x24 jam</h4>

					<?php if (strcmp($status,"Belum dibayar")!=0) {
						echo '';
					}else{
						echo '<a href="'.base_url().'home/confirm/'.$kode.'"><button class="btn btn-primary">Konfirmasikan Pembayaran</button></a>';
					}?>
					
				</div>
			</div>
			</div>
		    </div>
        </div>
    <div>