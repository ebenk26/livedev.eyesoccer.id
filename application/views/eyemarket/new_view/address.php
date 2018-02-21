
<div class="row">

    <br>
    
    <ol class="breadcrumb" style="text-align: left;margin-bottom: 0px;">
        <li><a href="<?= base_url(); ?>">Home</a></li>
        <li><a href="<?= base_url(); ?>eyemarket">EyeMarket</a></li>
        <li><a href="<?= base_url(); ?>eyemarket/view_keranjang/<?= $id_member; ?> ">Keranjang Anda</a></li>
        <li><span>Alamat Tujuan</span></li>
    </ol>

    <div class="col-md-9 clearfix" id="checkout">

        <div class="box">
            <ul class="nav nav-pills nav-justified">
                <li class="active"><a href="#"><i class="fa fa-map-marker"></i><br>Alamat</a>
                </li>
                <li class="disabled"><a href="#"><i class="fa fa-truck"></i><br>Metode Pengiriman</a>
                </li>
                <li class="disabled"><a href="#"><i class="fa fa-money"></i><br>Metode Pembayaran</a>
                </li>
                <li class="disabled"><a href="#"><i class="fa fa-eye"></i><br>Ulasan Pesanan</a>
                </li>
            </ul>

    <?php
        foreach ($member as $data)
        {
    ?>        
            
            <div class="content">
                <form method="post" action="<?= base_url(); ?>eyemarket/update_cart_address/<?= $id_member; ?>">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label> Pilih Alamat </label>
                        <?php 
                            if ($jumlah < 3)
                            {
                        ?>
                                <a id="tambah-alamat" style="float: right; cursor: pointer;"> Tambah Alamat </a>
                        <?php
                            }
                        ?>
                                
                                <select name="pilih_alamat" id="pilih-alamat" class="form-control" required="required">
                                    <option value="">Pilih Alamat Anda</option>
                    <?php
                        if (isset($address) && !empty($address))
                        {
                            foreach ($address as $key => $alamat)
                            {
                    ?>
                                    <option value="<?= $alamat['id']; ?>" id="<?= $key; ?>"><?= $alamat['nama']; ?></option>
                    <?php
                            }
                        }
                        else
                        {
                    ?>
                                    <option value="">Belum Ada Data Alamat</option>
                    <?php
                        }
                    ?>    
                                </select>
                            </div>
                        </div>
                    </div>
                
                <?php
                    foreach ($address as $key => $alamat)
                    {
                ?>
                        <div class="alamat-<?= $key; ?>" style="display: none;">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="firstname">Nama Lengkap Penerima</label>
                                        <input type="text" class="form-control" id="firstname" value="<?= $alamat['penerima']; ?>" disabled="disabled">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="phone">Handphone</label>
                                        <input type="text" class="form-control" id="phone" value="<?= $alamat['hp'] ?>" disabled="disabled">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="alamat">Alamat</label>
                                        <textarea id="alamat" class="form-control" disabled="disabled"><?= $alamat['alamat']; ?></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <div class="form-group">
                                        <label for="zip">Kode Pos</label>
                                        <input type="number" id="kodepos" class="form-control" value="<?= $alamat['kodepos']; ?>" disabled="disabled">
                                    </div>
                                </div>
                            </div>
                        </div>
                <?php        
                    }
                ?>
                        <div class="box-footer">
                            <div class="pull-left">
                                <a href="<?=base_url(); ?>eyemarket/view_keranjang/<?= $id_member; ?>" class="btn btn-default"><i class="fa fa-chevron-left"></i>Kembali Ke Keranjang</a>
                            </div>
                            <div class="pull-right">
                                <button type="submit" class="btn btn-template-main" id="btn-next">Lanjut ke Metode Pengiriman<i class="fa fa-chevron-right"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
    <?php        
        }
    ?>
                
        </div>
        <!-- /.box -->

        <!-- Modal Form Tambah Alamat -->
        <div class="modal fade" id="modalAlamat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Alamat</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="post" action="<?= base_url(); ?>eyemarket/input_address/<?= $id_member; ?>">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="nama_alamat">Simpan alamat sebagai</label>
                                        <input type="text" name="nama_alamat" id="nama_alamat" value="" class="form-control" placeholder="Rumah 1 / Kantor / Rumah Kakek">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="penerima">Nama Lengkap Penerima</label>
                                        <input type="text" name="penerima" id="penerima" value="" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="hp">Handphone</label>
                                        <input type="number" name="hp" id="hp" value="" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="alamat">Alamat</label>
                                        <textarea name="alamat" id="alamat" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-4">
                                    <div class="form-group">
                                        <select id="provinsi" name="provinsi" class="form-control">
                                            <option value="">Pilih Provinsi</option>
                                            <?php
                                                foreach ($provinsi as $provinsinya)
                                                {
                                            ?>
                                                    <option value="<?= $provinsinya['provinsi'] ?>">
                                                        <?= $provinsinya['provinsi'] ?> 
                                                    </option>
                                            <?php        
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-4">
                                    <div class="form-group">
                                        <select id="kota" name="kota" class="form-control" disabled>
                                            <option value="">Pilih Kota</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-4">
                                    <div class="form-group">
                                        <select id="kecamatan" name="kecamatan" class="form-control" disabled>
                                            <option value="">Pilih Kecamatan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <div class="form-group">
                                        <label for="zip">Kode Pos</label>
                                        <input type="number" name="kodepos" id="kodepos" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-9"></div>
                                <div class="col-sm-3">
                                    <input type="submit" value="Simpan" class="btn btn-info">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>


    </div>
    <!-- /.col-md-9 -->

</div>
<!-- /.row -->

            

    <!-- #### JAVASCRIPT FILES ### -->

    <script src="<?=base_url()?>bs/jud/js/jquery-1.11.0.min.js"></script>
    <script>
        window.jQuery || document.write('<script src="<?=base_url()?>bs/jud/js/jquery-1.11.0.min.js"><\/script>')
    </script>
    <script src="<?=base_url()?>bs/jud/js/bootstrap.min.js"></script>
    <script src="<?=base_url()?>bs/jud/js/jquery.cookie.js"></script>
    <script src="<?=base_url()?>bs/jud/js/waypoints.min.js"></script>
    <script src="<?=base_url()?>bs/jud/js/jquery.counterup.min.js"></script>
    <script src="<?=base_url()?>bs/jud/js/jquery.parallax-1.1.3.js"></script>
    <script src="<?=base_url()?>bs/jud/js/front.js"></script>
    <script src="<?=base_url()?>assets/eyemarket/user/js/jquery.chained.js"></script>

    <script type="text/javascript">
        $('#tambah-alamat').click(function()
        {
            $("#modalAlamat").modal();
        });

        $('select').on('change', function() {
            var id_address  = $(this).val();
            var id_form = $(this).find("option:selected").attr('id');

            if (id_form == "0")
            {
                $('.alamat-0').attr('style','display: block');
                $('.alamat-1').attr('style','display: none');
                $('.alamat-2').attr('style','display: none');
            }
            else
            if (id_form == "1")
            {
                $('.alamat-0').attr('style','display: none');
                $('.alamat-1').attr('style','display: block');
                $('.alamat-2').attr('style','display: none');
            }
            else
            if (id_form == "2")
            {
                $('.alamat-0').attr('style','display: none');
                $('.alamat-1').attr('style','display: none');
                $('.alamat-2').attr('style','display: block');
            }
            else
            {
                $('.alamat-0').attr('style','display: none');
                $('.alamat-1').attr('style','display: none');
                $('.alamat-2').attr('style','display: none');
            }
        });

        $('#provinsi').on('change', function()
        {
            var prov    = $(this).val();
            var urlnya  = "<?= base_url(); ?>Eyemarket/getkota";
            $('#kota').html('');

            $.ajax({
                url: urlnya,
                type: 'POST',
                data: {prov:prov},
                dataType: 'json',
            })
            .done(function(result) {
                var kotanya   = result;

                for (var i = 0; i < kotanya.length; i++)
                {
                    console.log(kotanya[i].kota);
                    $('#kota').prop("disabled", false);
                    $('#kota').append('<option value="'+kotanya[i].kota+'">'+kotanya[i].kota+'</option>');
                    
                }
                
            })
            .fail(function() {
                console.log("error");
            });
        });

        $('#kota').on('change', function()
        {
            var kota    = $(this).val();
            var urlnya  = "<?= base_url(); ?>Eyemarket/getkecamatan";
            $('#kecamatan').html('');
            
            $.ajax({
                url: urlnya,
                type: 'POST',
                data: {kota:kota},
                dataType: 'json',
            })
            .done(function(result) {

                for (var i = 0; i < result.length; i++)
                {
                    console.log(result[i].kecamatan);
                    $('#kecamatan').append('<option value="'+result[i].kecamatan+'">'+result[i].kecamatan+'</option>');
                    $('#kecamatan').prop("disabled", false);
                }

                
            })
            .fail(function() {
                console.log("error");
            });
        });

        
    </script>



</body>

</html>