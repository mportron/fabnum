<?php
/**
 * Created by PhpStorm.
 * User: patjoub
 * Date: 01/04/17
 * Time: 18:45
 */

include "composants/header.php";



$ajoutFichier=false;

///// traitement du fichier s'il existe
if(isset($_FILES['icone'])):
    $fichier=$_FILES['icone']['tmp_name'];
    if(preg_match('/image/',$_FILES['icone']['type'])):
        $destination='icones_meteo/'.$_FILES['icone']['name'];
        move_uploaded_file($fichier,$destination);
        $ajoutFichier=true;

    endif;
endif;

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


    <?php
    /*
     * Ajout des valeurs si les conditions sont respectées
     */
    if(true==$ajoutVille && true==$ajoutTemperature):
        $meteo[$_POST['ville']]['temperature']=$_POST['temperature'];
        if(true==$ajoutFichier):
            $meteo[$_POST['ville']]['icone']=$destination;
        endif;

    endif;
    ?>


    </div>
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
    <div class="row">
        <div class="col-lg-12">
            <table class="table table-bordered">
                <tr>
                    <th>Ville</th>
                    <th>T&deg;</th>
                    <th>Image</th>
                </tr>
                <?php
                reset($meteo);
                foreach($meteo as $ville=>$detail): ?>
                    <tr>
                        <td><?php echo $ville; ?></td>
                        <td><?php echo $detail['temperature']; ?></td>
                        <td><?php echo $detail['icone']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>

</div>


<?php
include "composants/footer.php";
?>



