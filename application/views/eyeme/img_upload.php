<!--img upload-->
    <div class="detail-post-box" id="upload_pop" style="display:none">
        <?php echo form_open_multipart(MEURL.'upload_foto',array('name'=> 'uploadform'))?>
        <div class="takepic-box m-0 p-r">
            <div class="pic-l">
                <div class="container ">
                    
                       

                            <div id="dropzone">
                               <div class="uplda">
                                Seret Gambar Kamu Disini 
                                <br>
                                atau 
                                <br>
                                 <br>
                                <i class="material-icons">cloud_upload</i>
                                <br>
                                Klik Disini
                               </div>
                                <input type="file" name="upl_img" class="fileimg"/>
                            </div>
                        <div class="container rsz mt-10">
                            <div id="slidecontainer">
                                <!--<input type="range" min="1" max="100" value="1" class="slider cropit-image-zoom-input" id="myRange">-->
                            </div>
                           
                           
                            
                        </div>
                   
                </div>
            </div>
            <div class="pic-r p-r">
                <div class="container com-tag">
                    <ul>
                        <li><span>Keterangan </span></li>
                        <li><input type="text" placeholder="Tuli Keterangan disini..." name="caption" class="c-caption"></li>
                        <li></li>
                        <!--<li><span>Tag</span></li>
                        <li><input type="text" placeholder="Gunakan @ untuk menyebut teman" class="input2"></li>
                        <li></li>
                        <li><span>Lokasi</span></li>
                        <li><input type="text" placeholder="Ketik lokasimu" class="input2"></li>
                        <li></li>
                        <li></li>
                        <li></li>-->
                        <li>
                            <button class="btn-me-submit fl-r" type="submit" >Kirim</button></li>
                    </ul>
                </div>
            </div>

        </div>

        <?php echo form_close()?>
        
    </div>

    <!--/img-upload-->