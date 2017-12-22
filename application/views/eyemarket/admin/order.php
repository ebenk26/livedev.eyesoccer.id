
<div class="card">
    <div class="card-block">
        <h1>Daftar Order</h1>
        <br>
        <div class="table-responsive">
        	<table class="table">
        	    <thead>
        	        <tr class="text-primary">
        	            <th>ID Order</th>
        	            <th>Pemesan</th>
        	            <th>No. Order</th>
        	            <th>No. Invoice</th>
        	            <th>Total Harga</th>
        	            <th>Tanggal Transaksi</th>
        	            <th>Status</th>
        	            <th>#</th>
        	        </tr>
        	    </thead>
        	    <tbody>
        	<?php 
        		foreach ($model as $value)
        		{
        			$status     = "";

        			if ($value['status'] == 1)
        			{
        			    $status     = '<label class="badge badge-default">Menunggu Pembayaran</label>';
        			}
        			else
        			if ($value['status'] == 2)
        			{
        			    $status     = '<label class="badge badge-info">Menunggu Konfirmasi Admin</label>';
        			}
        			else
        			if ($value['status'] == 3)
        			{
        			    $status     = '<label class="badge badge-success">Lunas</label>';
        			}
        			else
        			if ($value['status'] == 4)
        			{
        			    $status     = '<label class="badge badge-danger">Expired</label>';
        			}
        			else
        			if ($value['status'] == 5)
        			{
        			    $status     = '<label class="badge badge-danger">Batal</label>';
        			}
        	?>
        			<tr>
        				<td>
        					<?= $value['id']; ?>
    					</td>
    					<td>
        					<?= $value['fullname']; ?>
    					</td>
    					<td>
        					<?= $value['no_order']; ?>
    					</td>
    					<td>
        					<?= $value['no_invoice']; ?>
    					</td>
    					<td>
        					Rp. <?= number_format($value['harga_all'],0,',','.'); ?>
    					</td>
    					<td>
        					<?= $value['order_date']; ?>
    					</td>
    					<td>
        					<?= $status; ?>
    					</td>
    					<td>
    								<a class="fa fa-eye" title="detail" style="cursor: pointer;"></a>
        					<?php
		                        if ($value['status'] == 2)
		                        {
		                    ?>
		                            <a class="fa fa-picture-o" title="Lihat Bukti" style="color: #fbea04;cursor: pointer;" aria-hidden="true" data-toggle="modal" data-target="#modalBukti<?= $value['id']; ?>"></a>

		                    <?php
		                        }
		                        else
		                        if ($value['status'] == 3)
		                        {
		                    ?>
		                            <a class="fa fa-check-square-o" title="Lunas" style="color: #4ef50b;cursor: pointer;" aria-hidden="true" data-toggle="modal" data-target="#modalBukti<?= $value['id']; ?>"></a>
		                    <?php
		                        }
		                    ?>

    	                            <div class="modal fade" id="modalBukti<?= $value['id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    	                                <div class="modal-dialog modal-lg" role="document">
    	                                    <div class="modal-content">
    	                                        <div class="modal-header">
    	                                            <h5 class="modal-title" id="exampleModalLabel">
    	                                            	Bukti Pembayaran <?= $value['no_order']; ?>
    	                                            </h5>
    	                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    	                                                <span aria-hidden="true">&times;</span>
    	                                            </button>
    	                                        </div>
                                                <div class="modal-body" style="background-color: #f2f2f2;">
                                                	<div class="row">
                                                		<div class="col-md-6">
                                                			<img src="<?= base_url(); ?>/img/eyemarket/bukti/<?= $value['bukti']; ?>" alt="bukti konfirmasi" style="width:125%;">
                                                		</div>
                                                		<div class="col-md-6">
                                                			<div class="text-center">
                                        				<?php
                                        					if ($value['status'] == 2)
                                        					{
                                        				?>
                                        						<a href="<?= base_url(); ?>eyemarket/order_lunas/<?= $value['id']; ?>" class="btn btn-info">Lunas!</a>
                                        				<?php		
                                        					}
                                        				?>
                                                				
                                                			</div>
                                                		</div>
                                                	</div>
                                                	
                                                </div>
    	                                    </div>
    	                                </div>
    	                            </div>
		                    		
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
