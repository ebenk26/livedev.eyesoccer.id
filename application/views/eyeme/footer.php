
<!--img upload-->
    <div class="detail-post-box" id="upload_pop" style="display:none">
        <div class="takepic-box m-0 p-r" >
            <div class="pic-l">
                <div class="container box-pic">
                    <div class="up-pic tx-c p-r">
                        <ul>
                            <li>
                                <i class="material-icons">cloud_upload</i>
                            </li>
                            <li>
                                <span>Drop your photo here</span>
                            </li>
                            <li>
                                <span>or</span>
                            </li>
                            <li>
                                <button class="btn-browse" type="button">Browse file</button>
                            </li>
                        </ul>
                    </div>
                    <div class="container rsz mt-10">
                        <span>Resize photo</span>
                        <div id="slidecontainer">
                            <input type="range" min="1" max="100" value="0" class="slider" id="myRange">
                        </div>
                    </div>
                </div>
            </div>
            <div class="pic-r p-r">
                <div class="container com-tag">
                    <ul>
                        <li><span>Keterangan </span></li>
                        <li><input type="text" placeholder="Tuli Keterangan disini..."></li>
                        <li></li>
                        <li><span>Tag</span></li>
                        <li><input type="text" placeholder="Gunakan @ untuk menyebut teman" class="input2"></li>
                        <li></li>
                        <li><span>Lokasi</span></li>
                        <li><input type="text" placeholder="Ketik lokasimu" class="input2"></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li><button class="btn-me-submit fl-r" type="button">Submit</button></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!--/img-upload-->
    <!--<script src="<?php #echo JSPATH?>home.js"></script>-->
    <script src="<?php echo JSPATH?>sw.js"></script>