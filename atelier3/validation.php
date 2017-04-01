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
        <div class="col-lg-4">
            <h4>Test de la valeur pour la Ville</h4>
            <?php
            if(ctype_alpha($_POST['ville'])): ?>
                <p class="alert-success">La ville est du bon type</p>
            <?php else: ?>
                <p class="alert-danger">La ville n'est pas du bon type</p>
            <?php endif; ?>


        </div>
        <div class="col-lg-4">
            <h4>Test de la valeur pour la Température</h4>
            <?php
            $ajoutVille=false;
            if(ctype_digit($_POST['temperature'])):
                $ajoutVille=true;
                ?>
                <p class="alert-success">La température est du bon type</p>
            <?php else:
                $ajoutVille=false;
                ?>
                <p class="alert-danger">La température n'est pas du bon type</p>
            <?php endif; ?>
            <?php
            if(filter_var($_POST['temperature'],FILTER_VALIDATE_INT)):
                $ajoutTemperature=true;
            ?>
                <p class="alert-success">La température passe le test du filtre</p>
            <?php else:
                $ajoutTemperature=true;
            ?>
                <p class="alert-danger">La température ne passe pas le test du filtre</p>
            <?php endif; ?>
        </div>
        <div class="col-lg-4">
            <h4>Test de la valeur pour l'email</h4>
            <?php
            if(filter_input(INPUT_POST,'email',FILTER_SANITIZE_NUMBER_INT)): ?>
                <p class="alert-success">L'email passe le test du filtre de conversion</p>
            <?php else: ?>
                <p class="alert-danger">L'email ne passe pas le test du  filtre de conversion</p>
            <?php endif; ?>
            <?php
            if(filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)): ?>
                <p class="alert-success">L'email passe le test du filtre</p>
            <?php else: ?>
                <p class="alert-danger">L'email ne passe pas le test du filtre</p>
            <?php endif; ?>

        </div>
    </div>

    <?php
    /*
     * Ajout des valeurs si les conditions sont respectées
     */
    if(true==$ajoutVille && true==$ajoutTemperature):
        $meteo[$_POST['ville']]['temperature']=$_POST['temperature'];
    endif;
    ?>
    <div class="row">
        <?php
        
        foreach($meteo as $ville=>$detail):
            ?>
            <div class="col-lg-3 col-sm-6 col-xs-10 col-sm-push-0 col-xs-push-1">

                <?php $res= afficheTemperature($ville,$detail);
                ?>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <?php echo $res['phrase']; ?>
                    </div>
                    <?php
                    if(isset($detail['icone']) && strlen($detail['icone'])>1):
                        ?>
                        <div class="panel-body">
                            <?php echo $res['icone']; ?>
                        </div>
                    <?php endif; ?>
                    <?php
                    if(isset($detail['commentaire'])):
                        ?>
                        <div class="panel-footer">
                            <?php echo $detail['commentaire']; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <?php
        endforeach;
        ?>

</div>


</div>


<?php
include "composants/footer.php";
?>



