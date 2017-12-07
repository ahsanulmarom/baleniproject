    <section class="page-heading">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Our Menus</h1>
                    <p>BALENI menawarkan makanan - makanan yang fresh from the oven. Selain beragam menu, BALENI juga memiliki cita rasa khas yang sangat menyirikan Indonesia.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="breakfast-menu">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <?php if(!empty($menu)) { 
                        foreach ($menu as $m) { ?>
                    <div class="breakfast-menu-content">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="left-image">
                                    <img src="<?php echo base_url() . $m['image']; ?>" alt="$m['nama']">
                                </div>
                            </div>
                            <div class="col-md-7">
                                <h2><?php echo $m['nama']; ?></h2>
                                <div id="owl-breakfast" class="owl-carousel owl-theme">
                                </div>
                                <table>
                                <tr>
                                    <td>Harga</td>
                                    <td><span class="badge badge-info"><?php echo 'Rp ' . $m['harga']?></span></td>
                                </tr>
                                <tr>
                                    <td>Kategori</td>
                                    <td><?php echo $m['kategori']?></td>
                                </tr>
                                <tr>
                                    <td>Deskripsi </td>
                                    <td><?php echo $m['deskripsi']?></td>
                                </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <br>
                    <?php }
                }?>
                </div>
            </div>
        </div>
    </section>
    <br> <br> <br>

   