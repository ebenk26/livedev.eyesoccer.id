

<div class="card">
    <div class="card-block">
        <h1>Konfirmasi Pesanan</h1>
        <br>
        <form action="<?= base_url(); ?>eyemarket/upload_bukti/<?= $id_member; ?>" method="post" enctype="multipart/form-data">
    		<div class="row">
    			<div class="col-md-12">
    				<div class="col-md-6" style="padding-left: unset;">
    					<div class="form-group">
    					    <label>No. Order</label>
    					    <input type="number" name="no_order" class="form-control p-input" placeholder="e.g : 201801xxxxxx">
    					</div>
    				</div>
    			</div>
    			<div class="col-md-12">
    				<div class="col-md-6" style="padding-left: unset;">
    					<div class="form-group">
    					    <label>Jumlah Yang di Transfer (Rp.)</label>
    					    <input type="number" name="nominal" class="form-control p-input" placeholder="e.g : 1000000">
    					</div>
    				</div>
    			</div>
    			<div class="col-md-12">
    				<div class="col-md-6" style="padding-left: unset;">
    					<div class="form-group">
    					    <label>Upload Bukti</label>
    					    <input type="file" name="bukti" class="form-control-file">
    					</div>
    				</div>
    			</div>
    		</div>
    	    <div class="col-12">
    	        <button type="submit" class="btn btn-primary">Submit</button>
    	    </div>
        </form>
    </div>
</div>