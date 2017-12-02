<body>
    <div class="header">
        <div class="container">
            <a href="#" class="navbar-brand scroll-top">BALENI</a>
            <nav class="navbar navbar-inverse" role="navigation">
                <div class="navbar-header">
                    <button type="button" id="nav-toggle" class="navbar-toggle" data-toggle="collapse" data-target="#main-nav">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <!--/.navbar-header-->
                <div id="main-nav" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="<?php echo base_url(); ?>index.php/Home/index">Home</a></li>
                        <li><a href="<?php echo base_url(); ?>index.php/Home/menu">Our Menus</a></li>
                        <li><a href="<?php echo base_url(); ?>index.php/Home/contact">Contact Us</a></li>
                        <li><a href="<?php echo base_url(); ?>index.php/Home/profile">Profile</a></li>
                        <li><a href="<?php echo base_url(); ?>index.php/Home/profile">🛒</a></li>
                        <li><a class="logout" href="<?php echo base_url('index.php/Login/logout');?>">Logout</a></li>
                    </ul>
                </div>
                <!--/.navbar-collapse-->
            </nav>
            <!--/.navbar-->
        </div>
        <!--/.container-->
    </div>
    <!--/.header-->