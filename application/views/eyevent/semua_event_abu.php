
<style>
    .pagination > .active > a {
    z-index:1;
    background-color: rgb(200, 0, 0) !important;
    border-color: rgb(200, 0, 0) !important;
    }
    .pagination > .active > a:hover{
        color: white !important;
        background-color: #F44336 !important;
    }
    .pagination > li > a, .pagination > li > span{
        color: rgb(200, 0, 0);
    }
    .menu-3 a:hover{
    border-bottom: 3px solid rgb(200, 0, 0);
    color: rgb(200, 0, 0);
    }
    .trending .x-c a{
        color: white;
        background-color: #E53935;
        font-weight: 500;
        padding: 5px 15px;
    }
    .trending .x-c a:hover{
        background-color: #EF5350;
        color: #FFEBEE !important;
    }
</style>

<?php 
    echo set_breadcrumb('eyevent','Semua Event');
?>

<div class="desktop redhover">
    
    <!-- <div class="m-0 w1020">
    <div class="garis-x m-t-30"></div>
    </div> -->
    <div class="center-desktop m-0">
    <div class="m-0 all-event">

        <script type="text/javascript">
            jQuery(document).ready(function() {
                $(window).on('load',function() {
                    var urlnya          = "<?= base_url(); ?>Eyevent/api_semua_event/";
                    $.ajax({
                        url: urlnya
                    })
                    .done(function(result) {
                        result = JSON.parse(result);
                        console.log(result);
                        $('.all-event').html(result.html);
                    });
                })
            });
        </script>

        <div class="container ">
            <?php 
                for ($i = 1; $i <= 12 ; $i++)
                {
            ?>
                    <div class="w4">
                        <div class="w4-f" style="background-color: #f2f2f2;">
                        </div>
                        <p class="sub-en"></p>
                        <span class="time-view">                         
                        </span>
                    </div>
            <?php        
                }
            ?>
        </div>
    </div>

    </div>
</div>
