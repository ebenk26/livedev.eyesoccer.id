<div style="display: none;" id="alert-success" class="alert alert-success alert-dismissable">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <span >
        <h4>Data berhasil di hapus</h4>
    </span>
</div>
<div style="display: none;" id="alert-failed" class="alert alert-danger alert-dismissable">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <span >
        <h4>Data gagal di hapus</h4>
    </span>
</div>

<p><?php  echo $this->session->flashdata('statusMsg'); ?></p>

<div class="card mb-3">
    <div class="card-header">
        <i class="fa fa-table"></i>
        Data Produk
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" width="100%" id="dataTable" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Toko</th>
                        <th>Region</th>
                        <th>Kategori</th>
                        <th>Nama</th>
                        <th>Harga</th>
                        <th>Status</th>
                        <th>#</th>
                    </tr>
                </thead>
                <tbody>
        <?php
        	if ($product != NULL)
        	{
        		foreach ($product as $value)
            	{
                    $ket_ongkir = '';
                    
                    if ($value['ongkir'] == 0)
                    {
                        $ket_ongkir = 'Belum Termasuk';
                    }
                    else
                    {
                        $ket_ongkir = 'Sudah Termasuk';
                    }
        ?>
					<tr id="hasil<?= $value['id_product']; ?>">
					    <td>
					    	<?= $value['id_product']; ?> 
					    </td>
                        <td>
                            <?= $value['toko']; ?> 
                        </td>
                        <td>
                            <?= $value['nama_region']; ?> 
                        </td>
                        <td>
                            <?= $value['kategori']; ?> 
                        </td>
					    <td>
					    	<?= $value['nama']; ?> 
					    </td>
					    <td>
					    	Rp. <?= number_format($value['harga'],0,',','.'); ?> 
					    </td>
					    <td>
                            <?php
                                if ($value['status_publish'] == 0)
                                {
                                    echo 'disable';
                                }
                                else
                                {
                                    echo 'enable';
                                }
                            ?>
					    </td>
					    <td>
                    <?php
                        if ($value['status_publish'] == 0)
                        {
                    ?>
                            <a class="fa fa-clock-o" title="disable" style="color: #fbea04;cursor: pointer;" href="enable_produk/<?= $value['id_product']; ?>"></a>
                    <?php
                        }
                        else
                        {
                    ?>
                            <a class="fa fa-check-square-o" title="enable"  style="color: #4ef50b;cursor: pointer;" href="disable_produk/<?= $value['id_product']; ?>"></a>
                    <?php
                        }
                    ?>
                            <!-- <a class="fa fa-picture-o" title="image" style="cursor: pointer;" aria-hidden="true" data-toggle="modal" data-target="#modalImage<?= $value['id_product']; ?>"></a> -->

                            <span class="fa fa-picture-o" title="image" style="cursor: pointer;" onclick="modalImage(<?= $value['id_product']; ?>)" id="image<?= $value['id_product']; ?>"></span>

                            <a class="fa fa-pencil-square-o" title="edit" style="cursor: pointer;" aria-hidden="true" data-toggle="modal" data-target="#modalEdit<?= $value['id_product']; ?>"></a>

                            <a class="fa fa-trash-o" title="delete" style="cursor: pointer;" aria-hidden="true" data-toggle="modal" data-target="#modalDelete<?= $value['id_product']; ?>"></a>
					    </td>

					    <!-- Modal Form Edit -->
					    <div class="modal fade" id="modalEdit<?= $value['id_product'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					        <div class="modal-dialog" role="document">
					            <div class="modal-content">
					                <div class="modal-header">
					                    <h5 class="modal-title" id="exampleModalLabel">Edit Produk <?= $value['nama']; ?></h5>
					                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					                        <span aria-hidden="true">&times;</span>
					                    </button>
					                </div>
					                <form action="edit_produk/<?= $value['id_product'];?>" method="post">
					                    <div class="modal-body">
                                            <div class="form-group">
                                                <select name="id_kategori" class="form-control pilih-kategori">
                                                    <option value="<?= $value['id_kategori']; ?>"><?= $value['kategori']; ?></option>
                                            <?php 
                                                foreach ($kategori as $kategorinya)
                                                {
                                            ?>
                                                    <option value="<?= $kategorinya['id']; ?>">
                                                        <?= $kategorinya['nama']; ?>
                                                    </option>
                                            <?php        
                                                }
                                            ?>   
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <select name="id_toko" class="form-control">
                                                    <option value="<?= $value['id_toko']; ?>"><?= $value['toko']; ?></option>
                                            <?php 
                                                foreach ($toko as $tokonya)
                                                {
                                            ?>
                                                    <option value="<?= $tokonya['id']; ?>">
                                                        <?= $tokonya['nama']; ?>
                                                    </option>
                                            <?php        
                                                }
                                            ?>   
                                                </select>
                                            </div>
					                        <div class="form-group">
                                                <label>Nama</label>
					                            <input type="text" class="form-control" name="nama" value="<?php echo $value['nama']; ?>">
					                        </div>
                                            <div class="form-group">
                                                <label>Harga Awal</label>
                                                <input id="harga_sebelum" type="number" class="form-control" name="harga_sebelum" value="<?php echo $value['harga_sebelum']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label>Harga</label>
                                                <input id="harga" type="number" class="form-control" name="harga" value="<?php echo $value['harga']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label>Diskon</label>
                                                <input id="diskon" type="number" class="form-control" name="diskon" value="<?php echo $value['diskon']; ?>">
                                            </div>
                                            <div class="pilihan-sizeSML" style="display: none;">
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label>Stok ukuran S</label>
                                                            <input id="number" type="ukuranS" class="form-control" name="ukuranS" placeholder="Masukkan Jumlah Produk">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label>Stok ukuran M</label>
                                                            <input id="number" type="ukuranM" class="form-control" name="ukuranM" placeholder="Masukkan Jumlah Produk">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label>Stok ukuran L</label>
                                                            <input id="number" type="ukuranL" class="form-control" name="ukuranL" placeholder="Masukkan Jumlah Produk">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label>Stok ukuran XL</label>
                                                            <input id="number" type="ukuranXL" class="form-control" name="ukuranXL" placeholder="Masukkan Jumlah Produk">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label>Stok ukuran XXL</label>
                                                            <input id="number" type="ukuranXXL" class="form-control" name="ukuranXXL" placeholder="Masukkan Jumlah Produk">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Stok</label>
                                                <input id="stok" type="number" class="form-control" name="stok" value="<?php echo $value['stok']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label>Berat</label>
                                                <input id="berat" type="number" class="form-control" name="berat" value="<?php echo $value['berat']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="keterangan">Keterangan Produk</label>
                                                <textarea name="keterangan" class="form-control"><?php echo $value['keterangan']; ?></textarea>
                                            </div>
                                            <div class="form-group">
                                                <select class="form-control" name="ongkir">
                                                    <option value="<?= $value['ongkir']; ?>"><?= $ket_ongkir; ?></option>
                                                    <option value="0">Belum termasuk</option>
                                                    <option value="1">Sudah termasuk</option>
                                                </select>
                                            </div>
					                    </div>
					                    <div class="modal-footer">
					                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
					                        <input class="btn btn-success" type="submit" name="submit" value="Simpan">
					                    </div>
					                </form>
					            </div>
					        </div>
					    </div>
                        <!-- Modal Form Delete -->
                        <div class="modal fade" id="modalDelete<?= $value['id_product'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Delete Produk <?= $value['nama']; ?></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <a class="btn btn-danger btn-block" href="delete_produk/<?= $value['id_product']; ?>">DELETE</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Modal Form Image -->
                        <div class="modal fade" id="modalImage<?= $value['id_product'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Image Produk <?= $value['nama']; ?></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-lg-4 col-md-4">
                                                <form action="tambah_gambar/<?= $value['id_product']; ?>" method="POST" enctype="multipart/form-data" id="form-image1-<?= $value['id_product']; ?>">
                                                    <div class="form-group">
                                                        <label>Gambar 1 (utama)</label>
                                                        <input type="file" name="image1" id="image1-<?= $value['id_product']; ?>">
                                                    </div>
                                                    <div id="uploaded_image1<?= $value['id_product']; ?>">
                                                        <img src="<?= base_url()."produk_image/".$value['image1']; ?>" width="200" height="200">
                                                    </div>
                                                    <input type="hidden" name="img_hidden1" value="image1">
                                                    <input type="submit" value="Simpan" class="btn btn-info">
                                                </form>
                                            </div>
                                            <div class="col-lg-4 col-md-4">
                                                <form action="tambah_gambar/<?= $value['id_product']; ?>" method="POST" enctype="multipart/form-data" id="form-image2-<?= $value['id_product']; ?>">
                                                    <div class="form-group">
                                                        <label>Gambar 2</label>
                                                        <input type="file" name="image2" id="image2-<?= $value['id_product']; ?>">
                                                    </div>
                                                    <div id="uploaded_image2<?= $value['id_product']; ?>">
                                                        <img src="<?= base_url()."produk_image/".$value['image2']; ?>" width="200" height="200">
                                                    </div>
                                                    <input type="hidden" name="img_hidden2" value="image2">
                                                    <input type="submit" value="Simpan" class="btn btn-info">
                                                </form>
                                            </div>
                                            <div class="col-lg-4 col-md-4">
                                                <form action="tambah_gambar/<?= $value['id_product']; ?>" method="POST" enctype="multipart/form-data" id="form-image3-<?= $value['id_product']; ?>">
                                                    <div class="form-group">
                                                        <label>Gambar 3</label>
                                                        <input type="file" name="image3" id="image3-<?= $value['id_product']; ?>">
                                                    </div>
                                                    <div id="uploaded_image3<?= $value['id_product']; ?>">
                                                        <img src="<?= base_url()."produk_image/".$value['image3']; ?>" width="200" height="200">
                                                    </div>
                                                    <input type="hidden" name="img_hidden3" value="image3">
                                                    <input type="submit" value="Simpan" class="btn btn-info">
                                                </form>
                                            </div>
                                            <div class="col-lg-4 col-md-4">
                                                <form action="tambah_gambar/<?= $value['id_product']; ?>" method="POST" enctype="multipart/form-data" id="form-image4-<?= $value['id_product']; ?>">
                                                    <div class="form-group">
                                                        <label>Gambar 4</label>
                                                        <input type="file" name="image4" id="image4-<?= $value['id_product']; ?>">
                                                    </div>
                                                    <div id="uploaded_image4<?= $value['id_product']; ?>">
                                                        <img src="<?= base_url()."produk_image/".$value['image4']; ?>" width="200" height="200">
                                                    </div>
                                                    <input type="hidden" name="img_hidden4" value="image4">
                                                    <input type="submit" value="Simpan" class="btn btn-info">
                                                </form>
                                            </div>
                                            <div class="col-lg-4 col-md-4">
                                                <form action="tambah_gambar/<?= $value['id_product']; ?>" method="POST" enctype="multipart/form-data" id="form-image5-<?= $value['id_product']; ?>">
                                                    <div class="form-group">
                                                        <label>Gambar 5</label>
                                                        <input type="file" name="image5" id="image5-<?= $value['id_product']; ?>">
                                                    </div>
                                                    <div id="uploaded_image5<?= $value['id_product']; ?>">
                                                        <img src="<?= base_url()."produk_image/".$value['image5']; ?>" width="200" height="200">
                                                    </div>
                                                    <input type="hidden" name="img_hidden5" value="image5">
                                                    <input type="submit" value="Simpan" class="btn btn-info">
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Modal Form Image2 -->
                        <div class="modal fade" id="mmodalImage<?= $value['id_product'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Image Produk <?= $value['nama']; ?></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="tambah_gambar/<?= $value['id_product']; ?>" method="POST" enctype="multipart/form-data" id="form-image<?= $value['id_product']; ?>">
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-lg-4 col-md-4">
                                                    <div class="form-group">
                                                        <label>Gambar 1</label>
                                                        <input type="file" name="image[]" id="image1-<?= $value['id_product']; ?>" multiple>
                                                        <label>Gambar 2</label>
                                                        <input type="file" name="image[]" id="image2-<?= $value['id_product']; ?>" multiple>
                                                        <label>Gambar 3</label>
                                                        <input type="file" name="image[]" id="image3-<?= $value['id_product']; ?>" multiple>
                                                        <img src="<?= base_url()."produk_image/".$value['image1']; ?>" width="200" height="200">
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="submit" value="Simpan" class="btn btn-info">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
					</tr>
        <?php		
        		}
            }
            else
            {
        ?>
            		<tr>
            			<td>Produk masih kosong</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
            		</tr>
        <?php    	
            }
        ?>
                </tbody>
            </table>
            <button class="btn btn-primary" id="tambah-product">Tambah Produk</button>
            <button class="btn btn-danger" id="tutup-product" style="display: none;">Tutup</button>
            <br />
            <br />
            <div style="display: none;" id="form-tambah">
                <form action="tambah_produk" method="POST" id="form" enctype="multipart/form-data">
                    <div class="form-group">
                        <select name="id_parent_cat" class="form-control">
                            <option value="">Pilih Kategori Region</option>
