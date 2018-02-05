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
                    <li><a href="<?=base_url()?>eyeprofile/klub">Klub</a></li>
                    <li class="active"><a href="<?=base_url()?>eyeprofile/pemain">Pemain</a></li>
                    <li><a href="<?=base_url()?>eyeprofile/official">Ofisial</a></li>
                    <li><a href="<?=base_url()?>eyeprofile/referee">Perangkat Pertandingan</a></li>
                    <li><a href="<?=base_url()?>eyeprofile/supporter">supporter</a></li>
            </ul>
            <select id="competition_change" name="" selected="true" class="slc-musim fl-r" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);" style="margin: -12px 0 2px 0;">
					<option value="">--Pilih Liga--</option>
				<?php
					foreach($get_all_kompetisi as $row){
				?>
					<option value="<?php echo base_url()."eyeprofile/pemain/".$row['competition']?>"><?php echo $row['competition'];?></option>';  
				<?php
					}
				?>
					<option value="<?php echo base_url()."eyeprofile/pemain/non liga"?>">Non Liga</option>
                </select>
        </div>
    </div>
    <div class="center-desktop m-0">
        <div class="container box-border-radius fl-l mt-30">            				
                <div class="fl-l img-80">				
                    <img src="<?=imgUrl()?>assets/img/content_11.jpg" alt="" height="100%">
                </div>
                <div class="tabel-liga-370 b-r-1 table-pd-3 fl-l">
                    <table>
                        <tr>
                            <td>Level Liga</td>
                            <td>: <?php echo $title_liga; ?></td>
                            <input type="hidden" class="hidden_title" value="<?php echo $title_liga; ?>"/>
                        </tr>
                        <tr>
                            <td>Jumlah Klub</td>
                            <td>: <?php echo count($club_main)?> Klub</td>
                        </tr>
                        <tr>
                            <td>Jumlah Pemain</td>
                            <td>:
							<?php echo count($get_player_liga);?> Pemain</td>
                        </tr>
                        <tr>
                            <td>Pemain Asing</td>
                            <td>:
							<?php echo count($get_player_liga_strange);?> Pemain</td>
                        </tr>
                    </table>
                </div>
                <div class="tabel-liga-370 table-pd-3 fl-l">
                    <table>
                        <tr>
                            <td>Rekor Juara</td>
                            <td>: -</td>
                        </tr>
                        <tr>
                            <td>Usia Rata-rata</td>
                            <td>: -
                        </tr>
                        <tr>
                            <td>Juara Bertahan</td>
                            <td>: -</td>
                        </tr><tr>
                            <td>Pemain Bertahan</td>
                            <td>: -</td>
                        </tr>
                    </table>
                </div>
        </div>
    </div>
    <div class="center-desktop m-0">
    <img src="<?=base_url()?>newassets/img/ic_search.png" alt="" class="img-src-200">
	<table class="stripe cell-border" cellspacing="0" width="100%" id="example">
		<thead id="back900">
			<th>No</th>
			<th>Pemain</th>
			<th>Tgl. Lahir</th>
			<th>Posisi</th>
			<th>Klub</th>
			<th>Kewarganegaraan</th>
			<th>Main</th>
			<th>Gol</th>
			<th>Assist</th>	
		</thead>
		<tbody >

		</tbody>
	</table>
    </div>
	<script>
		var url = $(location).attr('href');
		// var fn = url.split('/').reverse()[0];
		var fn = $(".hidden_title").val();
		$('#example').DataTable( {
  			"order":[[5,"desc"]],
            "processing": true,
            "serverSide": true,
            "ajax":{
                url :"<?php echo base_url()?>eyeprofile/get_list_pemain/"+fn, // json datasource
                type: "post",  // method  , by default get
            },
			"language": {
				"url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Indonesian.json"
			}
        } );
	</script>