<style>
    .nav > li > a {
        position: relative;
        display: block;
        padding: 10px 7px;
        font-size: .8em;
    }
</style>

<div class="center-desktop m-0">
    <div class="container" style="margin-top:-35px;">
    <i id="eventleft" class="material-icons left4 panah2 panahkiri2" href="#eventsli" role="button">keyboard_arrow_left</i>
    <i id="eventright" class="material-icons right4 panah2 panahkanan2" href="#eventsli" role="button">keyboard_arrow_right</i>

<div id="eventsli" class="carousel slide">
    <div role="listbox" class="carousel-inner">
        <div class="box item active">
            <?php
                foreach($eyevent_main as $vent)
                {
            ?>
                <div class="half2">          
                    <div class="gambar2">
                        <a href="<?php echo base_url(); ?>eyevent/detail/<?= $vent['id_event'];?>">                 
                            <img src="<?=imgUrl()?>systems/eyevent_storage/<?php print $vent['thumb1']; ?>">
                        </a>
                        <div class="fl-l ae">
                            <a href="">
                                <!-- <i class="material-icons">keyboard_arrow_left</i> -->
                            </a>
                        </div>
                    </div>
                </div>
                <div class="half2">          
                    <div class="gambar2">
                        <a href="<?php echo base_url(); ?>eyevent/detail/<?= $vent['id_event'];?>">                    
                            <img src="<?=imgUrl()?>systems/eyevent_storage/<?php print $vent['thumb1']; ?>">
                        </a>
                        <div class="fl-r ae">
                            <a href="">
                                <!-- <i class="material-icons">keyboard_arrow_right</i> -->
                            </a>
                        </div>
                    </div>
                </div>
            <?php 
                } 
            ?>
        </div>
        <div class="box item">
                <?php
                    foreach($eyevent_main as $vent)
                    {
                ?>
                    <div class="half2">          
                        <div class="gambar2">
                            <a href="<?php echo base_url(); ?>eyevent/detail/<?= $vent['id_event'];?>">                 
                                <img src="<?=imgUrl()?>systems/eyevent_storage/<?php print $vent['thumb1']; ?>">
                            </a>
                            <div class="fl-l ae">
                                <a href="">
                                    <!-- <i class="material-icons">keyboard_arrow_left</i> -->
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="half2">          
                        <div class="gambar2">
                            <a href="<?php echo base_url(); ?>eyevent/detail/<?= $vent['id_event'];?>">                    
                                <img src="<?=imgUrl()?>systems/eyevent_storage/<?php print $vent['thumb1']; ?>">
                            </a>
                            <div class="fl-r ae">
                                <a href="">
                                    <!-- <i class="material-icons">keyboard_arrow_right</i> -->
                                </a>
                            </div>
                        </div>
                    </div>
                <?php 
                    } 
                ?>
            </div>
        </div></div>


    </div>
    <!-- <div class="ev-ar-p">
        <a href="" class="container">
            <span>LIHAT EVENT LAINNYA</span>
            <i class="material-icons ev-ar" href="" role="button">keyboard_arrow_right</i>
        </a>
    </div> -->
    
</div>

<div class="center-desktop m-0">
    <!-- <div class="w1020 m-0"> -->
    <div class="container menu-5 m-0 bbg" style="border-bottom:unset; margin-top:-65px;">
        <div class="fl-l" style="width: max-content;">
            <div class="tab tab-event">
                    <div style="text-align:right;position:relative;top:55px;">
                            <button class="btn-green-white" type="button" id="btn-date-jadwal" style="width:307px; padding: 0 20px 10px 30px;">
                               <span style="font-weight:600;">LIHAT EVENT LAINNYA</span>
                               <i class="material-icons ev-ar" href="" role="button">keyboard_arrow_right</i>
                            </button>        
                        </div>
                <ul class="nav nav-tabs" id="tab-nav" style="width: 100%;">
                    <li class="active">
                        <a href="#jadwal-pertandingan" data-toggle="tab">JADWAL & HASIL PERTANDINGAN</a>
                    </li>
                    <li>
                        <a href="#klasemen" data-toggle="tab">KLASEMEN</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- </div> -->
</div>

<div class="center-desktop m-0">
    <div class="container mt-20">
        <div class="tab-content" style="margin-top: 1em;">
            <div id="jadwal-pertandingan" class="tab-pane fade in active">
                <select id="pilih-liga" class="lc fl-r">
                    <option>Semua Liga</option>
                    <?php 
                        foreach ($all_liga as $ligaa)
                        {
                    ?>
                            <option value="<?= $ligaa['id_event']; ?>"><?= $ligaa["title"]; ?></option>
                    <?php        
                        }
                    ?>
                </select>
                <?php echo $jadwal; ?>
                <?php echo $kanan_kalender; ?>
            </div>
            <div id="klasemen" class="tab-pane fade">
                <?php echo $klasemen; ?>
                
            </div>
            
        </div>
    </div>
</div>

<input type="hidden" id="hdn-date" value="">

<script>
    var tgl = "";

    $('#z').datepicker({
        inline: true,
        altField: '#d',
        onSelect: function() { 
                tgl = $(this).datepicker('getDate');
                
                $('#hdn-date').val(tgl);
                console.log(tgl);
            }
    });

    $('#btn-date-jadwal').click(function(event) {

        var tanggal = tgl.getDate();

        var monthNames = ["January", "February", "March", "April", "May", "June",
          "July", "August", "September", "October", "November", "December"
        ];
        var bulan       = tgl.getMonth() + 1;
        var nm_bulan    = monthNames[tgl.getMonth()];

        var tahun = tgl.getFullYear();

        var txt_tanggal     = tahun+"-"+bulan+"-"+tanggal;

        $('#ajax-tgl-jadwal').html(tanggal + " " + nm_bulan + " " + tahun);

        var urlnya          = "<?= base_url(); ?>Eyevent/get_jadwal/"+txt_tanggal;

        $('#btn-tutup-jadwal').click(function(event) {
            $('#tbl-date-jadwal').attr('style', 'display:none');
        });

        $.ajax({
            url: urlnya,
            type: 'POST',
            dataType: 'json',
            data: {txt_tanggal: txt_tanggal},
        })
        .done(function(result) {
            $('#tbl-date-jadwal').attr('style', 'display:block').attr('style', 'background-color: #f2f2f2');


            $('#body-ajax-jadwal').html(result.txt);
            
        });
        
    });

    $('#d').change(function () {
        $('#z').datepicker('setDate', $(this).val());
    });

    $('#pilih-liga').change(function(event) {
        var liganya     = $(this).val();
        window.location.replace("<?= base_url(); ?>eyevent/liga/"+liganya);
    });
    
</script>