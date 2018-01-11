
    <style>
	body{
		overflow-x: unset;
	}
    *{
        font-family: sans-serif;
    }
    .img-radius{
        border: none;
        border-radius: 50%;
        overflow: hidden;
        height: 60px;
        width: 60px;
        display: block;
    }
    .img-radius img{
        height: 100%;
    }
    .informasi button, .btn-blue{
        background-color: #4FC3F7;
        color: white;
        padding: 8px 10px;
        border-radius: 5px;
        font-size: .9em;
        display: block;
        max-width: 110px;
        text-align: center;
        margin: 8px 8px 8px 0px;
        float: left;
    }
    .action-menu{
        width: 100%;
        max-width: 450px;
        float: left;
    }
    .action-menu .col-1{
        width: 17%;
        max-width: 100px;
        min-width: 50px;
        float: left;
        margin: 5px;
        text-align: center;
    }
    .action-menu img{
        width: 100%;
    }
    .action-menu a{
        text-decoration: none;
        color: currentColor;
    }
    .container{
        width: 30%;
        min-width: 300px;
        padding: 10px;
        float: left;
    }
    .galeri{
        width: 100%;
        float: left;
		max-height: 300px;
		overflow-x: hidden;
		overflow-y: scroll;
    }
    .galeri img{
        width: 30%;
        margin-right: 1%;
        float: left;
        margin-bottom: 5px;
    }
    h2{
        font-size: 2em;
        font-weight: 100;
        text-transform: capitalize;
    }
    .bottom-content{
        display: block;
        float: left;
        width: 100%;
        text-align: center;
    }
    .bottom-content .btn-blue{
        display: inline-block;
        float: unset;
    }
    .informasi{
        width: 90%;
    }
    .informasi span{
        display: block;
        font-weight: 100;
    }
    .informasi input, .informasi textarea{
        display: block;
        min-width: 200px;
        width: 100%;
        /* max-width: 250px; */
        border: 1px solid gainsboro;
        padding: 8px;
        margin: 5px 0px;
        border-radius: 5px;
        background-color: #FAFAFA;
        color: #616161;
        outline: none;
    }
    </style>
    <div class="head-content container">
        <div class="img-radius">
            <img src="<?=imgUrl()?>systems/img_storage/<?=$pic?>" alt="" srcset="">
        </div>
        <label class="btn-blue">
            Ganti Foto
            <input id="file_pic" name="pic" type="file" style="display: none;">
        </label>
        <button class="btn-blue" type="reset" style="background-color: #EC407A;
        border: none;"><a style="text-decoration: unset;color: white;" href="<?php echo base_url()?>home/logout">Logout</a></button>
        <div class="action-menu">
            <div class="col-1">
                <img src="<?=imgUrl()?>systems/img_storage/<?=$pic?>" alt="" srcset="">
                <a href="">Pemain</a>
            </div>
            <div class="col-1">
                <img src="<?=imgUrl()?>systems/img_storage/<?=$pic?>" alt="" srcset="">
                <a href="">Klub</a>
            </div>
            <div class="col-1">
                <img src="<?=imgUrl()?>systems/img_storage/<?=$pic?>" alt="" srcset="">
                <a href="">Ofisial</a>
            </div>
            <div class="col-1">
                <img src="<?=imgUrl()?>systems/img_storage/<?=$pic?>" alt="" srcset="">
                <a href="">Eyemarket</a>
            </div>
            <div class="col-1">
                <img src="<?=imgUrl()?>systems/img_storage/<?=$pic?>" alt="" srcset="">
                <a href="">Eyeme</a>
            </div>
        </div>
    </div>
    <div class="container">
        <h2>informasi akun</h2>
        <div class="informasi">
            <form action="">
                <span>Nama Depan</span>
                <input type="text" name="" id="" value="<?=$profile["name"]?>">
                <span>Nama Belakang</span>
                <input type="text" name="" id="" value="<?=$profile["fullname"]?>">
                <span>Alamat</span>
                <textarea name="" id="" cols="30" rows="10"><?=$profile["address"]?></textarea>
                <span>Tentang Saya</span>
                <textarea name="" id="" cols="30" rows="10"><?=$profile["about"]?></textarea>
                <button type="submit">Ubah Profile</button>
            </form>
        </div>
    </div>
    <div class="container">
        <div class="galeri">
            <img src="<?=imgUrl()?>systems/img_storage/<?=$pic?>" alt="" srcset="">
            <img src="<?=imgUrl()?>systems/img_storage/<?=$pic?>" alt="" srcset="">
            <img src="<?=imgUrl()?>systems/img_storage/<?=$pic?>" alt="" srcset="">
            <img src="<?=imgUrl()?>systems/img_storage/<?=$pic?>" alt="" srcset="">
            <img src="<?=imgUrl()?>systems/img_storage/<?=$pic?>" alt="" srcset="">
            <img src="<?=imgUrl()?>systems/img_storage/<?=$pic?>" alt="" srcset="">
            <img src="<?=imgUrl()?>systems/img_storage/<?=$pic?>" alt="" srcset="">
            <img src="<?=imgUrl()?>systems/img_storage/<?=$pic?>" alt="" srcset="">
            <img src="<?=imgUrl()?>systems/img_storage/<?=$pic?>" alt="" srcset="">
            <img src="<?=imgUrl()?>systems/img_storage/<?=$pic?>" alt="" srcset="">
        </div>
        <div class="bottom-content">
            <label class="btn-blue">
                Tambah Foto
                <input id="file_pic" name="pic" type="file" style="display: none;">
            </label>
            <label class="btn-blue">
                Tambah video
                <input id="file_pic" name="pic" type="file" style="display: none;">
            </label>
        </div>
    </div>