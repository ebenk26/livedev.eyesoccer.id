
        <div class="center-desktop m-0">
            <div class="container">
				<div class="half2">
				<?php
				foreach($eyevent_main as $vent){
				?>				
                    <div class="gambar2">
						<a href="<?php echo base_url(); ?>eyevent/detail/<?= $vent['id_event'];?>">					
							<img src="<?=imgUrl()?>systems/eyevent_storage/<?php print $vent['thumb1']; ?>">
						</a>
                        <div class="fl-l ae">
                            <a href="">
                                <i class="material-icons">keyboard_arrow_left</i>
                            </a>
                        </div>
                    </div>
				<?php } ?>
                </div>
                <div class="half2 p-d-l-20">
				<?php
				foreach($eyevent_main_2 as $vent2){
				?>				
                    <div class="gambar2">
						<a href="<?php echo base_url(); ?>eyevent/detail/<?= $vent2['id_event'];?>">					
							<img src="<?=imgUrl()?>systems/eyevent_storage/<?php print $vent2['thumb1']; ?>">
						</a>
                        <div class="fl-r ae">
                            <a href="">
                                <i class="material-icons">keyboard_arrow_right</i>
                            </a>
                        </div>
                    </div>
				<?php } ?>
                </div>
                <!-- </div> -->
            </div>
        </div>
        <div class="center-desktop m-0">
            <!-- <div class="w1020 m-0"> -->
            <div class="container menu-5 m-0 bbg">
                <div class="fl-l" style="width: max-content;">
                    <ul>
                        <li>
                            <a href="">HASIL PERTANDINGAN</a>
                        </li>
                        <li>
                            <a href="">JADWAL PERTANDINGAN</a>
                        </li>
                        <li>
                            <a href="">KLASEMEN</a>
                        </li>
                        <li>
                            <a href="">NONTON BARENG</a>
                        </li>
                    </ul>
                </div>
                <select id="ligachampion" class="lc fl-r">
                    <option value=>Liga Champion</option>
                    <option value=>Liga Champion 2</option>
                    <option value=>Liga Champion 3</option>
                    <option value=>Liga Champion 4</option>
                    <option value=>Liga Champion 5</option>
                </select>
            </div>
            <!-- </div> -->
        </div>

        <div class="center-desktop m-0">
            <!-- <div class="w1020 mt-30 m-0"> -->
            <div class="container mt-20">
                <div class="container eyv m-t-20">
                    <table class="tb-hasil">					
                        <thead>
                            <tr>
                                <th colspan="3">
											<?php
												$date = new DateTime(date("Y-m-d"));
												$date->modify('-1 day');
												echo $date->format('d F Y');
											?>								
								</th>
                            </tr>
                        </thead>
						<?php
						foreach($all_jadwal as $jadwal){
						?>						
                        <tbody>
                            <tr>
                                <td><?=$jadwal["club_a"]?>
                                    <img src="<?=imgUrl()?>systems/club_logo/<?php print $jadwal['logo_a']; ?>" alt="">
                                </td>
                                <td><?=date("H:i",strtotime($jadwal["jadwal_pertandingan"]))?>
                                    <span></span>
                                </td>
                                <td>
                                    <img src="<?=imgUrl()?>systems/club_logo/<?php print $jadwal['logo_b']; ?>" alt="">
									<?=$jadwal["club_b"]?>
                                </td>
                            </tr>                            
                        </tbody>  
					<?php } ?>
                        <thead>
                            <tr>
                                <th colspan="3"><?=date("d F Y")?></th>
                            </tr>
                        </thead>					
						<?php
						foreach($all_jadwal2 as $jadwal2){
						?>						
                        <tbody>
                            <tr>
                                <td><?=$jadwal2["club_a"]?>
                                    <img src="<?=imgUrl()?>systems/club_logo/<?php print $jadwal2['logo_a']; ?>" alt="">
                                </td>
                                <td><?=date("H:i",strtotime($jadwal2["jadwal_pertandingan"]))?>
                                    <span></span>
                                </td>
                                <td>
                                    <img src="<?=imgUrl()?>systems/club_logo/<?php print $jadwal2['logo_b']; ?>" alt="">
									<?=$jadwal2["club_b"]?>
                                </td>
                            </tr>                            
                        </tbody>  
					<?php } ?>					
                    </table>
                </div>

                <div class="container eyv-r mt-10">
                    <div class="down-r-vent">
                        <div class="kalender mt-20">
                            <div id="z"></div>
                            <!-- <input type="text" id="d" /> -->
                            <button class="btn-white-g" type="button">Lihat</button>
                        </div>
                    </div>
                    <div class="container down-r-vent mt-30">
                        <div class="fl-l">
                            <h4>BERITA TERBARU</h4>
                        </div>
                        <div class="fl-r bcd">
                            <a href="">
                                <span>Berita Lainnya</span>
                                <i class="material-icons">keyboard_arrow_right</i>
                            </a>
                        </div>
                        <div class="pd">
							<?php 
							foreach($eyenews_main as $terbaru){
							?>
                            <div>
                                <div class="container he">
                                    <a href="">
                                        <img src="<?php echo imgUrl(); ?>systems/eyenews_storage/<?= $terbaru['thumb1']; ?>" alt="">
                                    </a>
                                    <div class="container rx">
                                        <a href="<?php echo base_url(); ?>eyenews/detail/<?= $terbaru['url'];?>">
                                            <span><?=$terbaru['title'];?></span>
                                        </a>
                                        <div class="rr">
                                            <span>
												<?php
												$date 		=  new DateTime($terbaru['createon']);
												$tanggal 	= date_format($date,"Y-m-d H:i:s");

												echo relative_time($tanggal) . ' lalu - '.$terbaru['news_view'].' views';
												?>											
											</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
							<?php } ?>
                        </div>
                    </div>

                    <div class="d-r-v">
                        <div class="fl-l">
                            <h4>VIDEO</h4>
                        </div>
                        <div class="fl-r bcd">
                            <a href="">
                                <span>Berita Lainnya</span>
                                <i class="material-icons">keyboard_arrow_right</i>
                            </a>
                        </div>
                        <div class="pd">
							<?php 
							foreach($video_eyetube as $newtube){
							?>
                            <div>
                                <div class="container h105">
                                    <a href="">
                                        <img src="<?php echo imgUrl(); ?>systems/eyetube_storage/<?= $newtube['thumb']; ?>" alt="">
                                    </a>
                                    <div class="drn">
                                        <span></span>
                                    </div>
                                    <div class="container rv">
                                        <a href="<?php echo base_url(); ?>eyetube/detail/<?= $newtube['url'];?>">
                                            <span style="margin-top:7px;"><?= $newtube['title']; ?></span>
                                        </a>
                                        <div class="rr">
                                            <span>
												<?php
													$date 		=  new DateTime($newtube['createon']);
													$tanggal 	= date_format($date,"Y-m-d H:i:s");
													echo relative_time($tanggal) . ' ago - '.$newtube['tube_view'].' views';						
												?>											
											</span>
                                        </div>
                                    </div>
                                </div>								
                            </div>
							<?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- </div> -->
        </div>
    <script>
        $('#z').datepicker({
            inline: true,
            altField: '#d'
        });

        $('#d').change(function () {
            $('#z').datepicker('setDate', $(this).val());
        });
    </script>
</body>

</html>