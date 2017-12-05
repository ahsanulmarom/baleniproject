<?php
    $abc = $this->session->userdata('nama');
    if(!(empty($abc))){
      header("Location: admin");
    }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>SIGNUP</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url(); ?>assets/login/assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="<?php echo base_url(); ?>assets/login/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        
    <!-- Custom styles for this template -->
    <link href="<?php echo base_url(); ?>assets/login/assets/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/login/assets/css/style-responsive.css" rel="stylesheet">

    </head>

  <body>

	  <div id="login-page">
	  	<div class="container">
	  	
		      <form class="form-login" action="<?php echo base_url('/Home/do_signup');?>" role="form" enctype="multipart/form-data" method="post" >

		      <form class="form-login" action="<?php echo base_url('Home/do_signup');?>" method="post">

		        <h2 class="form-login-heading">join us now</h2>
		        <div class="login-wrap">
		            <input type="text" class="form-control" name="username" placeholder="Username" autofocus>
		            <br>
		            <input type="email" class="form-control" name="email" placeholder="Email" autofocus>
		            <br>
		            <input type="password" class="form-control" name="password" placeholder="Password">
                    <br>
                    <input type="password" class="form-control" name="password" placeholder="Retype Password">
                    <br>
                    <input type="text" class="form-control" name="nama" placeholder="nama">
                    <br>
                    <input type="text" class="form-control" name="alamat" placeholder="alamat">
                    <br>
                    <label class="checkbox">
		            <label class="checkbox">
		                <span class="pull-right">
		                </span>
		            </label>
		            <button class="btn btn-theme btn-block" type="submit"><i class="fa fa-heart"></i> SIGN UP</button>		
		        </div>		
 		    </form>	  	
	  	</div>
	  </div>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="?php echo base_url(); ?>assets/login/assets/js/jquery.js"></script>
    <script src="?php echo base_url(); ?>assets/login/assets/js/bootstrap.min.js"></script>

    <!--BACKSTRETCH-->
    <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
    <script type="text/javascript" src="/assets/js/jquery.backstretch.min.js"></script>
    <script>
        $.backstretch("assets/img/login-bg.jpg", {speed: 500});
    </script>


  </body>
</html>
