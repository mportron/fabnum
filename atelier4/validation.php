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
        <div class="col-lg-4">
            <h4><a href="index.php">Retourner à l'accueil</a></h4>
        </div>
        <div class="col-lg-4">
            <h4><a href="saisie.php">Saisir une nouvelle ville</a></h4>
        </div>


    </div>

</div>


<?php
include "composants/footer.php";
?>



