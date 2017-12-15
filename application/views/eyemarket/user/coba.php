<?php /* ?>
<form method="post">
            
	<?php 
		// var_dump($provinsi);exit();
	?>

    <!--provinsi-->
    <select id="provinsi" name="provinsi">
        <option value="">Please Select</option>
        <?php
        foreach ($provinsi as $row)
        {
        ?>
            <option value="<?php echo $row['IDProvinsi']; ?>">
                <?php echo $row['Nama']; ?>
            </option>
        <?php
        }
        ?>
    </select>
    
    <!--kota-->
    <select id="kota" name="kota">
        <option value="">Please Select</option>
        <?php
    	foreach ($kota as $row)
    	{
        ?>
            <option id="kota" class="<?php echo $row['IDProvinsi']; ?>" value="<?php echo $row['id_kota']; ?>">
                <?php echo $row['nama_kota']; ?>
            </option>
        <?php
        }
        ?>
    </select>

    <!--kecamatan-->
    <select id="kecamatan" name="kecamatan">
        <option value="">Please Select</option>
        <?php
        foreach ($kecamatan as $row) {
        ?>
            <option id="kecamatan" class="<?php echo $row['id_kota']; ?>" value="<?php echo $row['id_kecamatan']; ?>">
                <?php echo $row['nama_kecamatan']; ?>
            </option>
        <?php
        }
        ?>
    </select>
</form>
<?php */?>

<select id="provinsi" name="provinsi">
    <option value="">Pilih Provinsi</option>
    <option value="jakarta">Jakarta</option>
    <option value="jabar">Jawa Barat</option>
</select>
<select id="kota" name="kota">
    <option value="">Pilih Seri</option>

    <option value="jaksel" data-chained="jakarta">
    	Jakarta Selatan 
    </option>
    <option value="jaktim" data-chained="jakarta">
    	Jakarta Timur 
    </option>
    <option value="jakbar" data-chained="jakarta">
    	Jakarta Barat 
    </option>
    <option value="jakut" data-chained="jakarta">
    	Jakarta Utara 
    </option>
	<!-- ============================================= -->
    <option value="depok" data-chained="jabar"> 
    	Depok 
    </option>
    <option value="bogor" data-chained="jabar"> 
    	Bogor 
    </option>
    <option value="bandung" data-chained="jabar"> 
    	Bandung 
    </option>
</select>

<select id="kecamatan" name="kecamatan">
    <option value="">--</option>
    <option value="tebet" data-chained="jaksel jakarta">Tebet</option>
    <option value="cijantung" data-chained="jaktim jakarta">Cijantung</option>
    <option value="margonda" data-chained="depok jabar">Margonda</option>
</select>