<?php $this->load->view("template/headerlogin")?>


<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/shoppingcart.css"/>
<div style="min-height: 80vh">
		<div class="container-fluid text-center" style="margin-top: 20px;">
			<ol class="breadcrumb">
				
                <li class="active"><a href="#">Beli Lagi</a></li>
				<li class="active"><a href="#">Keranjang</a></li>
			</ol>
		</div>
		
		<div class="container text-center demo-grid-wht" style="padding: 15px;margin-bottom: 20px">

			<div class="col-md-7 col-sm-12 text-left" style="padding-right: 20px;padding-left: 5px">
			<div class="">
			<div>
				<?php 
				$cart_cek = $this->cart->contents();
				if (empty($cart_cek)) {
					echo 'Tidak ada produk di shopping cart!!';
				} ?>
			</div>

			<?php
			$cart = $this->cart->contents();
			 if ($cart) {?>
				<form method="post" action="<?php echo base_url()?>Order/update_cart">
				<table id="cart" class="table table-hover table-condensed">
					<tr>
						<td style="width:auto;">QTY</td>
						<td style="width:auto;">PRODUK</td>
						<td style="width:auto;">HARGA</td>
						<td style="width:auto;">TOTAL</td>
						<td style="width:auto;">Aksi</td>
					</tr>
					<?php
					$total = 0;
					 foreach ($cart as $c) {
						echo form_hidden('cart[' . $c['id'] . '][id]', $c['id']);
						echo form_hidden('cart[' . $c['id'] . '][rowid]', $c['rowid']);
						echo form_hidden('cart[' . $c['id'] . '][name]', $c['name']);
						echo form_hidden('cart[' . $c['id'] . '][price]', $c['price']);
						echo form_hidden('cart[' . $c['id'] . '][qty]', $c['qty']);
						echo form_hidden('cart[' . $c['id'] . '][deskripsi]', $c['deskripsi']);
						?>
					<tr>

						<td><input name="<?php echo 'cart['.$c['id'].'][qty]'?>" type="number" class="form-control text-center" value="<?php echo $c['qty'];?>" style="width: 80%;"></td>
						<td><?php echo $c['name'];?></td>
						<td>IDR <?php echo number_format($c['price'],2);?></td>
						<?php $total = $total+$c['subtotal'];?>
						<td style="color: #008dd2">IDR <?php echo number_format($c['subtotal'],2);?></td>
						<td><a href="<?php echo base_url()?>Order/remove/<?php echo $c['rowid'];?>" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></a></td>
					</tr>
					<?php } ?>
					<tr>
						<td>
							<button type="submit" class="btn btn-info btn-sm"><i class="fa fa-refresh"></i></button>
						</td>
						<td></td>
						<td>Total :</td>
						<td>IDR <?php echo number_format($total,2) ?></td>
					</tr>
				</table>
				</form>
				<?php } ?>
			</div>
			</div>
	<form method="POST" action="<?php echo base_url();?>Order/save_to_db">		
			<div class="col-md-5 col-sm-12">
			<!-- <?= var_dump($total);?> -->
			<input type="hidden" name="subtotal" value="<?= isset($total)? $total: ''; ?>">
			<div class="" style="margin-bottom: 20px;">
				<table>
					<tr>
						<td style="padding: 5px">Nama Penerima</td>
						<td style="padding: 10px"><input type="text" name="nama" value="<?php echo $this->session->userdata('masukin')['nama']?>" readonly="" class="form-control"></td>
					</tr>
					<tr>
						<td style="padding: 5px">Alamat Penerima</td>
						<td style="padding: 10px"><textarea style="max-width: 300px;min-width: 300px;min-height: 80px" class="form-control" name="alamat" required="" placeholder="Masukkan alamat anda"></textarea></td>
					</tr>
					
					
					<tr>
						<td style="padding: 5px">No Telepon Penerima</td>
						<td style="padding: 10px"><input class="form-control" type="text" name="telp" ></td>
					</tr>
				</table>
				
				<script>
					function tampil_data(act){
					      var w = '444'; //$('#origin').val();
					      var x = $('#destination').val();
					      var y = '1000'; //$('#berat').val();
					      var z = $('#courier').val();

					      if (z == 'COD') {
					      	// alert('Kurir tidak bisa COD');
					      	$('#hasil').html('');
					      	$('.b_ongkir').val('0');
					      	$('span.b_ongkir').text('0');
				      		var subtot = $('#b_subtot').text();
							var ongk = $('.b_ongkir').text();
							var tot = parseInt(floatParsing(subtot)) + parseInt(floatParsing(ongk));
							$('#b_tot').html(' = IDR '+toNum(tot));

					      }else if(x == '0'){
					      		$('#hasil').html('Provinsi belum dipilih');
					      }else {
					      $.ajax({
					          url: "<?= base_url();?>Order/getCost",
					          type: "GET",
					          data : {origin: w, destination: x, berat: y, courier: z},
					          success: function (ajaxData){
					              //$('#tombol_export').show();
					              //$('#hasilReport').show();
					              if (ajaxData) {
					              	$("#hasil").html(ajaxData);
					              }else{
					              	'Lengkapi data terlebh dahulu';
					              }
					          }
					      });
					    }
					  };
				</script>

				
					    <div id="hasil">
					    	
					    </div>

			<div style="margin: 10px">
				<table>
				<th><label>Total Bayar : </label></th>
				<input class="b_ongkir" type="hidden" name="ongkir" value="">
				<input type="hidden" name="services" id="o_servis">
				<td>IDR <span class="b_ongkir">0</span> + <span id="b_subtot"><?= isset($total)? number_format($total): '0'; ?></span></td>
				<td id="b_tot" style="width: 50%">

				</td>
				</table>
			</div>

				<div class="elemen">
					<a href="category" class="btn btn-primary">Lanjut Belanja</a>
					<button class="btn btn-success" <?php if (empty($cart_cek)) {
					echo 'disabled';
				} ?> href="">Lanjut Bayar</button>
				</div>

			</div>
			</div>
		</form>
		</div>
</div>		
		<!-- JavaScript includes -->
		<?php $this->load->view("template/footer")?>
		<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script> 
		<script src="<?php echo base_url()?>assets/js/shoppingcart.js"></script>

<script>


	$("#propinsi_tujuan").click(function(){
		$.post("<?php echo base_url(); ?>Order/getCity/"+$('#propinsi_tujuan').val(),function(obj){
			$('#destination').html(obj);
		});
			
	});

</script>
