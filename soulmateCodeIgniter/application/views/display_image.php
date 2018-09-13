<?php
// header("Content-type: image/jpg"); 
//echo $dip_img->image;
//echo $dip_img['image'];

//print_r($dispay);


foreach ($dispay  as $value) {
    

?>

<li><a target="_blank" href="<?php echo base_url();?>show/<?php echo $value->id?>"><?php echo $value->persion_picture ?></a></li>


<?php

}
?>