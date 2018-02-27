<style>
    .slc-musim{
        font-size: .95em !important;
        padding: 7px 20px !important;
    }
	input{
		font-size: .95em !important;
	}
	body{
        margin-top: -10px;
	}
	body{
        margin-top: -10px;
    }
</style>
	<div class="crumb">
		<ul>
		<li><a href='<?php echo base_url(); ?>' style='display: unset'>Home</a></li>
		<li><a href='<?php echo base_url().'eyeprofile/klub'; ?>' style='display: unset'>Eyeprofile</a></li>
		<li><a href='#' style='display: unset'>Perangkat pertandingan</a></li>
		</ul>
	</div>
	<div class="center-desktop m-0">
        <div class="menu-2 w-100 m-0-0 pd-t-20">
            <ul>
                    <li><a href="<?=base_url()?>eyeprofile/klub">Klub</a></li>
                    <li><a href="<?=base_url()?>eyeprofile/pemain">Pemain</a></li>
                    <li><a href="<?=base_url()?>eyeprofile/official">Ofisial</a></li>
                    <li class="active"><a href="<?=base_url()?>eyeprofile/referee">Perangkat Pertandingan</a></li>
                    <li><a href="<?=base_url()?>eyeprofile/supporter">supporter</a></li>
            </ul>
            <select id="competition_change" name="" selected="true" class="slc-musim fl-r" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);" style="margin: -12px 0 2px 0;">
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
            <!-- <i>Segera hadir...</i> -->
            <div class="container comingsoon">
				<img src="<?=base_url()?>assets/img/ComingSoon.png" alt="">
			</div>
		</div>
    </div>