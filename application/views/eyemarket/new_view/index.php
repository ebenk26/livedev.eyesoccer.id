    <p class="text-muted lead text-center">EYEMARKET PRODUCTS.</p>

    <div class="row">

<?php
    foreach ($products as $produk)
    {
?>
        <div class="col-md-3 col-sm-4 col-xs-6 col-xxs-12">
            <div class="product">
                <div class="image">
                    <a href="<?= base_url(); ?>eyemarket/detail/<?= $produk['toko']; ?>/<?= $produk['title_slug']; ?>">
                        <img src="<?= base_url(); ?>img/eyemarket/produk<?= $produk['image1'] ?>" class="img-res-product">
                    </a>
                </div>
                <!-- /.image -->
                <div class="text">
                    <h3>
                        <a href="">
                            <?= $produk['nama']; ?>
                        </a>
                    </h3>
                    <p class="price">
                        <del>Rp. <?= number_format($produk['harga_sebelum'],0,',','.'); ?> </del> 
                    </p>
                    <p class="price">
                        Rp. <?= number_format($produk['harga'],0,',','.'); ?> 
                    </p>
                    <p class="buttons">
                        <a href="#" class="btn btn-default"> 
                            View detail 
                        </a>
                        <a href="#" class="btn btn-template-main">
                            <i class="fa fa-shopping-cart"></i>Add to cart 
                        </a>
                    </p>
                </div>
                <!-- /.text -->
                <!--<div class="ribbon new">
                    <div class="theribbon">NEW</div>
                    <div class="ribbon-background"></div>
                </div>-->
            </div>
            <!-- /.product -->
        </div>
<?php        
    }
?>
        <!-- /.col-md-4 -->
    </div>
    <!-- /.products -->

    <!-- <div class="col-sm-12">
        <div class="pages">

            <p class="loadMore">
                <a href="#" class="btn btn-template-main"><i class="fa fa-chevron-down"></i> Load more</a>
            </p>

            <ul class="pagination">
                <li><a href="#">&laquo;</a>
                </li>
                <li class="active"><a href="#">1</a>
                </li>
                <li><a href="#">2</a>
                </li>
                <li><a href="#">3</a>
                </li>
                <li><a href="#">4</a>
                </li>
                <li><a href="#">5</a>
                </li>
                <li><a href="#">&raquo;</a>
                </li>
            </ul>
        </div>
    </div> -->
    <!-- /.col-sm-12 -->