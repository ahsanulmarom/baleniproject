<div style="min-height: 100vh">
<link href="<?php echo base_url()?>assets/css/profileuser.css" rel="stylesheet" type="text/css" media="all">
<div class="bagian-str">
    <h3>BALENI</h3>
    <span class="garis" style="width: 100%; height: 3px; background-color: white"></span>
</div>
        <div class="isi-shop">
            <div style="width: 70%; margin: auto;">
        <?php if ($this->session->flashdata('error')) {
            echo '<div class="alert alert-danger alert-dismissable">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Oops!</strong>'.$this->session->flashdata('error').'
</div>';
        } ?>
            </div>
        <div class="container" style="margin-top: 15px">
            <div class="row mb40">
            <div class="chute chute-center text-center">
            <div class="col-md-3 mb5" style="margin-bottom: 20px;">
                <div class="bagian-cari">
                    <div class="title">
                        <h4>Category</h4>
                    </div>
                    <ul>
                        <li><a href="<?php echo base_url()."Home/menu/"?>">ALL CATEGORY</a><span class=""></span></li>
                    <?php 
                    if(empty($data)) {
                        echo "Belum Ada kategori";
                    } else {
                    foreach ($data as $d) { ?>
                        <li><a href="<?php echo base_url()."Home/detilcategory/".$d->nama ?>"><?php echo ucfirst(strtolower($d->nama)) ?></a><span class=""></span></li>
                    <?php } 
                    } ?>
                    </ul>
                    <form method="POST" action="<?php echo base_url()."Home/category_sort"?>">
                    <select class="form-control" name="sort" id="sort">
                        <option value="Default">Default</option>
                        <option value="DESC">Paling Mahal</option>
                        <option value="ASC">Paling Murah</option>
                    </select>
                    <input class="btn btn-primary" type="Submit" value="Urutkan">
                    </form>
                </div>      
            </div>
            <div class="col-md-9">
            <div class="demo-grid row" style="margin-bottom: 0px;border:none;">
            <div class="form-group bagian-cari" data-spy="affix" data-offset-top="197">
                <form method="POST" action="<?= base_url()?>Home/cari">
                    <input value="<?php echo isset($pencarian) ? $pencarian : ''; ?>" type="text" name="cari" class="form-control" placeholder="cari barang yang kamu inginkan disini">
                    <button name="caribtn" type="submit" class="btn btn-src"><i class="fa fa-search" aria-hidden="true"></i></button>
                </form>
            </div>
                <?php foreach ($jualan as $j) { ?>
                <div class="col-sm-4 col-md-4">
                    <div class="panel panel-default">
                        <div class="thumbnail" style="margin: 0">
                            <div class="gambar" style="background-image: url('<?php echo base_url()."$j->thumbnail" ?>');"></div>
                            <h4></h4>
                            <div class="caption">
                                <h5><a href="<?php echo base_url()."Home/barang/".$j->id?>"><?php echo substr($j->judul, 0,20) ?></a></h5>
                                <p><span class="blue">IDR <?php echo number_format($j->harga) ?></span> <span class="border"><?php echo ucfirst(strtolower($j->kategori)) ?></span></p>
                            </div>
                        </div>
                        <div class="klik">
                        <a href="<?php echo base_url()."Home/barang/".$j->id?>" class="btn btn-cck">
                            More</a>
                        </div>
                    </div>
                </div>
                <?php } ?>      
            </div>
                <div class="pagination">
                    <?php echo $this->pagination->create_links();?>
                </div>
            </div>
            </div>
            </div>
        </div>
        </div>
</div>
<?php $this->load->view("home/footer"); ?>