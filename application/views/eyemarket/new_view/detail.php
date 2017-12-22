<?php
    foreach ($product as $data)
    {
?>
        <div class="row">

            <div class="col-md-12">

                <ol class="breadcrumb" style="text-align: left;margin-bottom: 0px;">
                    <li><a href="<?= base_url(); ?>eyemarket">Home</a></li>
                    <li><span>EyeMarket</span></li>
                </ol>

                    <img src="<?php echo base_url(); ?>assets/new_assets/ic_eyemarket.png">
                    <span style="font-family: Montserratbold; color:#F9C241;font-size: 20px;">eyeMarket</span>
                    <img src="<?php echo base_url(); ?>assets/new_assets/line-eyemarket.png" style="width: 89%;height: 4px;">

                <div class="row" id="productMain">
                    <div class="col-sm-6">
                        <div id="mainImage" style="margin-top: 10%;">
                            <img src="<?= base_url(); ?>produk_image/<?= $data['image1']; ?>" class="img-responsive">
                        </div>
                            <div class="row" id="thumbs">
                                <div class="col-xs-4">
                                    <a href="<?= base_url(); ?>produk_image/<?= $data['image1']; ?>" class="thumb">
                                        <img src="<?= base_url(); ?>produk_image/<?= $data['image1']; ?>" alt="<?= $data['nama']; ?>" class="img-responsive">
                                    </a>
                                </div>
                        <?php 
                            if (isset($data['image2']))
                            {
                        ?>
                                <div class="col-xs-4">
                                    <a href="<?= base_url(); ?>produk_image/<?= $data['image2']; ?>" class="thumb">
                                        <img src="<?= base_url(); ?>produk_image/<?= $data['image2']; ?>" alt="<?= $data['nama']; ?>" class="img-responsive">
                                    </a>
                                </div>
                        <?php        
                            }
                        ?>
                        <?php 
                            if (isset($data['image3']))
                            {
                        ?>
                                <div class="col-xs-4">
                                    <a href="<?= base_url(); ?>produk_image/<?= $data['image3']; ?>" class="thumb">
                                        <img src="<?= base_url(); ?>produk_image/<?= $data['image3']; ?>" alt="<?= $data['nama']; ?>" class="img-responsive">
                                    </a>
                                </div>
                        <?php        
                            }
                        ?>
                        <?php 
                            if (isset($data['image4']))
                            {
                        ?>
                                <div class="col-xs-4">
                                    <a href="<?= base_url(); ?>produk_image/<?= $data['image4']; ?>" class="thumb">
                                        <img src="<?= base_url(); ?>produk_image/<?= $data['image4']; ?>" alt="<?= $data['nama']; ?>" class="img-responsive">
                                    </a>
                                </div>
                        <?php        
                            }
                        ?>
                        <?php 
                            if (isset($data['image5']))
                            {
                        ?>
                                <div class="col-xs-4">
                                    <a href="<?= base_url(); ?>produk_image/<?= $data['image5']; ?>" class="thumb">
                                        <img src="<?= base_url(); ?>produk_image/<?= $data['image5']; ?>" alt="<?= $data['nama']; ?>" class="img-responsive">
                                    </a>
                                </div>
                        <?php        
                            }
                        ?>      
                                
                            </div>

                        <!--<div class="ribbon sale">
                            <div class="theribbon">SALE</div>
                            <div class="ribbon-background"></div>
                        </div>-->
                        <!-- /.ribbon -->

                    <?php 

                    ?>
                        <!--<div class="ribbon new">
                            <div class="theribbon">NEW</div>
                            <div class="ribbon-background"></div>
                        </div>-->
                        <!-- /.ribbon -->

                    </div>
                    <div class="col-sm-6">
                        <div class="box" style="padding-left: 45px;">
                                <div class="sizes" style="text-align: left;">

                                    <h3>Available sizes</h3>
                        <?php 
                            if ($data['id_kategori'] != 2)
                            {
                                if ($data['S'] != 0)
                                {
                        ?>
                                    <label for="size_s">
                                        <a href="#">S</a>
                                        <input type="radio" id="size_s" name="size" value="s" class="size-input">
                                    </label>
                        <?php            
                                }

                                if ($data['M'] != 0)
                                {
                        ?>
                                    <label for="size_m">
                                        <a href="#">M</a>
                                        <input type="radio" id="size_m" name="size" value="m" class="size-input">
                                    </label>
                        <?php
                                }

                                if ($data['L'] != 0)
                                {
                        ?>
                                    <label for="size_l">
                                        <a href="#">L</a>
                                        <input type="radio" id="size_l" name="size" value="l" class="size-input">
                                    </label>
                        <?php
                                }

                                if ($data['XL'] != 0)
                                {
                        ?>
                                    <label for="size_l">
                                        <a href="#">XL</a>
                                        <input type="radio" id="size_l" name="size" value="l" class="size-input">
                                    </label>
                        <?php
                                }

                                if ($data['XXL'] != 0)
                                {
                        ?>
                                    <label for="size_l">
                                        <a href="#">XXL</a>
                                        <input type="radio" id="size_l" name="size" value="l" class="size-input">
                                    </label>
                        <?php 
                                }       
                            }
                        ?>
                                </div>

                                <p style="margin-top: 5%;">
                                    <del>Rp. <?= number_format($data['harga_sebelum'],0,',','.'); ?> </del>
                                </p>
                                <p class="price" style="text-align: left;">
                                    Rp. <?= number_format($data['harga'],0,',','.'); ?> 
                                </p>
                                <p>
                            <?php
                                if ($username == NULL) 
                                {
                            ?>
                                    <a href="#" data-toggle="modal" data-target="#login-modal" class="btn btn-template-main">
                                        <i class="fa fa-shopping-cart"></i> Add to cart 
                                    </a>
                                    <a href="#" data-toggle="modal" data-target="#login-modal" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Add to wishlist">
                                        <i class="fa fa-heart-o"></i>
                                    </a>
                            <?php        
                                }
                                else
                                {
                            ?>
                                    <a href="#" data-toggle="modal" data-target="#chart-modal" class="btn btn-template-main">
                                        <i class="fa fa-shopping-cart"></i> Add to chart 
                                    </a>
                                    <a href="#" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Add to wishlist">
                                        <i class="fa fa-heart-o"></i>
                                    </a>
                            <?php
                                }
                            ?>
                                    
                                </p>

                                <!-- Chart Modal -->
                                <div class="modal fade" id="chart-modal" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form action="<?= base_url(); ?>eyemarket/keranjang/<?= $member_id."/".$data['id_product']; ?>" method="post">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                    <h4 class="modal-title" id="Login">Customer login</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                            <label>Nama Barang</label>
                                                            <div>
                                                                <strong><?= $data['nama']; ?></strong>
                                                            </div>
                                                            <br>
                                                            <div class="row">
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                    <div class="form-group">
                                                                        <p>Jumlah</p>
                                                                        <input type="number" name="jumlah" class="form-control" required="required">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                    <p>Harga</p>
                                                                    <strong>Rp. <?= number_format($data['harga'],0,',','.'); ?></strong>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                            <p>Catatan untuk toko / penjual</p>
                                                            <textarea name="catatan" id="" cols="30" rows="5" placeholder="Contoh: Warna Putih/Ukuran XL/Edisi ke-2"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <input type="submit" class="btn btn-info" value="Masukkan ke keranjang">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <div class="box" id="details">
                                    <p>
                                        <h4>Product details</h4>
                                        <p><?= $data['keterangan']; ?></p>
                                        <!-- <h4>Material & care</h4>
                                        <ul>
                                            <li>Polyester</li>
                                            <li>Machine wash</li>
                                        </ul>
                                        <h4>Size & Fit</h4>
                                        <ul>
                                            <li>Regular fit</li>
                                            <li>The model (height 5'8" and chest 33") is wearing a size S</li>
                                        </ul>

                                        <blockquote>
                                            <p><em>Define style this season with Armani's new range of trendy tops, crafted with intricate details. Create a chic statement look by teaming this lace number with skinny jeans and pumps.</em>
                                            </p>
                                        </blockquote> -->
                                </div>
                        </div>
                    </div>

            

                </div>

                <div class="box social" id="product-social">
                    <h4>Show it to your friends</h4>
                    <p>
                        <a href="#" class="external facebook" data-animate-hover="pulse"><i class="fa fa-facebook"></i></a>
                        <a href="#" class="external gplus" data-animate-hover="pulse"><i class="fa fa-google-plus"></i></a>
                        <a href="#" class="external twitter" data-animate-hover="pulse"><i class="fa fa-twitter"></i></a>
                        <a href="#" class="email" data-animate-hover="pulse"><i class="fa fa-envelope"></i></a>
                    </p>
                </div>

                <div class="row">
                    <div class="col-md-3 col-sm-6">
                        <div class="box text-uppercase">
                            <h3>You may also like these products</h3>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6">
                        <div class="product">
                            <div class="image">
                                <a href="#">
                                    <img src="<?=base_url()?>/bs/jud/img/product2.jpg" alt="" class="img-responsive image1">
                                </a>
                            </div>
                            <div class="text">
                                <h3>Fur coat</h3>
                                <p class="price">$143</p>

                            </div>
                        </div>
                        <!-- /.product -->
                    </div>

                </div>

            </div>

        </div>
        <!-- /.row -->
<?php        
    }
?>