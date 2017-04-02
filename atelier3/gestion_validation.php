<?php
/**
 * Created by PhpStorm.
 * User: patjoub
 * Date: 02/04/17
 * Time: 08:57
 */

d($_POST);


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