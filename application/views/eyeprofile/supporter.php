<style>
    .slc-musim{
        font-size: .95em !important;
        padding: 7px 20px !important;
    }
	input{
		font-size: .95em !important;
	}
</style>
	<div class="center-desktop m-0">
        <div class="menu-2 w-100 m-0-0 pd-t-20">
            <ul>
                    <li><a href="<?=base_url()?>eyeprofile/klub/Liga%20Indonesia%201">Klub</a></li>
                    <li><a href="<?=base_url()?>eyeprofile/pemain/Liga%20Indonesia%201">Pemain</a></li>
                    <li><a href="<?=base_url()?>eyeprofile/klub_offisial/Liga%20Indonesia%201">Ofisial</a></li>
                    <li><a href="<?=base_url()?>eyeprofile/referee/Liga%20Indonesia%201">Perangkat Pertandingan</a></li>
                    <li class="active"><a href="<?=base_url()?>eyeprofile/supporter/Liga%20Indonesia%201">supporter</a></li>
            </ul>
            <select id="competition_change" name="" selected="true" class="slc-musim fl-r" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
					<option value="">--Pilih Liga--</option>
				<?php
					foreach($kompetisi_pro as $row){
				?>
					<option value="<?php echo base_url()."eyeprofile/referee/".$row['competition']?>"><?php echo $row['competition'];?></option>';  
				<?php
					}
				?>
                </select>
        </div>
    </div>
    <div class="center-desktop m-0">
		<div class="menu-2 w-100 m-0-0 pd-t-20" style="border: unset;">
			<i>Segera hadir...</i>
		</div>
    </div>