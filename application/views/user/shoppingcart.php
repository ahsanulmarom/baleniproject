<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/bootstrap.css"/>
<div style="min-height: 80vh">
		<div class="container-fluid text-center" style="margin-top: 20px;">
			<ol class="breadcrumb">
				
                <li class="active"><a href="#">Beli Lagi</a></li>
				<li class="active"><a href="#">Keranjang</a></li>
			</ol>
		</div>
	<!-- grow -->
	<div class="grow">
		<div class="container">
			<h2>Checkout</h2>
		</div>
	</div>
	<!-- grow -->
<div class="container">
	<div class="check">	 
			 <h1>My Shopping Bag (2)</h1>
		 <div class="col-md-9 cart-items">
			
				<script>$(document).ready(function(c) {
					$('.close1').on('click', function(c){
						$('.cart-header').fadeOut('slow', function(c){
							$('.cart-header').remove();
						});
						});	  
					});
			   </script>
			 <div class="cart-header">
				 <div class="close1"> </div>
				 <div class="cart-sec simpleCart_shelfItem">
						<div class="cart-item cyc">
							 <img src="<?php echo base_url(); ?>/assets/img/pic1.jpg" class="img-responsive" alt=""/>
						</div>
					   <div class="cart-item-info">
						<h3><a href="#">Mountain Hopper(XS R034)</a><span>Model No: 3578</span></h3>
						<ul class="qty">
							<li><p>Size : 5</p></li>
							<li><p>Qty : 1</p></li>
						</ul>
						
							 <div class="delivery">
							 <p>Service Charges : Rs.100.00</p>
							 <span>Delivered in 2-3 business days</span>
							 <div class="clearfix"></div>
				        </div>	
					   </div>
					   <div class="clearfix"></div>
											
				  </div>
			 </div>
			 <script>$(document).ready(function(c) {
					$('.close2').on('click', function(c){
							$('.cart-header2').fadeOut('slow', function(c){
						$('.cart-header2').remove();
					});
					});	  
					});
			 </script>
			 <div class="cart-header2">
				 <div class="close2"> </div>
				  <div class="cart-sec simpleCart_shelfItem">
						<div class="cart-item cyc">
							 <img src="<?php echo base_url(); ?>assets/img/pic2.jpg" class="img-responsive" alt=""/>
						</div>
					   <div class="cart-item-info">
						<h3><a href="#">Mountain Hopper(XS R034)</a><span>Model No: 3578</span></h3>
						<ul class="qty">
							<li><p>Size : 5</p></li>
							<li><p>Qty : 1</p></li>
						</ul>
							 <div class="delivery">
							 <p>Service Charges : Rs.100.00</p>
							 <span>Delivered in 2-3 business days</span>
							 <div class="clearfix"></div>
				        </div>	
					   </div>
					   <div class="clearfix"></div>
											
				  </div>
			  </div>		
		 </div>
		  <div class="col-md-3 cart-total">
			 <a class="continue" href="#">Kembali berbelanja</a>
			 <div class="price-details">
				 <h3>Price Details</h3>
				 <span>Total</span>
				 <input type="hidden" name="services" id="o_servis">
				 <span class="total1" id="b_subtot"><?= isset($total)? number_format($total): '0'; ?></span> 
				 <span>Delivery Charges</span>
				 <input class="b_ongkir" type="hidden" name="ongkir" value="">
				 <span class="b_ongkir"  ></span>
				 <div class="clearfix"></div>				 
			 </div>	
			 <ul class="total_price">
			   <li class="last_price"> <h4>TOTAL</h4></li>	
			   <li class="last_price"><span> </span></li>
			   <div class="clearfix"> </div>
			 </ul>
			 </div>
			 </div>

			 <div class="col-md-3 cart-total">
				 <a class="continue" <?php if (empty($cart_cek)) {
					echo 'disabled';
				} ?> href="">Lanjut Pembayaran</a>
				</div>

			</div>
