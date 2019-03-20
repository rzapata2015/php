<?php
include('../../class/tbl_hoja_vida.php');

$tbl = new tbl_hoja_vida($_POST['codigo']);
$tbl->consultar();

    if (is_null($tbl->getFoto())){
        ?>
        <!-- <label>Archivo: </label> Sin definir<br> -->
        <?php
    }else{
        ?>
        <label>Foto: </label>
        <a href="<?php echo $tbl->getFoto(); ?>" target="_blank"><img src="<?php echo $tbl->getFoto(); ?>" width="100px"></a> <br>
    <?php
        }
    ?>
