<div class="row">
    <div class="col-md-12">
        <ol class="breadcrumb" style="text-align: left;margin-bottom: 0px;">
            <li><a href="#">Home</a></li>
            <li><span>EyeMarket</span></li>
            <li><span>Keranjang Anda</span></li>
        </ol>
        <p class="text-muted lead">Anda mempunyai <?= $jumlah->jumlah; ?> barang di keranjang.</p>
    </div>


    <div class="col-md-9 clearfix" id="basket">

        <div class="box">

            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th colspan="2">Produk</th>
                            <th>Catatan</th>
                            <th>Kuantitas</th>
                            <th>Harga Satuan</th>
                            <th colspan="2">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                <?php
                    foreach ($model as $cart)
                    { 
                ?>
                        <tr>
                            <td>
                                <a href="#">
                                    <img src="<?= base_url(); ?>produk_image/<?= $cart['image1']; ?>" alt="<?= $cart['nama']; ?>">
                                </a>
                            </td>
                            <td>
                                <a href="<?= base_url(); ?>eyemarket/detail/<?= $cart['toko']; ?>/<?= $cart['title_slug']; ?>" target="_blank">
                                    <?= $cart['nama']; ?>
                                </a>
                            </td>
                            <td>
                                <span id="text-catatan-<?= $cart['id']; ?>">
                                    <?php echo isset($cart['catatan']) ? $cart['catatan'] : ""; ?>
                                </span>
                                
                                <a href="#" data-toggle="modal" data-target="#form-catatan-<?= $cart['id']; ?>" style="cursor: pointer;">Edit?</a>
                            </td>
                            <td>
                                <input type="number" id="jumlah-<?= $cart['id']; ?>" name="jumlah" value="<?= $cart['jumlah']; ?>" class="form-control" style="width: 60px;" onchange="editJumlah(<?= $cart['id']; ?>)">
                            </td>
                            <td>
                                Rp. <?= number_format($cart['harga'],0,',','.'); ?>
                            </td>
                            <td>
                                <span id="total-<?= $cart['id']; ?>">
                                    Rp. <?= number_format($cart['total'],0,',','.'); ?>
                                </span>
                            </td>
                            <td class="hidden">
                                <span id="id_keranjang"><?= $cart['id']; ?></span>
                            </td>
                            <td> 
                                <a href="<?= base_url(); ?>eyemarket/hapus_keranjang/<?= $cart['id']; ?>"> 
                                    <i class="fa fa-trash-o"></i> 
                                </a>
                            </td>
                        </tr>
                <?php        
                    }
                ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="5">Total</th>
                            <th>
                                <span id="total-all">Rp. <?= number_format($total_all->total_all,0,',','.'); ?></span>
                            </th>
                        </tr>
                    </tfoot>
                </table>

            </div>
            <!-- /.table-responsive -->

            <div class="box-footer">
                <div class="pull-left">
                    <a href="<?= base_url(); ?>eyemarket" class="btn btn-default"><i class="fa fa-chevron-left"></i> Lanjut Berbelanja</a>
                </div>
        <?php 
            if ($jumlah->jumlah >= 1)
            {
        ?>
                <div class="pull-right">
                    <!-- <button class="btn btn-default"><i class="fa fa-refresh"></i> Update cart</button> -->
                    <a href="<?= base_url(); ?>eyemarket/input_order/<?= $member_id; ?>" class="btn btn-template-main">Pesan Sekarang <i class="fa fa-chevron-right"></i>
                    </a>
                </div>
        <?php        
            }
        ?>
            </div>

        </div>
        <!-- /.box -->

    </div>
    <!-- /.col-md-9 -->

    <div class="col-md-3">
<?php
    foreach ($model as $cart)
    {
?>
        <div class="modal fade" id="form-catatan-<?= $cart['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="Login">Edit Catatan <?= $cart['nama']; ?></h4>
                    </div>
                    <div class="modal-body">
                        <!-- <form action="<?= base_url(); ?>eyemarket/edit_catatan/<?= $cart['id']; ?>" method="post"> -->
                            <div class="form-group">
                                <textarea name="catatan" class="form-control" id="catatan-<?= $cart['id']; ?>"><?php echo isset($cart['catatan']) ? $cart['catatan'] : ""; ?></textarea>
                            </div>
                            <!-- <input type="submit" name="simpan" value="Simpan" class="btn btn-info"> -->
                            <button class="btn btn-info" id="btn-catatan-<?= $cart['id']; ?>" onclick="editCatatan(<?= $cart['id']; ?>)">
                                Simpan 
                            </button>
                        <!-- </form> -->
                    </div>
                </div>
            </div>
        </div>
<?php        
    }
?>
        <div class="form-edit-">
            
        </div>
    </div>

</div>

<script type="text/javascript">
    function editJumlah(id_keranjang)
    {
        var id_member           = <?php echo $member_id; ?>;
        var jumlah_sekarang     = $('#jumlah-'+id_keranjang).val();
        var urlnya              = "<?= base_url(); ?>Eyemarket/edit_keranjang";

        $.ajax({
            url: urlnya,
            type: 'POST',
            data: {jumlah_sekarang:jumlah_sekarang,id_member:id_member,id_keranjang:id_keranjang},
            dataType: 'json',
        })
        .done(function(result) {
            var harga_per_prod  = result.total_update;
            var output_harga    = 'Rp. '+harga_per_prod.toLocaleString('id',{currency: 'IDR',minimumFractionDigits: 0});

            var total_all       = result.total_all_update;
                    
            var reverse = total_all.toString().split('').reverse().join(''),
                ribuan  = reverse.match(/\d{1,3}/g);
                ribuan  = 'Rp. '+ribuan.join('.').split('').reverse().join('');

            $('#total-'+id_keranjang).html(output_harga);
            $('#total-all').html(ribuan);
        })
        .fail(function() {
            console.log("error");
        });
    }

    function editCatatan(id_keranjang)
    {
        var id_member       = <?php echo $member_id; ?>;

        var new_catatan     = $('#catatan-'+id_keranjang).val();
        var urlnya          = "<?= base_url(); ?>Eyemarket/edit_catatan";

        $.ajax({
            url: urlnya,
            type: 'POST',
            data: {new_catatan:new_catatan,id_member:id_member,id_keranjang:id_keranjang},
            dataType: 'json',
        })
        .done(function(result) {
            
            $('.loading_eyesoccer').removeClass('hidden');

            $('#form-catatan-'+id_keranjang).removeClass('in').attr('hidden','true').attr('style','display:none');
            $('#text-catatan-'+id_keranjang).html(result.catatan_update);

            var stopScroll = ($( window ).width() < 760) ? 600 : 530;
            $("html, body").animate({ scrollTop: stopScroll }, 1000,function(){$('.loading_eyesoccer').addClass('hidden');});
            console.log(result);
        })
        .fail(function() {
            console.log("error");
        });
    }
</script>