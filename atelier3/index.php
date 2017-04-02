<?php
include "composants/header.php";

$meteo=triVilleTemperatureMinimum($meteo,16);
$meteo=ajouterCommentaire($meteo);

?>
<?php include "nav.php"; ?>
<div class="container">

    <div class="jumbotron"><h1>La météo des plages</h1></div>


    <div class="row">
        <?php
        include "affichage_meteo.php";
        ?>
    </div>
    
</div>
<?php
include "composants/footer.php";
?>





