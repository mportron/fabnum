<?php
include "composants/header.php";

$meteo=chargerDatas();//fonction qui charge le fichier en mémoire
$meteo=triVilleTemperatureMinimum($meteo,-16);
//$meteo=ajouterCommentaire($meteo);


?>
<?php include "nav.php"; ?>
<div class="container">

    <div class="jumbotron"><h1>La météo des plages</h1></div>

    <nav class="navbar navbar-default">
        <div class="container">
            <ul class="nav navbar-nav">
                <?php
                foreach($regles as $code=>$item): ?>
                    <li><a href="#" data-code="<?php echo $code; ?>"><?php echo $item['libelle']; ?></a></li>
                <?php endforeach; ?>
            </ul>
        </div>
    </nav>

    <div class="row">
        <?php
        include "affichage_meteo.php";
        ?>
    </div>

</div>
<?php
include "composants/footer.php";
?>





