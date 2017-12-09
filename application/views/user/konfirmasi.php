<link href="<?php echo base_url()?>assets/css/profileuser.css" rel="stylesheet" type="text/css" media="all">
		<div class="container">
			<div class="row mb40">
    		<div class="chute chute-center text-center">
    		<h1>Konfirmasi Pembayaran</h1>
            <div class="col-md-2 mb5"></div>
            <div id="konf1">
			<div class="col-md-8 mb5">		
			<div class="demo-grid" style="padding:20px">
                <div id="konf">
				<form action="<?php echo base_url()."#"?>" method="POST" enctype="multipart/form-data">
                            <table style="font-size: 12px" width="100%">
                                <tr>
                                    <td style="padding: 5px">Kode Order</td>
                                    <td style="padding: 5px"><input class="form-control" type="text" name="kode" value="<?php echo $kode ?>" readonly/></td>
                                </tr>
                                <tr>
                                    <td style="padding: 5px">Nama Pembayar</td>
                                    <td style="padding: 5px"><input class="form-control" type="text" name="namabayar" required/></td>
                                </tr>
                                <tr style="padding: 5px">
                                    <td style="padding: 5px">Cara Pembayaran</td>
                                    <td style="padding: 5px">
                                    	<select name="metode" class="form-control" required>
											<option value="COD">COD</option>
											<option value="Transfer Bank">Transfer Bank</option>
										</select>
                                    </td>
                                </tr>
                                 <tr style="padding: 5px">
                                    <td style="padding: 5px">Pilihan Bank</td>
                                    <td style="padding: 5px">
                                    	<select name="bank" class="form-control" required>
											<option value="COD">COD</option>
											<option value="BNI">Bank BNI</option>
										</select>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 5px">Jumlah Bayar</td>
                                    <td style="padding: 5px"><input class="form-control" type="text" name="jumlahbayar" required/></td>
                                </tr>
                                <tr>
                                    <td style="padding: 5px">Bukti Bayar</td>
                                    <td style="padding: 5px"><input class="form-control" type="file" name="buktibayar" required ></td>
                                </tr>
                                <tr style="padding: 5px">
                                	<td></td>
                                    <td style="padding: 5px" colspan="2"><input class="form-control" type="submit" name="submit" value="Konfirmasikan" /></td>
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