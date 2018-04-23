<?php
$comp =  ($this->uri->segment(3)  =='' ? 'Liga Indonesia 1' : urldecode($this->uri->segment(3)));
?>
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
</style>
<div class="baseurl" val="<?php echo EYEPROFILE?>"></div>
	<div class="crumb">
		<ul>
		<li><a href='<?php echo base_url(); ?>' style='display: unset'>Home</a></li>
		<li><a href='<?php echo pCLUB ?>' style='display: unset'>Eyeprofile</a></li>
		<li><a href='#' style='display: unset'>Ofisial</a></li>
		</ul>
	</div>
	<div class="center-desktop m-0">
        <div class="menu-2 w-100 m-0-0 pd-t-20">
            <ul>
                <li><?php echo anchor(pCLUB,'Klub')?></li>
                <li><?php echo anchor(pPLAYER,'Pemain')?></li>
                <li class="active"><?php echo anchor(pOFFICIAL,'Ofisial')?></li>
                <li><?php echo anchor(pREFEREE,'Perangkat Pertandingan')?></li>
                <li><?php echo anchor(pSUPPORT,'supporter')?></li>
            </ul>
            <select id="competition_change" name="" selected="true" class="slc-musim fl-r" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);" style="margin: -12px 0 2px 0;">
					<option value="">--Pilih Liga--</option>
				<?php
					foreach($get_all_kompetisi as $row){
				?>
					<option value="<?php echo base_url()."eyeprofile/official/".$row->competition?>"><?php echo $row->competition;?></option>';  
				<?php
					}
				?>
					<option value="<?php echo base_url()."eyeprofile/official/non liga"?>">Non Liga</option>
            </select>
        </div>
    </div>
    <div class="center-desktop m-0">
         <div id="resdataleague">
        <div class="container box-border-radius fl-l mt-30">  
            <div class="reqdataofficial" id="reqofficial" action="doit"> 
                <input type="hidden" name="fn" value="getdataleague" class="cinput">
                <input type="hidden" name="competition" value="<?php echo $comp?>" class="cinput">   
                <script>
                    $(function(){
                        ajaxOnLoad('reqdataofficial');
                    })
                </script>

                <div class="fl-l img-80" style="display:none;">             
                    <img src="<?=imgUrl()?>assets/img/content_11.jpg" alt="" height="100%">
                </div>
                <div class="tabel-liga-370 b-r-1 table-pd-3 fl-l box-bg" style="width:500px;height:140px;max-height: 200px !important;margin:auto">
                   
                </div>
                <div class="tabel-liga-370  b-r-1 table-pd-3 fl-l box-bg" style="width:500px;height:140px;max-height: 200px;margin:auto">
                   
                </div>
            </div>
        </div>
        </div>
    </div>
    <div class="center-desktop m-0">
    <img src="<?=base_url()?>newassets/img/ic_search.png" alt="" class="img-src-200">
    <div id="reqlistplayer" class="loadlistofficial" action="do">
	    <input type="hidden" name="fn" value="getlistofficial" class="cinput">
        <input type="hidden" name="page" value="<?php echo ($this->uri->segment(5) ?  $this->uri->segment(5) : 1 )?>" class="cinput"> 
        <input type="hidden" name="competition" value="<?php echo $comp?>" class="cinput"> 

        <?php 
        if($this->uri->segment(4) AND $this->uri->segment(4) != 'page'){
            echo '<input type="hidden" name="league" value="'.urldecode($this->uri->segment(4)).'" class="cinput">';
        } ?>
        <script>
            $(function(){
                ajaxOnLoad('loadlistofficial');
            })
        </script>
    </div>
    <div id="reslistofficial">
        <ul style="width:100%;">
            <?php
                for($i = 0; $i <= 10; $i++ ){
                    echo '<li class="box-bg" style="width: 100%;height: 30px"></li>';
                }
            ?>
                
        </ul>
    </div>
</div>