<div class="card">
    <div class="card-block">
        <h1>Keranjang Anda</h1>
        <br>
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
                                <img src="<?= base_url(); ?>produk_image/<?= $cart['image1']; ?>" alt="<?= $cart['nama']; ?>" style="width: 200px;height: 200px;">
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
                        <td style="display: none;">
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
    </div>
</div>
