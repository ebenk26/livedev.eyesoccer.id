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
		<li><a href='<?php pCLUB?>' style='display: unset'>Eyeprofile</a></li>
		<li><a href='#' style='display: unset'>Pemain</a></li>
		</ul>
		<input type="hidden" class="hidden_subliga" value="<?php echo $this->uri->segment(4); ?>"/>
	</div>
	<div class="center-desktop m-0">
        <div class="menu-2 w-100 m-0-0 pd-t-20">
            <ul>
                <li><a href="<?=pCLUB?>">Klub</a></li>
                <li class="active"><a href="<?=base_url()?>eyeprofile/pemain">Pemain</a></li>
                <li><a href="<?=base_url()?>eyeprofile/official">Ofisial</a></li>
                <li><a href="<?=base_url()?>eyeprofile/referee">Perangkat Pertandingan</a></li>
                <li><a href="<?=base_url()?>eyeprofile/supporter">supporter</a></li>
            </ul>
            <select id="chained_kompetisi" name="" selected="true" class="slc-musim fl-r" onchange="if(this.options[this.selectedIndex].value != 'Liga Usia Muda'){window.location = this.options[this.selectedIndex].value};" style="margin: -12px 0 2px 0;">
					<option value="">--Pilih Liga--</option>
                <?php foreach($competition as $r){?>
                
                <option <?php echo ($r->competition == urldecode($this->uri->segment(3)) ? 'selected' : '')?> value="<?php echo ($r->competition =='Liga Usia Muda' ? 'Liga Usia Muda' : base_url()."eyeprofile/pemain/".$r->competition)?>"><?php echo $r->competition;?></option>';  
                <?php } ?>
                <option value="<?php echo base_url()."eyeprofile/klub/non liga"?>">Non Liga</option>
			</select>
				
			<select id="chained_liga" name="" selected="true" class="slc-musim fl-r" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);" style="margin: 0px 0px 2px;display:none;">
				<option value="">--Pilih Kategori Liga--</option>
			<?php

				foreach($get_all_liga as $row){

			?>
				<option value="<?php echo base_url()."eyeprofile/pemain/Liga Usia Muda/".$row->league?>"><?php echo $row->league;?></option>';  
			<?php
				}
			?>
			</select>
        </div>
    </div>
    <div class="center-desktop m-0">
        <div id="resdataleague">
        <div class="container box-border-radius fl-l mt-30">  
            <div class="reqdataleague" id="reqdata" action="playerlist"> 
                <input type="hidden" name="fn" value="getdataleague" class="cinput">
                <input type="hidden" name="competition" value="<?php echo $comp?>" class="cinput">
    
                <script>
                    $(function(){
                        ajaxOnLoad('reqdataleague');
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
    <div id="reqlistplayer" class="loadlistplayer" action="playerlist">
        <input type="hidden" name="fn" value="getplayerlist" class="cinput">
        <input type="hidden" name="page" value="<?php echo ($this->uri->segment(5) ? $this->uri->segment(5) : 1 )?>" class="cinput"> 
        <input type="hidden" name="competition" value="<?php echo $comp?>" class="cinput"> 
        <script>
            $(function(){
                ajaxOnLoad('loadlistplayer');
            })
        </script>
    </div>
    <div id="loadlistplayer">
        <ul style="width:100%;">
            <?php
                for($i = 0; $i <= 10; $i++ ){
                    echo '<li class="box-bg" style="width: 100%;height: 30px"></li>';
                }
            ?>
                
        </ul>
    </div>
</div>