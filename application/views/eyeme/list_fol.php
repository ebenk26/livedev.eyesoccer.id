
<div class="detail-post-box">
        <div class="container box-fol">
            <div class="container bbg2">
                <h5>Pengikut</h5>
                <!-- <h5>Mengikuti</h5> -->
            </div>
            <div class="container list-fol">
                <div class="tb-list-fol">
                    <table>

                    	<?php
                    	foreach($foll as $k => $v){

                    		echo '<tr>';
                    			echo '<td>';
                    				echo '<div class="me-img">';
                    					echo '<img src="'.($v->profile_pic == '' ? DPIC : $v->profile_pic).'" alt="'.$v->profile_pic.'" class="w-100">';
                    				echo '</div>';
                    			echo '</td>';
                    			echo '<td>';
                    				echo '<a href="'.MEPROFILE.$v->username.'">'.$username.'</a>';
                    			echo '</td>';
                    			echo '<td>';
                    				echo '<button type="button" class="btn-fol">';
                    					echo '<span>Ikuti</span>';
                    				echo '</button>';
                    			echo '</td>';
                    		echo '</tr>';
                    	}


                    	?>
                    </table>
                </div>
            </div>
        </div>
    </div>