<?php 
                        foreach ($region as $regionnya)
                        {
?>
                            <option value="<?= $regionnya['id']; ?>">
                                <?= $regionnya['nama']; ?>
                            </option>
<?php        
                        }
?>   
                        </select>
                    </div>
                    <div class="form-group">
                        <select name="id_kategori" class="form-control pilih-kategori">
                            <option value="">Pilih Kategori Produk</option>
<?php 
                        foreach ($kategori as $kategorinya)
                        {
?>
                            <option value="<?= $kategorinya['id']; ?>">
                                <?= $kategorinya['nama']; ?>
                            </option>
<?php        
                        }
?>   
                        </select>
                    </div>
                    <div class="form-group">
                        <select name="id_toko" class="form-control">
                            <option value="">Pilih Toko</option>
<?php 
                        foreach ($toko as $tokonya)
                        {
?>
                            <option value="<?= $tokonya['id']; ?>">
                                <?= $tokonya['nama']; ?>
                            </option>
<?php        
                        }
?>   
                        </select>
                    </div>
                    <div class="form-group">
                        <input id="nama" type="text" class="form-control" name="nama" placeholder="Masukkan Nama Produk">
                    </div>
                    <div class="form-group">
                        <input id="harga_sebelum" type="number" class="form-control" name="harga_sebelum" placeholder="Masukkan Harga Awal">
                    </div>
                    <div class="form-group">
                        <input id="harga" type="number" class="form-control" name="harga" placeholder="Masukkan Harga">
                    </div>
                    <div class="form-group">
                        <input id="diskon" type="number" class="form-control" name="diskon" placeholder="Masukkan Harga Diskon">
                    </div>
                    <div class="pilihan-sizeSML" style="display: none;">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Stok ukuran S</label>
                                    <input id="number" type="ukuranS" class="form-control" name="ukuranS" placeholder="Masukkan Jumlah Produk">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Stok ukuran M</label>
                                    <input id="number" type="ukuranM" class="form-control" name="ukuranM" placeholder="Masukkan Jumlah Produk">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Stok ukuran L</label>
                                    <input id="number" type="ukuranL" class="form-control" name="ukuranL" placeholder="Masukkan Jumlah Produk">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Stok ukuran XL</label>
                                    <input id="number" type="ukuranXL" class="form-control" name="ukuranXL" placeholder="Masukkan Jumlah Produk">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Stok ukuran XXL</label>
                                    <input id="number" type="ukuranXXL" class="form-control" name="ukuranXXL" placeholder="Masukkan Jumlah Produk">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <input id="berat" type="number" class="form-control" name="berat" placeholder="Masukkan Berat Produk">
                    </div>
                    <div class="form-group">
                        <label for="keterangan">Keterangan Produk</label>
                        <textarea name="keterangan" class="form-control tinymce" rows="10"></textarea>
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="ongkir">
                            <option value="">Pilih Keterangan Ongkir</option>
                            <option value="0">Belum termasuk</option>
                            <option value="1">Sudah termasuk</option>
                        </select>
                    </div>
                    <div class="form-group" id="harga-ongkir" style="display: none;">
                        <input id="harga_ongkir" type="number" class="form-control" name="harga_ongkir" placeholder="Masukkan Harga Ongkir">
                    </div>
                    <div class="form-group">
                        <!-- <span id="tombol-tambah" class="btn btn-success">Simpan</span> -->
                        <input type="submit" name="" value="Simpan" class="btn btn-info">
                    </div>
                </form>
            </div>
        </div>
  </div>
  <div class="card-footer small text-muted">
    <!-- Updated yesterday at 11:59 PM -->
  </div>
</div>
