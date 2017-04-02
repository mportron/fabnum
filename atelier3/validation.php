<?php
/**
 * Created by PhpStorm.
 * User: patjoub
 * Date: 01/04/17
 * Time: 18:45
 */

include "composants/header.php";




?>
<?php include "nav.php"; ?>
<div class="container">

    <h1>Validation</h1>

    <div class="row">
        <?php include "gestion_validation.php"; ?>

    </div>
    <div class="row">
        <?php
        include "affichage_meteo.php";
        ?>
    </div>
    <?php include "tableau_recap.php"; ?>

</div>


<?php
include "composants/footer.php";
?>



