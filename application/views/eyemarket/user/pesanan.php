

<div class="card">
    <div class="card-block">
        <h1>Pesanan Anda</h1>
        <br>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr class="text-primary">
                        <th>No. Order</th>
                        <th>No. Invoice</th>
                        <th>Total Harga</th>
                        <th>Tanggal Transaksi</th>
                        <th>Status</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
            <?php
                foreach ($model as $order)
                {
                    $status     = "";

                    if ($order['status'] == 0)
                    {
                        $status     = '<label class="badge badge-warning">Masih dalam Keranjang</label>';
                    }
                    else
                    if ($order['status'] == 1)
                    {
                        $status     = '<label class="badge badge-primary">Menunggu Pembayaran</label>';
                    }
                    else
                    if ($order['status'] == 2)
                    {
                        $status     = '<label class="badge badge-info">Menunggu Konfirmasi Admin</label>';
                    }
            ?>
                    <tr class="">
                        <td> 
                            <?= $order['no_order']; ?> 
                        </td>
                        <td>
                            <?= $order['no_invoice']; ?>
                        </td>
                        <td>
                            Rp. <?= number_format($order['harga_all'],0,',','.'); ?>
                        </td>
                        <td>
                            <?= date('d F Y H:i:s',strtotime($order['order_date'])); ?>
                        </td>
                        <td style="">
                            <?= $status; ?>
                        </td>
                        <td> 
                            <a href="<?= base_url(); ?>eyemarket/invoice/<?= $order['no_order']; ?>" class="btn btn-primary btn-sm" target="_blank">Lihat Invoice</a>
                    <?php
                        if ($order['status'] == 1)
                        {
                    ?>
                            <a href="<?= base_url(); ?>eyemarket/konfirmasi/<?= $order['no_order']; ?>" class="btn btn-success btn-sm">Konfirmasi Pembayaran</a>
                    <?php 
                        }
                    ?>
                        </td>
                    </tr>
            <?php        
                }
            ?>
                    
                </tbody>
            </table>
        </div>
    </div>
</div>
